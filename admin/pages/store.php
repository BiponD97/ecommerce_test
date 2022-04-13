<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Pages;

$_pages = new Pages();
$page= $_pages->store();
//var_dump($products);
