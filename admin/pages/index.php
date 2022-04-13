<?php



include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce-b4/config.php");

use App\Pages;

$_pages = new Pages();
$pages = $_pages->index();
//var_dump($products);


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>List </title>
</head>

<body>
    <section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <h1 class="text-center mb-4">List</h1>
                    <ul class="nav justify-content-center fs-3 mb-2">

                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add an item</a>
                        </li>
                        <!-- For 0 for trash and 1 for restore -->
                        <li class="nav-item">
                            <a class="nav-link" href="">Link</a>
                        </li>

                    </ul>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Link</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($pages as $page) :
                            ?>

                                <tr>
                                    <td><?= $page['id'];
                                        ?></td>
                                    <td><?= $page['title'];
                                        ?></td>
                                    <td><?= $page['description'];
                                        ?></td>
                                    <td><?= $page['link'];
                                        ?></td>

                                    <td> <a class="btn btn-dark" href="show.php?id=<?php echo $page['id']; ?>"> Show </a>
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $page['id']; ?>"> Edit </a>

                                        <a class="btn btn-danger" onclick="myFunction()" href="delete.php?id=<?php echo $page['id']; ?>"> Delete </a>
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
    <script>
        function myFunction() {
            alert("It will be delete!!!");
        }
    </script>

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