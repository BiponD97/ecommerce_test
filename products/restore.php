<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Products;

$_products = new Products();
$products = $_products->restore();


?>


