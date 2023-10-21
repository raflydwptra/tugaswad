<?php
namespace Controllers;

class Index {

    public function index() {
        include_once 'views/home.php';
        include 'config.php';
$post = new Controllers\Post($conn);

    }
}
?>