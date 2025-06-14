<?php   require_once 'layout/header.php'?>
<?php   require_once 'layout/menu.php'?>
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
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                           

                            <div class="card">
                                <h6>Thêm Mã Giảm Giá <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click Nhập Mã Giảm Giá</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn-sqr">Thêm Mã Giảm Giá</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST" >
                    <div class="row">
                        <!-- Checkout Billing Details -->
                        <div class="col-lg-6">
                            <div class="checkout-billing-details-wrap">
                                <h5 class="checkout-title">Thông Tin Người Nhận</h5>
                                <div class="billing-form-wrap">
                                    
                                        <div class="single-input-item">
                                            <label for="ten_nguoi_nhan" class="required">Tên Người Nhận</label>
                                            <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên Người Nhận" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="email_nguoi_nhan" class="required">Địa Chỉ Emai</label>
                                            <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Địa Chỉ Emai" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="sdt_nguoi_nhan">Số Điện Thoại</label>
                                            <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Số Điện Thoại" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="dia_chi_nguoi_nhan">Địa Chỉ Người Nhận</label>
                                            <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa Chỉ Người Nhận" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="ghi_chu">Ghi Chú</label>
                                            <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Nhập Ghi Chú Cho Đơn Hàng Của Bạn ...."></textarea>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary Details -->
                        <div class="col-lg-6">
                            <div class="order-summary-details">
                                <h5 class="checkout-title">Thanh Toán</h5>
                                <div class="order-summary-content">
                                    <!-- Order Summary Table -->
                                    <div class="order-summary-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sản Phẩm</th>
                                                    <th>Tổng Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $tongGioHang = 0;
                                                    foreach ($chiTietGioHang as $key => $sanPham) : 
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="">
                                                            <?= $sanPham['ten_san_pham'] ?> <strong> × <?= $sanPham['so_luong'] ?></strong>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $tongTien = 0;
                                                        if ($sanPham['gia_khuyen_mai']) {
                                                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        }else {
                                                            $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongTien;
                                                        echo formatPrice($tongTien) . 'đ';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr><td>-</td><td>-</td></tr>
                                                <tr>
                                                    <td>Tổng Tiền Sản Phẩm</td>
                                                    <td><strong><?= formatPrice($tongGioHang) . 'đ'; ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Phí Vận Chuyển </td>
                                                    <td class="d-flex justify-content-center">
                                                        <strong>30.000đ</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Thành Tiền</td>
                                                    <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                                                    <td><strong><?= formatPrice($tongGioHang + 30000) . 'đ'; ?></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- Order Payment Method -->
                                    <div class="order-payment-method">
                                        <div class="single-payment-method show">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cashon"  value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                                    <label class="custom-control-label" for="cashon">Thanh Toán Bằng Tiền Mặt</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="cash">
                                                <p>Thanh Toán Khi Nhận Hàng</p>
                                            </div>
                                        </div>
                                        <div class="single-payment-method">
                                            <div class="payment-method-name">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="directbank"  value="2" name="phuong_thuc_thanh_toan_id" class="custom-control-input" />
                                                    <label class="custom-control-label" for="directbank">Thanh Toán Qua Ngân Hàng Hoặc Ví Điện Tử</label>
                                                </div>
                                            </div>
                                            <div class="payment-method-details" data-method="bank">
                                                <p>MOMO</p>
                                                <p>Quét Mã QR</p>
                                                <p>Zalo Pay</p>
                                            </div>
                                        </div>
                                        
                                        <div class="summary-footer-area">
                                            <div class="custom-control custom-checkbox mb-20">
                                                <input type="checkbox" class="custom-control-input" id="terms" required />
                                                <label class="custom-control-label" for="terms">Tôi Đồng Ý Với Tất Cả <a href="index.html">Điều Khoản Và Điều Kiện</a></label>
                                            </div>
                                            <button type="submit" class="btn btn-sqr">Đặt Hàng</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>

<?php
    require_once 'layout/miniCart.php';

    require_once 'layout/footer.php';
?>