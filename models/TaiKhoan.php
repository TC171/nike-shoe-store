<?php

use Vtiful\Kernel\Excel;
class TaiKhoan
{
    public $conn ;
    public function __construct() {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau) {
    try {
        $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($mat_khau, $user['mat_khau'])) {
            if ($user['chuc_vu_id'] == 2) { // Kiểm tra quyền
                if ($user['trang_thai'] == 1) { // Kiểm tra trạng thái
                    return $user['email']; // Đăng nhập thành công
                } else {
                    return "Tài Khoản Bị Cấm";
                }
            } else {
                return "Tài Khoản Không Có Quyền Đăng Nhập";
            }
        } else {
            return "Tài Khoản Hoặc Mật Khẩu Không Chính Xác";
        }
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

    public function getTaiKhoanFromEmail($email) {
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

}