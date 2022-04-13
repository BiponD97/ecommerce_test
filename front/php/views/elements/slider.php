<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");
use App\Banners;

$_banners = new Banners();
$banners = $_banners->getActiveSliders();
//var_dump($banners);
?>

<section class="slider">
    <?php
    $_active = 'active';
    foreach($banners as $banner):
    ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

    <div class="carousel-inner">

      <div class="carousel-item <?=$_active;?>">
        <img src="<?=$webroot?>uploads/<?=$banner['pictures'];?>" alt="Image Not Found" class="d-block w-100">

        <div class="overlay">
          <div class="container">
            <h5>New Way to design</h5>
            <h1>Your Family's Future</h1>
            <h4> <a href="#">Sale up to 70% all products</a> <span></span></h4>
            <a href="#" class="shop-now">Shop Now <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
          <?php
          $_active = "";
          endforeach;
          ?>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>