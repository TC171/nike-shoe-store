<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhmuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhmuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhmuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    //route sản phẩm
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    // 'sua-danh-muc' => (new AdminSanShamController())->postEditSanPham(),
    // 'form-sua-danh-muc' => (new AdminSanPhamController())->formEditSanPham(),
    // 'xoa-danh-muc' => (new AdminSanPhamController())->deleteSanPham(),
};