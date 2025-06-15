<?php
 class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;


    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }
    public function danhSachQuanTri () 
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri () 
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }

    public function postAddQuanTri()
    {
    
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            $errors=[];
            if(empty($ho_ten)){
                $errors['ho_ten'] = 'Tên  Không Được Để Trống';
            }

              if(empty($email)){
                $errors['email'] = 'Email Không Được Để Trống';
            }

            $_SESSION ['error'] = $errors;

            if(empty($errors)){

                $mat_khau = password_hash('123456', PASSWORD_BCRYPT);
                // khai báo chức vụ 
                $chuc_vu_id = 1;
                // var_dump($chuc_vu_id);die;
                $user=$this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu_id);
                // var_dump($user);die;

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri') ;
                exit();
            }
            else{
                $_SESSION ['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri') ;
                exit();
            }  
        }
    }

     public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }

    public function postEditQuanTri() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $quan_tri_id = $_POST['quan_tri_id'] ?? '';
        $ho_ten = $_POST['ho_ten'] ?? '';
        $email = $_POST['email'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $trang_thai = $_POST['trang_thai'] ?? '';

        $errors = [];

        if (empty($ho_ten)) {
            $errors['ho_ten'] = 'Tên Người Dùng Không Được Để Trống';
        }
        if (empty($email)) {
            $errors['email'] = 'Email Người Dùng Không Được Để Trống';
        }
        if (!in_array($trang_thai, ['1', '2'])) {
            $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
        }

        // Lưu lỗi vào session nếu có
        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
            exit();
        } else {
            // Nếu không có lỗi, cập nhật tài khoản
            $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }
    }
}

    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123456', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if ($status &&  $tai_khoan['chuc_vu_id'] == 1) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status &&  $tai_khoan['chuc_vu_id'] == 2) {
            header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once './views/taikhoan/khachhang/editKhachHang.php';

        deleteSessionError();
    }


    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';



            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên Người Dùng Không Được Để Trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email Người Dùng Không Được Để Trống';
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày Sinh Người Dùng Không Được Để Trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới Tinh Người Dùng Không Được Để Trống';
            }
            if (!isset($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $this->modelTaiKhoan->updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai,

                );
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&khach_hang_id=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);


        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    } 


    public function formLogin(){
        require_once './views/auth/formLogin.php';

        deleteSessionError();
        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //LẤY EMAIL VÀ PASS GỬI LÊN TỪ FORM
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            // xử lí kiểm tra thông tin
            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            if ($user == $email ) { //truong hop dang nhap thanh cong 
                $_SESSION['user_admin'] = $user;
                
                
                header("location: " . BASE_URL_ADMIN);
                exit();
            }else
            //luu loi vao session
            $_SESSION['error'] = $user ;
            $_SESSION['flash'] = true;
            header("location: ". BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
    }
    
    public function logout(){
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("location: ". BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formEditCaNhanQuanTri(){
        $email=$_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanformEmail($email);
        // var_dump($thongTin);die;
        require_once './views/taikhoan/canhan/editCaNhan.php';
        deleteSessionError();
    }

    public function postEditMatKhauCaNhan(){
        if ($_SERVER(['REQUEST_METHOD'] == 'POST')) {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

        $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);
        $checkPass = $old_pass === $user['mat_khau'];
        $errors = [];
        if (empty(!$checkPass)) {
            $errors['old_pass'] = 'Mật Khẩu Hiện Tại Không Đúng';
        }
        if (empty($new_pass !== $confirm_pass)) {
            $errors['confirm_pass'] = 'Mật Khẩu Không Khớp';
        }
        if (empty($old_pass)) {
            $errors['old_pass'] = 'Vui Lòng Nhập Mật Khẩu Hiện Tại';
        }
        if (empty($new_pass)) {
            $errors['new_pass'] = 'Vui Lòng Nhập Mật Khẩu Mới';
        }
        if (empty($confirm_pass)) {
            $errors['confirm_pass'] = 'Vui Lòng Xác Nhận Lại Mật Khẩu';
        }
        $_SESSION['error'] = $errors;
        if (!$errors) {
            // $this->modelTaiKhoan->update
        }

        }
    }

    
} 
 ?>