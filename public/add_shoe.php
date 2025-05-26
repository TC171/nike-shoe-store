<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Giày</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Thêm Giày Mới</h1>
        <form action="process_add_shoe.php" method="POST">
            <div class="form-group">
                <label for="name">Tên Giày:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="brand">Thương Hiệu:</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>

            <div class="form-group">
                <label for="size">Kích Thước:</label>
                <input type="number" class="form-control" id="size" name="size" required>
            </div>

            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="quantity">Số Lượng:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="form-group">
                <label for="image">Hình Ảnh:</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Giày</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>