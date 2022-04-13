<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Banners;

$_banners = new Banners();
$banners = $_banners->trash_index();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>List</title>
</head>

<body>
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <h1 class="text-center">Trashed Items</h1>
          <ul class="nav justify-content-center fs-4 mb-2">

            <li class="nav-item">
              <a class="nav-link" href="#">All Trashed items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Index Item</a>
            </li>

          </ul>
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                  <th scope="col">Id</th>
                <th scope="col">Title</th>
                  <th scope="col">Link</th>
                  <th scope="col">Promotional Message</th>
                  <th scope="col">Html Banner</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($banners as $banner) :
              ?>
                <tr>
                    <td><?= $banner['id'];
                        ?></td>
                  <td><?= $banner['title'];
                      ?></td>
                    <td><?= $banner['link'];
                        ?></td>
                    <td><?= $banner['promotional_message'];
                        ?></td>
                    <td><?= $banner['html_banner'];
                        ?></td>



                  <td>

                    <a class="btn btn-danger" onclick="myFunction()" href="delete.php?id=<?php echo $banner['id']; ?>"> Delete </a>
                    <a class="btn btn-success" onclick="myFunction()" href="restore.php?id=<?php echo $banner['id']; ?>"> Restore
                    </a>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>


  <!-- <script>
    function myFunction() {
      alert("It will be delete!!!");
    }
  </script> -->








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