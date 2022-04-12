<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");
use App\Products;

$_products = new Products();
$products = $_products->getActiveProducts();
var_dump($products);
?>

<section class="feature">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="feature-title">
          <h3>Freature Product</h3>
          <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="feature-product">
            <?php
            $_active = 'active';
            foreach($products as $product):
            ?>

          <div class="product-item <?=$_active;?> ">
            <ul class="rating-star d-flex justify-content-center">
              <li>
                <a href="#">
                  <i class="far fa-star"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="far fa-star"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="far fa-star"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="far fa-star"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="far fa-star"></i>
                </a>
              </li>
            </ul>
            <div class="price">
              <span class="old-price">$170.00</span>
              <span class="new-price">$155.00</span>
            </div>
            <div class="product-name">
              <h3>
                <a href="product-details.html">
                  Fusce aliquam
                </a>
              </h3>
            </div>

            <div class="product-image">
              <span class="sale-tag">Sale</span>
              <a href="#">
                <img src="<?=$webroot?>uploads/<?=$product['pictures'];?>" alt="Image Not Found"  width="150px" height="100px">
              </a>
              <div class="add-action-hover">
                <ul>
                  <li>
                    <a href="#" title="Add to Wishlist" data-bs-toggle="tooltip" data-bs-placement="top">
                      <i class="fas fa-heart"></i>
                    </a>
                  </li>
                  <li><a href="#" data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Compare">
                      <i class="fas fa-sync-alt"></i>
                    </a></li>
                  <li><a href="#">
                      <i class="fas fa-eye"></i>
                    </a></li>
                </ul>
              </div>
            </div>

            <div class="product-cart-button">
              <a href="#"> add to cart</a>
            </div>
          </div>
            <?php
            $_active = "";
            endforeach;
            ?>


        </div>
      </div>
    </div>
  </div>
</section>