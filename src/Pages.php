<?php


namespace App;
use PDO;

class Pages
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
    public function index(){

//$query="INSERT INTO `products` (`title`) VALUES (:title)";

        $query = "SELECT * FROM `pages`";
        $stmt = $this->conn->prepare($query);



//$stmt->bindParam(':title',$_title);


        $result = $stmt->execute();
        $pages = $stmt->fetchAll();
        return $pages;
    }
    public function edit(){
        $_id = $_GET['id'];

        $query = "SELECT * FROM `pages` where `id`= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);


//$stmt->bindParam(':title',$_title);


        $result = $stmt->execute();
        $page = $stmt->fetch();
        return $page;
//var_dump($products);
    }
    public function show(){
        $_id = $_GET['id'];



        $query="SELECT * FROM `pages` where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);


//$stmt->bindParam(':title',$_title);


        $result = $stmt->execute();
        $pages = $stmt->fetch();
        return $pages;
    }

    public function update(){
        $_id =  $_POST['id'];
        $_title =  $_POST['title'];
        $_description =  $_POST['description'];
        $_link =  $_POST['link'];






        $query = "UPDATE `pages` SET `title` = :title, `description` = :description, `link` = :link WHERE `pages`.`id` = :id";


        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':description', $_description);
        $stmt->bindParam(':link', $_link);


        $result = $stmt->execute();

// var_dump($result);

//redirecting
        header("location:index.php");

    }
    public function store(){
        $_title =  $_POST['title'];
        $_description =  $_POST['description'];
        $_link =  $_POST['link'];
//echo $_title;



        $query="INSERT INTO `pages` (`title`,`description`,`link`) VALUES (:title,:description,:link)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title',$_title);
        $stmt->bindParam(':description',$_description);
        $stmt->bindParam(':link',$_link);
        $result = $stmt->execute();
//var_dump($result);
        header("location:index.php");
    }
    public function delete(){
        $_id =  $_GET['id'];
// $_description =  $_GET['description'];
// $_link =  $_GET['link'];
//echo $_title;



        $query="DELETE FROM `pages` where `id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id',$_id);
// $stmt->bindParam(':description',$_description);
// $stmt->bindParam(':link',$_link);
        $result = $stmt->execute();


// if($result){
//   $_SESSION['message'] = "Pro"
// }
//var_dump($result);
        header("location:index.php");
    }
}