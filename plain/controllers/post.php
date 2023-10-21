<?php
namespace Controllers;

include_once "dao/post.php";
use DAO\PostDAO;

class Post {
    private $postDAO;

    public function __construct($conn = null) {
        $this->postDAO = new PostDAO($conn);
    }

    public function index() {
        $posts = $this->postDAO->getAll();
        include_once 'views/post.php';
    }

    public function doPost() {
        $user_id = $_POST['user_id'];
        $content = $_POST['content'];

        // Handle file upload
        $target_dir = "uploads/"; // Specify the directory where you want to save the uploaded images
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File has been successfully uploaded
            // Insert the record into the database with the image path
            $image_path = $target_file; // You should store the path in your database

            $this->postDAO->insert($user_id, $content, $image_path);
        } else {
            // File upload failed
            // You can handle the error accordingly
            echo "File upload failed!";
        }

        header('location:/post');
    }
}
?>
