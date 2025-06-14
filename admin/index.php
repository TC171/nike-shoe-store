<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin' ) {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route báo cáo thống kê - trang chủ
    '/' => (new AdminBaoCaoThongKeController())->home(),

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
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    //route quản lý đơn hàng
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    'xoa-don-hang' => (new AdminDonHangController())->deleteDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // quản lý tài khoản
        //quản lý tài khoản quản trị
        'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())-> danhSachQuanTri(),
        'form-them-quan-tri' => (new AdminTaiKhoanController())-> formAddQuanTri(),
        'them-quan-tri' => (new AdminTaiKhoanController())-> postAddQuanTri(),
        'form-sua-quan-tri' => (new AdminTaiKhoanController())-> formEditQuanTri(),
        'sua-quan-tri' => (new AdminTaiKhoanController())-> postEditQuanTri(),


        //router reset password tài khoản
        'reset-password' => (new AdminTaiKhoanController())-> resetPassword(),

        //Quản Lý Tài Khoản Khách Hàng
        'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())-> danhSachKhachHang(),
        'form-sua-khach-hang' => (new AdminTaiKhoanController())-> formEditKhachHang(),
        'sua-khach-hang' => (new AdminTaiKhoanController())-> postEditKhachHang(),
        'chi-tiet-khach-hang' => (new AdminTaiKhoanController())-> detailKhachHang(),

        //Quản Lý Tài Khoản Cá Nhân ( Quản Trị )
        'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())-> formEditCaNhanQuanTri(),
        'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())-> postEditCaNhanQuanTri(),
        
        'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())-> postEditMatKhauCaNhan(),
     
    //Route auth  
    'login-admin' => (new AdminTaiKhoanController())-> formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
    
};