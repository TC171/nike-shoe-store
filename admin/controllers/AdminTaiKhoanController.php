<?php
 class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
         $this->modelTaiKhoan = new AdminTaiKhoan();
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

                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // khai báo chức vụ 
                $chuc_vu_id = 1;
                //var_dump($password);die;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);


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
            $_SESSION['error'] = $user;
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



} 
 ?>