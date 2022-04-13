<?php
//var_dump($_POST)

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");


use App\Users;

$_users = new Users();
$users = $_users->trash();
