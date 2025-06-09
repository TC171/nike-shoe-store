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
} 
 ?>