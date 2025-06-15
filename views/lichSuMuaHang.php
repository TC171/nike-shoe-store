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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">Chi Tiết Sản Phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
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
                                        <th class="pro-thumbnail">Mã Đơn Hàng</th>
                                        <th class="pro-title">Ngày Đặt</th>
                                        <th class="pro-price">Tổng Tiền</th>
                                        <th class="pro-quantity">Phương Thức Thanh Toán</th>
                                        <th class="pro-subtotal">Trạng Thái</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($donHang as $donHang): 
                                    ?>

                                    <tr>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= formatPrice($donHang['tong_tien']). 'đ' ?></td>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id'] ]?></td>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                        
                                        <td>
                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr">Chi Tiết Đơn Hàng</a>
                                            <?php if($donHang['trang_thai_id'] ) : ?>
                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr" onclick="return confirm('Xác Nhận Hủy Đơn Hàng')">Hủy Đơn Hàng</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
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