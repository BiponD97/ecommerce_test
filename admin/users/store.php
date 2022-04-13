<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Users;

$_users = new Users();
$_users->store();


