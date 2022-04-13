<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Users;

$_users = new Users();
$users = $_users->show();


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
                        <dd><?php echo $users['id']; ?></dd>
                        <dt>User Name</dt>
                        <dd><?php echo $users['user_name']; ?></dd>
                        <dt>Password</dt>
                        <dd><?php echo $users['password']; ?></dd>
                        <dt>Full Name</dt>
                        <dd><?php echo $users['full_name']; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $users['email']; ?></dd>
                        <dt>Phone</dt>
                        <dd><?php echo $users['phone']; ?></dd>
                        <dt>Created At</dt>
                        <dd><?php echo $users['created_at']; ?></dd>
                        <dt>Modified At</dt>
                        <dd><?php
                            if($users['modified_at'] != ""){
                                echo $users['modified_at'];
                                }else{
                                echo "Data Not Modified Yet";
                            }
                            ?></dd>
                        <dt>Go back to Users list</dt>
                        <dd><a class="btn btn-info" href="index.php"> Users </a></dd>

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