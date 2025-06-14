<?php 

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    
    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        

        if($sanPham){
            require_once './views/detailSanPham.php';
        }else {
            header("Location: " . BASE_URL) ;
            exit();
        }
    }

    public function formLogin(){
        require_once './views/auth/formLogin.php';

        deleteSessionError();
        
    }

    public function postlogin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //LẤY EMAIL VÀ PASS GỬI LÊN TỪ FORM
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            // xử lí kiểm tra thông tin
            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            if ($user == $email ) { //truong hop dang nhap thanh cong 
                $_SESSION['user_client'] = $user;
                
                
                header("location: " . BASE_URL);
                exit();
            }else
            //luu loi vao session
            $_SESSION['error'] = $user ;
            $_SESSION['flash'] = true;
            header("location: ". BASE_URL . '?act=login');
            exit();
        }
    }

    public function addGioHang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            //lấy dữ liệu giỏ hàng người dùng 
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang-> getDetailGioHang($gioHang['id']);
            }else{
                $chiTietGioHang = $this->modelGioHang-> getDetailGioHang($gioHang['id']);
            }
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
                $checkSanPham = false;
                foreach($chiTietGioHang as $detail){
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id,$newSoLuong );
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id,$so_luong);
                }
                header("location:" . BASE_URL . '?act=gio-hang');
                exit();
                }else {
                    header("location: ". BASE_URL . '?act=login');
                }
        }
    }

    public function gioHang(){
        if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                //lấy dữ liệu giỏ hàng người dùng 
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang-> getDetailGioHang($gioHang['id']);
                }else{
                    $chiTietGioHang = $this->modelGioHang-> getDetailGioHang($gioHang['id']);
                }
                require_once './views/gioHang.php';
            }else {
                header("location: ". BASE_URL . '?act=login');
            }
    }


    public function thanhToan(){
    if (isset($_SESSION['user_client'])) {
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']); // Sử dụng user['id']

        if ($gioHang && isset($gioHang['id'])) {
            $gioHangId = $gioHang['id'];
        } else {
            $gioHangId = $this->modelGioHang->getDetailGioHang($user)['id'];
            $gioHang = ['id' => $gioHangId];
        }

        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHangId); // Sửa lại nơi lấy chi tiết giỏ hàng

        require_once './views/thanhToan.php';
    }
    }
     public function postThanhToan(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            




            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = rand(100000,999999);

            $this->modelDonHang->addDonHang($tai_khoan_id,
                                            $ten_nguoi_nhan,
                                            $email_nguoi_nhan,
                                            $sdt_nguoi_nhan,
                                            $dia_chi_nguoi_nhan ,
                                            $ghi_chu ,
                                            $tong_tien,
                                            $phuong_thuc_thanh_toan_id,
                                            $ngay_dat,
                                            $ma_don_hang,
                                            $trang_thai_id
            );
            // Lấy Thông Tin Giỏ Hàng của người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

            //Lưu Sản Phẩm Vào Chi TIết Đơn Hàng
            if ($don_hang_id) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                foreach($chiTietGioHang as $item){
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_khuyen_mai'];

                    $this->modelDonHang->addChiTietDonHang($don_hang_id , $item['san_pham_id'] , $donGia , $item['so_luong'] , $donGia * $item['so_luong']);
                }
            }
        }
    }     
}