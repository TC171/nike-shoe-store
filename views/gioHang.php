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
                                        <th class="pro-thumbnail">Ảnh sản phẩm </th>
                                        <th class="pro-title">Tên san phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $tongGioHang = 0;
                                        foreach($chiTietGioHang as $key=>$sanPham): 
                                    ?>

                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL. $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                        <td class="pro-title"><a href="#"><?=$sanPham['ten_san_pham'] ?></a></td>
                                        <td class="pro-price"><span>
                                            <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <?= formatPrice($sanPham['gia_khuyen_mai']). 'đ' ?></span></td>
                                            <?php } else{ ?>
                                            <?=formatPrice($sanPham['gia_san_pham']). 'đ' ?></span></td>
                                            <?php }?>

                                        <td class="pro-quantity">
                                            <div class="pro-qty"><input type="number" data-gia-khuyen-mai="<?= $sanPham['gia_khuyen_mai'] ?>" data-gia="<?= $sanPham['gia_san_pham'] ?>" style="width: 25px;" value="<?=$sanPham['so_luong'] ?>">
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>
                                                <?php 
                                            $tongTien = 0;
                                            if ($sanPham['gia_khuyen_mai']) {
                                                $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                            }else{
                                                 $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                            }
                                            $tongGioHang += $tongTien;
                                            echo formatPrice($tongTien) . 'đ';
                                            ?>
                                            </span></span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update">
                                <a href="#" class="btn btn-sqr">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Thanh Toán</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm :</td>
                                            <td><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phí Vân chuyển :</td>
                                            <td>30.000đ</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng thanh toán: </td>
                                            <td class="total-amount"><?= formatPrice($tongGioHang + 30000) . 'đ' ?></td>
                                        </tr>
                                    </table>
                                </div>
                                 
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
                        </div>
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