<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");
use App\Banners;

$_banners = new Banners();
$banners = $_banners->getActiveBanners();
//var_dump($products);
?>

<div class="banner-area d-flex">
    <?php
    $_active = 'active';
    foreach($banners as $banner):
    ?>
  <div class="w-33-33">
    <a href="#">
      <img src="<?=$webroot?>uploads/<?=$banner['pictures'];?>" alt="Image Not Found" class="img-fluid">
    </a>
  </div>
        <?php
        $_active = "";
    endforeach;
    ?>

</div>