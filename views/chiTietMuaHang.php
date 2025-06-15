<!-- Vũ tất cả  -->
<?php   require_once 'layout/header.php'?>
<?php   require_once 'layout/menu.php'?>



<?php require_once 'layout/miniCart.php';?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>                              
                                
                                <li class="breadcrumb-item active" aria-current="page">Chi Tiết</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5">Thông Tin Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                    <?php foreach ($chiTietDonHang as $item): ?>
                                        <tr>
                                            <td><img class="img-fluid" src="<?= BASE_URL. $item['hinh_anh'] ?>" alt="Product" width="100px"></td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= number_format($item['don_gia'],0,',','.') ?>đ</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= number_format($item['thanh_tien'],0,',','.') ?>đ</td>
                                        
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        
                    </div>

                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Thông Tin Đơn Hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Người Nhận</th>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số Điện Thoại</th>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Địa Chỉ</th>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ngày Đặt </th>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ghi Chú</th>
                                        <td><?= $donHang['ghi_chu'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tổng Tiền</th>
                                        <td><?= formatPrice($donHang['tong_tien']). 'đ' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phương Thức Thanh Toán</th>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id'] ]?></td>
                                    </tr>
                                    <tr>
                                        <th>Trạng Thái Đơn Hàng</th>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>



<script>
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const quantity = parseInt(this.value) || 0; // Lấy giá trị số lượng, mặc định là 0 nếu không hợp lệ
            const price = parseFloat(this.dataset.gia); // Giá sản phẩm
            const discountPrice = parseFloat(this.dataset.giaKhuyenMai); // Giá khuyến mãi
            const isDiscounted = !isNaN(discountPrice); // Kiểm tra có giá khuyến mãi không

            // Tính tổng tiền cho sản phẩm này
            const total = isDiscounted ? discountPrice * quantity : price * quantity;

            // Cập nhật tổng tiền cho hàng trong bảng
            const subtotalCell = this.closest('tr').querySelector('.pro-subtotal span');
            subtotalCell.textContent = formatPrice(total) + 'đ'; // Cập nhật tổng tiền cho hàng

            // Cập nhật tổng giỏ hàng
            updateCartTotal();
        });
    });

    function updateCartTotal() {
    let totalCart = 0;

    document.querySelectorAll('.pro-subtotal span').forEach(subtotal => {
        const subtotalValue = parseFloat(subtotal.textContent.replace('đ', '').replace(/\./g, '')) || 0;
        totalCart += subtotalValue;
    });

    // Cập nhật tổng giỏ hàng
    const shippingFee = 30000; // Phí vận chuyển
    const totalWithShipping = totalCart + shippingFee; // Tổng tiền bao gồm phí vận chuyển
    const totalCartElement = document.querySelector('#total-cart');
    totalCartElement.textContent = formatPrice(totalWithShipping) + 'đ'; // Cập nhật tổng
}

    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
    }
</script>

<?php require_once 'layout/footer.php';?>