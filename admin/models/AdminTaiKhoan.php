<?php
 class AdminTaiKhoan
{
       public $conn ;
    public function __construct() {
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
      public function InsertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id){
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id)
             value (:ho_ten, :email, :password, :chuc_vu_id) ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' =>$ho_ten,
                ':email' =>$email,
                ':password' =>$password,
                ':chuc_vu_id' =>$chuc_vu_id,

            ]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }









    public function checkLogin($email, $mat_khau){
    try{
        $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        
        if($user && $mat_khau){
            if($user['chuc_vu_id'] == 1){
                if($user['trang_thai'] == 1){
                    return $user['email'];
                }else{
                    return "Tài Khoản Bị Cấm";
                }
            }else{
                return "Tài Khoản Không Có Quyền Đăng Nhập";
            }
        }else{
            return "Tài Khoản Hoặc Mật Khẩu Không Chính Xác";
        }
    } catch (Exception $e) {
        echo "loi" .$e->getMessage();
        return false;
     }
    }


} 
 ?>