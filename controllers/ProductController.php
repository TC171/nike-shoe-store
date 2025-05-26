<?php
class ProductController {
    private $db;

    public function __construct($db) {
        $this->db = $db; // 
    }

    public function index() {
    $shoes = $this->getAllShoes();
    include_once '../views/product.php';
    }

    private function getAllShoes() {
        $query = "SELECT * FROM shoes";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
