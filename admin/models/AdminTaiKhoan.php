<?php

use Vtiful\Kernel\Excel;
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
      public function insertTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu_id){
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id)
            VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id) ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ho_ten' =>$ho_ten,
                ':email' =>$email,
                ':mat_khau' =>$mat_khau,
                ':chuc_vu_id' =>$chuc_vu_id,

            ]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai) {
    try {
        $sql = 'UPDATE tai_khoans
                SET 
                    ho_ten = :ho_ten,
                    email = :email,
                    so_dien_thoai = :so_dien_thoai,
                    trang_thai = :trang_thai
                WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':so_dien_thoai' => $so_dien_thoai,
            ':trang_thai' => $trang_thai,
            ':id' => $id,
        ]);

        return true;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false; // Trả về false nếu có lỗi
    }
}

    public function resetPassword($id, $mat_khau)
    {
        try {
            $sql = ' UPDATE tai_khoans
                    SET 
                        mat_khau = :mat_khau
                        
                    WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateKhachHang($id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            $sql = ' UPDATE tai_khoans
                    SET 
                        ho_ten = :ho_ten,
                        email = :email,
                        so_dien_thoai = :so_dien_thoai,
                        ngay_sinh = :ngay_sinh,
                        gioi_tinh = :gioi_tinh,
                        dia_chi = :dia_chi,
                        trang_thai = :trang_thai,
                        
                    WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,

                ':trang_thai' => $trang_thai,

                ':id' => $id,

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

        
        if($user && password_verify($mat_khau, $user['mat_khau'])){
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

    public function getTaiKhoanformEmail($email) {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi " . $e->getMessage();
        }
    }


    public function countTotalUsers() {
    $sql = "SELECT COUNT(*) as total FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':chuc_vu_id' => 2]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

} 
 ?>