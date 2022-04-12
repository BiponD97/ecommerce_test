<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Banners;

$_banners = new Banners();
$banners = $_banners->show();


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show </title>
</head>

<body>
    <section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5">
                    <dl>
                        <dt>ID</dt>
                        <dd><?php echo $banners['id']; ?></dd>
                        <dt>Title</dt>
                        <dd><?php echo $banners['title']; ?></dd>
                        <dt>Link</dt>
                        <dd><?php echo $banners['link']; ?></dd>
                        <dt>Promotional Message</dt>
                        <dd><?php echo $banners['promotional_message']; ?></dd>
                        <dt>Html Banner</dt>
                        <dd><?php echo $banners['html_banner']; ?></dd>
                        <dt>Is Active</dt>
                        <dd><?= $banners['is_active'] ? "Active" : "Deactivated";
                            ?></dd>
                        <dt>Is Draft</dt>
                        <dd><?= $banners['is_draft'] ? "Drafted" : "Not Draft";
                            ?></dd>
                        <dt>Created At</dt>
                        <dd><?php echo $banners['created_at']; ?></dd>
                        <dt>Modified At At</dt>
                        <dd><?php echo $banners['modified_at']; ?></dd>
                        <dt>Picture</dt>
                        <dd><?php echo $banners['pictures']; ?>
                            <p><img src="<?= $webroot; ?>uploads/<?= $banners['pictures']; ?>" alt="" height="300" width="300"></p>
                        </dd>
                    </dl>


                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>