<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Báo Cáo Thống Kê</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Thông tin thống kê</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <!-- Thống kê đơn hàng -->
                <div class="col-lg-4 col-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= isset($totalOrders) ? $totalOrders : 5 ?></h3>
                      <p>Tổng số đơn hàng</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-shopping-cart"></i>
                    </div>
                  </div>
                </div>

                <!-- Thống kê sản phẩm -->
                <div class="col-lg-4 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><?= isset($totalProducts) ? $totalProducts : 7 ?></h3>
                      <p>Tổng số sản phẩm</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-box"></i>
                    </div>
                  </div>
                </div>

                <!-- Thống kê người dùng -->
                <div class="col-lg-4 col-6">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3><?= isset($totalUsers) ? $totalUsers : 2 ?></h3>
                      <p>Tổng số người dùng</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php include './views/layout/footer.php'; ?>