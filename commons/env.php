<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/mvc-oop-basic/nike-shoe-store/');
define('BASE_URL_ADMIN'       , 'http://localhost/mvc-oop-basic/nike-shoe-store/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'nike-shoe-store');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
