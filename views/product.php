<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Giày</title>
</head>
<body>
    <header>
        <h1>Danh Sách Giày</h1>
    </header>
    <main>
        <ul>
            <?php foreach ($shoes as $shoe): ?>
                <li>
                    <h2><?php echo htmlspecialchars($shoe['name']); ?></h2>
                    <p>Thương hiệu: <?php echo htmlspecialchars($shoe['brand']); ?></p>
                    <p>Kích thước: <?php echo htmlspecialchars($shoe['size']); ?></p>
                    <p>Giá: <?php echo number_format($shoe['price'], 0, ',', '.'); ?> VNĐ</p>
                    <p>Số lượng: <?php echo htmlspecialchars($shoe['quantity']); ?></p>
                    <p>Mô tả: <?php echo htmlspecialchars($shoe['description']); ?></p>
                    <img src="<?php echo htmlspecialchars($shoe['image']); ?>" alt="<?php echo htmlspecialchars($shoe['name']); ?>" width="150">
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
    <footer>
        <p>&copy; 2025 Cửa Hàng Giày Nike</p>
    </footer>
</body>
</html>