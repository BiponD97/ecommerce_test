<?php
//var_dump($_POST)

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Banners;

$_banners = new Banners();
$banners = $_banners->trash();
