<?php



include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");


use App\Products;

$_products = new Products();
$product = $_products->edit();


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Edit</title>
</head>

<body>

  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <h1 class="text-center">Edit</h1>
          <form method="post" action="update.php" enctype="multipart/form-data">
            <div class="mb-3 row">
              <label for="inputTitle" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="inputID" name="id" value="<?= $product['id'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTitle" name="title" value="<?= $product['title'] ?>">
              </div>
            </div>
            <div class="mb-3 row form-check">
              <div class="col-sm-10">
                <?php
                if ($product['is_active'] == 0) {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="InputIsActive" name="is_active">
                <?php
                } else { ?>
                  <input class="form-check-input" type="checkbox" checked value="1" id="InputIsActive" name="is_active">
                <?php
                }
                ?>
                <label class="form-check-label" for="InputIsActive">
                  Is Active
                </label>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="formFile" class="col-sm-2 col-form-label">Picture:</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" name="picture" value="<?= $product['pictures']; ?>">
                <img src="<?= $webroot; ?>uploads/<?= $product['pictures']; ?>">
                  <input
                          type="hidden"
                          name="old_picture"
                          value="<?=$product['pictures'];?>">
              </div>
            </div>
            <button type="Submit" class="btn btn-primary">Update</button>
          </form>
        </div>

      </div>
    </div>
  </section>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>