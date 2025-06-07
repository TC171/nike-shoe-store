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
                    <h1>Danh Mục Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa Danh Mục Sản Phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">
                            <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Danh Mục</label>
                                    <input type="text" class="form-control" name="ten_danh_muc"
                                        placeholder="Nhập Tên Danh Mục" value="<?= $danhMuc['ten_danh_muc'] ?>">
                                        <?php if(isset($errors['ten_danh_muc'])) {  ?>
                                            <p class="text-danger"><?= $errors['ten_danh_muc']?></p>
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <textarea name="mo_ta" class="form-control" id="" placeholder="Nhập Mô Tả"><?= $danhMuc['mo_ta'] ?>
                                    </textarea>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
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
< </body>

    </html>