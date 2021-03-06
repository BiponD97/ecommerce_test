<?php

namespace App;

use PDO;

class Products
{
    public $id = null;
    public $title = null;



    public $conn = null;
    //magic method
    public function __construct()
    {
        //connection to database
        $servername = "localhost";
        $username = "root";
        $password = "";

        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_seip", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //store
    public function store()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce-b4/";

        $file_name = "IMG_" . time() . "_" . $_FILES['picture']['name'];

        $target = $_FILES['picture']['tmp_name'];
        $destination = $approot . 'uploads/' . $file_name;

        $is_file_moved = move_uploaded_file($target, $destination);

        if ($is_file_moved) {
            $_picture = $file_name;
        } else {
            $_picture = null;
        }


        $_title = $_POST['title'];

        //Database datetime Formatting: Y-m-d h-i-s => Collecting from database
        $_created_at = date("Y-m-d h-i-s", time());

        //Is Active or not
        if (array_key_exists("is_active", $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }
        $query = "INSERT INTO `products` (`title`,`pictures`,`is_active`,`created_at`) VALUES (:title,:picture,:is_active,:created_at)";
        $stmt = $this->conn->prepare($query); //statement

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();
        // var_dump($result);

        //redirecting
        header("location:index.php");
    }

    //index
    public function index()
    {

        $query = "SELECT * FROM `products` where is_deleted = 0";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $products = $stmt->fetchAll();
        return $products;



    }
    public function getActiveProducts(){
        $_startFrom = 0;
        $_total = 4;
        $query = "SELECT * FROM `products` where is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $products = $stmt->fetchAll();
        return $products;


        //fetch all data from products
        //var_dump($products);
        //to convert from array to it as list


        //embedding html inside php
    }

    //show
    public function show()
    {
        $_id = $_GET['id'];



        $query = "SELECT * FROM `products` where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        $products = $stmt->fetch();
        return $products;

    }

    //delete
    public function delete()
    {
        $_id = $_GET['id'];
        $query = "DELETE FROM `products` where `id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //trash
    public function trash()
    {
        $_id = $_GET['id'];
        $_is_deleted = 1;

        $query = "UPDATE `products` SET `is_deleted`=:is_deleted WHERE `id`=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
// $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();


// if($result){
//   $_SESSION['message'] = "Pro"
// }
//var_dump($result);
        header("location:index.php");
    }

    //edit
    public function edit()
    {
        $_id = $_GET['id'];


        $query = "SELECT * FROM `products` where `id`= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }

    //restore
    public function restore()
    {
        $_id = $_GET['id'];
        $_is_deleted = 0;
    // $_description =  $_GET['description'];
    // $_link =  $_GET['link'];
    //echo $_title;



        $query = "UPDATE `products` SET `is_deleted`=:is_deleted WHERE `id`=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
    // $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();


    // if($result){
    //   $_SESSION['message'] = "Pro"
    // }
    //var_dump($result);
        header("location:index.php");
    }

    //update
    public function update(){
        $_id =  $_POST['id'];
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce-b4/";
        //Working with image
        if($_FILES['picture']['name'] != '') {
            $file_name = "IMG_" . time() . "_" . $_FILES['picture']['name'];

            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot . 'uploads/' . $file_name;

            $is_file_moved = move_uploaded_file($target, $destination);

            if ($is_file_moved) {
                $_picture = $file_name;
            } else {
                $_picture = null;
            }
        }else{
            $_picture = $_POST['old_picture'];
        }


        $_title =  $_POST['title'];
        //update active inactive
        if (array_key_exists("is_active", $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }
        $_modified_at = date("Y-m-d h-i-s", time());



        //$query = "UPDATE `products` set `title`=:title WHERE `products`.`id`=:id;";
        $query1= "UPDATE `products` SET `title`=:title,`pictures`=:picture,`is_active`=:is_active,`modified_at`=:modified_at WHERE `id`=:id";

        $stmt = $this->conn->prepare($query1);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':modified_at', $_modified_at);


        $result = $stmt->execute();
        // var_dump($result);

        //redirecting
        header("location:index.php");
    }

    //trash_index
    public function trash_index(){
        $query = "SELECT * FROM `products` where is_deleted = 1";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $products = $stmt->fetchAll();
        return $products;
    }

}