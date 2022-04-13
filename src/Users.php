<?php

namespace App;

use PDO;

class Users
{
    public $id = null;
    public $user_name = null;
    public $password = null;
    public $full_name = null;
    public $email = null;
    public $phone = null;
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




        $_user_name = $_POST['user_name'];
        $_password = $_POST['password'];
        $_full_name = $_POST['full_name'];
        $_email = $_POST['email'];
        $_phone = $_POST['phone'];

        //Database datetime Formatting: Y-m-d h-i-s => Collecting from database
        $_created_at = date("Y-m-d h-i-s", time());
        $query = "INSERT INTO `users` (`user_name`,`password`,`full_name`,`email`,`phone`,`created_at`) VALUES (:user_name,:password,:full_name,:email,:phone,:created_at)";
        $stmt = $this->conn->prepare($query); //statement

        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':full_name', $_full_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone', $_phone);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();
        // var_dump($result);

        //redirecting
        header("location:index.php");
    }

    //index
    public function index()
    {

        $query = "SELECT * FROM `users` where is_deleted = 0";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $users = $stmt->fetchAll();
        return $users;



    }
    public function getActiveProducts(){
        $_startFrom = 0;
        $_total = 4;
        $query = "SELECT * FROM `users` where is_active = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $users = $stmt->fetchAll();
        return $users;

    }

    //show
    public function show()
    {
        $_id = $_GET['id'];



        $query = "SELECT * FROM `users` where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        $users = $stmt->fetch();
        return $users;

    }

    //delete
    public function delete()
    {
        $_id = $_GET['id'];
        $query = "DELETE FROM `users` where `id` = :id";

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

        $query = "UPDATE `users` SET `is_deleted`=:is_deleted WHERE `id`=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //edit
    public function edit()
    {
        $_id = $_GET['id'];


        $query = "SELECT * FROM `users` where `id`= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    //restore
    public function restore()
    {
        $_id = $_GET['id'];
        $_is_deleted = 0;



        $query = "UPDATE `users` SET `is_deleted`=:is_deleted WHERE `id`=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        // $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $result = $stmt->execute();
        header("location:index.php");
    }

    //update
    public function update(){
        $_id =  $_POST['id'];
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce-b4/";


        $_user_name =  $_POST['user_name'];
        $_password =  $_POST['password'];
        $_full_name =  $_POST['full_name'];
        $_email =  $_POST['email'];
        $_phone =  $_POST['phone'];

        $_modified_at = date("Y-m-d h-i-s", time());



        //$query = "UPDATE `products` set `title`=:title WHERE `products`.`id`=:id;";
        $query1= "UPDATE `users` SET `user_name`=:user_name,`password`=:password,`full_name`=:full_name,`email`=:email,`phone`=:phone,`modified_at`=:modified_at WHERE `id`=:id";

        $stmt = $this->conn->prepare($query1);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':full_name', $_full_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':phone', $_phone);
        $stmt->bindParam(':modified_at', $_modified_at);


        $result = $stmt->execute();
        //redirecting
        header("location:index.php");
    }

    //trash_index
    public function trash_index(){
        $query = "SELECT * FROM `users` where is_deleted = 1";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute();

        $users = $stmt->fetchAll();
        return $users;
    }

}