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
          <h1>Quản Lý Danh Sách Đơn Hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listDonHang as $key => $donHang): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $donHang['ma_don_hang'] ?></td>
                      <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                      <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                      <td><?= $donHang['ngay_dat'] ?></td>
                      <td><?= $donHang['tong_tien'] ?></td>
                      
                      <td><span class="badge text-bg-<?= $donHang['ten_trang_thai'] ?>"><?= $donHang['ten_trang_thai'] ?></span></td>
                      <td>
                        <div class="btn-group">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>"><button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>"><button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>
