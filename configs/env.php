<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nike-shoe-store');

// Kết nối đến cơ sở dữ liệu
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($db->connect_error) {
    die("Kết nối thất bại: " . $db->connect_error);
}
?>