<?php

namespace App;

use PDO;

class Banners
{
    public $id = null;
    public $title = null;
    public $promotional_message = null;
    public $html_banner = null;

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

    //delete
    public function delete()
    {
        $_id = $_GET['id'];
        $query = "DELETE FROM `banners` where `id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //edit
    public function edit()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `banners` where `id`= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        $banner = $stmt->fetch();
        return $banner;
    }

    //index
    public function index()
    {

        $query = "SELECT * FROM `banners` where soft_delete = 0";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;


    }

    //restore
    public function restore()
    {
        $_id = $_GET['id'];
        $_soft_delete = 0;
        $query = "UPDATE `banners` SET `soft_delete`=:soft_delete WHERE `id`=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        // $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':soft_delete', $_soft_delete);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //show
    public function show()
    {
        $_id = $_GET['id'];
        $query = "SELECT * FROM `banners` where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        $banners = $stmt->fetch();
        return $banners;

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
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];
        $_html_banner = $_POST['html_banner'];
        //Database datetime Formatting: Y-m-d h-i-s => Collecting from database
        $_created_at = date("Y-m-d h-i-s", time());

        //Is Active or not
        if (array_key_exists("is_active", $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }
        //Is Drafted or not
        if (array_key_exists("is_draft", $_POST)) {
            $_is_draft = $_POST['is_draft'];
        } else {
            $_is_draft = 0;
        }
        $query = "INSERT INTO `banners` (`title`,`link`,`promotional_message`,`html_banner`,`pictures`,`is_active`,`is_draft`,`created_at`) VALUES (:title,:link,:promotional_message,:html_banner,:picture,:is_active,:is_draft,:created_at)";
        $stmt = $this->conn->prepare($query); //statement

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':promotional_message', $_promotional_message);
        $stmt->bindParam(':html_banner', $_html_banner);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_draft', $_is_draft);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();
        // var_dump($result);

        //redirecting
        header("location:index.php");
    }

    //trash
    public function trash()
    {
        $_id = $_GET['id'];
        $_soft_delete = 1;

        $query = "UPDATE `banners` SET `soft_delete`=:soft_delete WHERE `id`=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        // $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':soft_delete', $_soft_delete);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //trash_index
    public function trash_index()
    {
        $query = "SELECT * FROM `banners` where soft_delete = 1";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;
    }

    //update
    public function update()
    {
        $_id = $_POST['id'];
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce-b4/";
        //Working with image
        if ($_FILES['picture']['name'] != '') {
            $file_name = "IMG_" . time() . "_" . $_FILES['picture']['name'];

            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot . 'uploads/' . $file_name;

            $is_file_moved = move_uploaded_file($target, $destination);

            if ($is_file_moved) {
                $_picture = $file_name;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $_POST['old_picture'];
        }


        $_title = $_POST['title'];
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];
        $_html_banner = $_POST['html_banner'];
        //update active inactive
        if (array_key_exists("is_active", $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }
        //update draft or not
        if (array_key_exists("is_draft", $_POST)) {
            $_is_draft = $_POST['is_draft'];
        } else {
            $_is_draft = 0;
        }
        $_modified_at = date("Y-m-d h-i-s", time());


        //$query = "UPDATE `products` set `title`=:title WHERE `products`.`id`=:id;";
        $query1 = "UPDATE `banners` SET `title`=:title, `link`=:link, `promotional_message`=:promotional_message, `html_banner`=:html_banner,`pictures`=:picture,`is_active`=:is_active,`is_draft`=:is_draft,`modified_at`=:modified_at WHERE `id`=:id";

        $stmt = $this->conn->prepare($query1);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':promotional_message', $_promotional_message);
        $stmt->bindParam(':html_banner', $_html_banner);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_draft', $_is_draft);
        $stmt->bindParam(':modified_at', $_modified_at);


        $result = $stmt->execute();
        // var_dump($result);

        //redirecting
        header("location:index.php");
    }

    //Active Status Products
    public function getActiveProducts()
    {
        $_startFrom = 0;
        $_total = 4;
        $query = "SELECT * FROM `banners` where is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;

    }

}