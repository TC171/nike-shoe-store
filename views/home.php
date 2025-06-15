<?php   require_once 'layout/header.php'?>
<?php   require_once 'layout/menu.php'?>
   


    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/sl1.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/sl2.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/sl3.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero slider area end -->
        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao Hàng</h6>
                                <p>Miễn Phí Giao Hàng </br> Cho Đơn Hàng Từ 1 Tỷ Đồng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ Trợ</h6>
                                <p>Chăm Sóc Khách Hàng 27/4</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hoàn Tiền</h6>
                                <p>Trong Vòng 30 Ngày Khi Sản Phẩm Lỗi  </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh Toán</h6>
                                <p>Bảo Mật Thanh Toán 100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/slider/sl6.png" alt="product banner">
                            </a>
                            <div class="banner-content text-center">
                                <h5 class="banner-text1">NEW ARRIVALLS</h5>
                                <h2 class="banner-text2">Pearl<span>Necklaces</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/slider/sl2.png" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">NEW DESIGN</h5>
                                <h2 class="banner-text2">Diamond<span>Jewelry</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Bán Chạy</h2>
                            <p class="sub-title">sản phẩm được cập nhập liên tục</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach ($listSanPham as $key => $sanPham) :  ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']) ;
                                                        $ngayHienTai = new DateTime();
                                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                        if ($tinhNgay->days <=7) {
                                                    ?>
                                                            <div class="product-label new">
                                                                <span>Hàng Mới Về</span>
                                                            </div>

                                                    <?php }?>

                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>

                                                            <div class="product-label discount">
                                                                <span>SALE</span>
                                                            </div>

                                                    <?php } ?>
                                                    
                                                </div>
                                                
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">Xem Chi Tiết Sản Phẩm</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                
                                                
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham']; ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) {?>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']);?>đ</del></span><br>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']); ?>đ</span>
                                                        
                                                    <?php }else{ ?>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']);?>đ</del></span>
                                                    <?php }?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                         <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        
    </main>


<?php
    require_once 'layout/miniCart.php';
    require_once 'layout/footer.php';
?>