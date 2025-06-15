<!-- Header -->
<?php include './views/layout/header.php'; ?>

<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản Lý Đơn Hàng  <?= $donHang['ma_don_hang']?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php 
                    if($donHang['trang_thai_id'] == 1){
                       $colorAlerts = 'primary';
                    }else if($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9 ){
                       $colorAlerts = 'warning';
                    }else if($donHang['trang_thai_id'] == 10 ){
                       $colorAlerts = 'success';
                    }else{
                          $colorAlerts = 'danger';
                    }
                    ?>
                    <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                     Đơn hàng : <?= $donHang['ten_trang_thai'] ?>  
</div>
          <!-- Main content -->
           <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Nike-Shoe-Store
                  <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']); ?> <?php
                   
                   ?>  </small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Thông tin người đặt
                <address>
                  <strong><?= $donHang['ho_ten'] ?></strong><br>
                  <b>Điện thoại:</b> <?= $donHang['so_dien_thoai'] ?><br>
                  <b>Email:</b> <?= $donHang['email'] ?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin người nhận
                <address>
                  <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                  <b>Email:</b> <?= $donHang['email_nguoi_nhan'] ?><br>
                  <b>Số Điện Thoại:</b> <?= $donHang['sdt_nguoi_nhan'] ?><br>
                  <b>Địa chỉ:</b> <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin đơn hàng
                <address>
                <b>Mã đơn hàng : <?= $donHang['ma_don_hang'] ?></b><br>
                <b>Tổng tiền :</b> <?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ<br>
                <b>Ghi chú :</b> <?= $donHang['ghi_chu'] ?><br>
                <b>Thanh toán : </b><?= $donHang['ten_phuong_thuc'] ?><br>
                </address>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tong_tien = 0 ?>
                    <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
  <tr>
    <td><?= $key + 1 ?></td>
    <td><?= $sanPham['ten_san_pham'] ?></td>
    <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> VNĐ</td>
    <td><?= $sanPham['so_luong'] ?></td>
    <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VNĐ</td>
  </tr>
  <?php $tong_tien += $sanPham['thanh_tien'] ?>
<?php endforeach; ?>

</body>
<div class="row">
  <div class="col-6">
    <p class="lead">Phương thức thanh toán:</p>
    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
      <?= $donHang['ten_phuong_thuc'] ?>
    </p>
  </div>
  
      </table>  
      <div class="col-6">
    <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat']?></p>
    <div class="table-responsive">
      <table class="table">
        <tr>
         <th style="width:50%">Thành tiền:</th>
          <td> <?= number_format( $tong_tien )?> VNĐ</td>
        </tr>
        <tr>
            <th style="width:50%">Phí vận chuyển:</th>
            <td>30,000 VNĐ</td>
        </tr>
        <tr>
            <th style="width:50%">Tổng tiền:</th>
            <td> <?=   number_format($tong_tien + 30000) ?></td>
        </tr>
      </table>
 <div="row no-print">
    <div class="col-12">
      <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="btn btn-default"><i class="fas fa-arrow-left"></i> Quay lại</a>
      <button type="button" class="btn btn-success float-right" style="margin-right: 5px;">
        <i class="fas fa-print"></i> In đơn hàng
      </button>
    </div>
  </div>
        </div>
        </div>  
        
</html>