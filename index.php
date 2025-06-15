<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';


// Route
$act = $_GET['act'] ?? '/';



match ($act) {
    '/' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController()) -> chiTietSanPham(),
    'them-gio-hang' => (new HomeController()) -> addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'thanh-toan' => (new HomeController()) -> thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController()) -> postThanhToan(),
    'lich-su-mua-hang' => (new HomeController()) -> lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController()) -> chiTietMuaHang(),
    'huy-don-hang' => (new HomeController()) -> huyDonHang(),


    //auth
    'login' => (new HomeController()) -> formLogin(),
    'dang-ky' => (new HomeController()) -> formDangKy(),

    'check-login' => (new HomeController()) -> postLogin(),
    'check-dang-ky' => (new HomeController()) -> dangky(),
};