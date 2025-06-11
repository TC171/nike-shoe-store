<?php 

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
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
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromId($mail)['id'];
        }else {
            var_dump('Chưa Đăng Nhập');die;
        }
        $sanPham_id = $_POST['san_pham_id'];
        $so_luong = $_POST['so_luong'];
    }
}