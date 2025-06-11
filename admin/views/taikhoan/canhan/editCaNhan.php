<?php include './views/layout/header.php'; ?>

<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

        <div class="row justify-content-center  max" >
            <div class="col-lg-8">
                <div class="card shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white text-center py-3 rounded-top-3">
                        <h4 class="mb-0 fw-bold">Hồ sơ Cá nhân</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri'?>" method="POST" enctype="multipart/form-data">
                            <h5 class="mb-4 text-primary">Thông Cá Nhân</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-12 text-center mb-3">
                                    <label for="profile_picture_input" class="form-label d-block mb-2">Ảnh đại diện</label>
                                    <img id="profile-preview" class="img-fluid rounded-circle mb-3 img-profile" src="<?= BASE_URL . $thongTin['anh_dai_dien'] ?>" alt="Ảnh đại diện" style="width: 120px; height: 120px;">
                                    <input type="file" name="profile_picture" id="profile_picture_input" accept="image/*" class="form-control mx-auto" style="max-width: 250px;">
                                    <div class="form-text">Chỉnh Sửa Ảnh Đại Diện</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="full_name" class="form-label">Tên đầy đủ</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="Nguyễn Văn A" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="user@example.com" disabled>
                                    <div class="form-text">Email không thể thay đổi.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="0912345678">
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="1990-05-20">
                                </div>
                                <div class="col-md-6"><br>
                                    <label for="gender" class="form-label">Giới tính</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="male" selected>Nam</option>
                                        <option value="female">Nữ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" value="Số 1, Đường ABC, Quận XYZ, TP. Hà Nội">
                                </div>
                                <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary btn-lg" value="Lưu thay đổi">
                            </div>
                            </div>
                            </form>
                            <hr class="my-4">

                            <h5 class="mb-4 text-primary">Thay đổi mật khẩu</h5>
                            <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri'?>" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control" id="current_password" name="old_pass" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="new_password" name="new_pass" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_pass" value="">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary btn-lg" value="Lưu thay đổi">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        document.getElementById('profile_picture_input').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('profile-preview').src = URL.createObjectURL(file);
            }
        });
    </script>
</div>
<?php include './views/layout/footer.php'; ?>
