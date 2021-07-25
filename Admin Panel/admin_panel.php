<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header('location: login.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Panel</title>
  </head>
  <body>
    <?php
      include 'partials/_dbconnect.php';
      include 'partials/_navbarAdmin.php';

    ?>

<div class="container my-3">

<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Welcome to our website <?php
echo $_SESSION['username'];

?></h4>
    <p>Hey! How you doin!<br>
        Could we be... anymore happy!
    </p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link
        </a>.</p>
</div>
</div>

<div class="container my-3">
<h1><p class = "text-center">Activity Table </p></h1>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Show Data</th>
      <th scope="col">Delete Data</th>
      <th scope="col">Update Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td><button type="button" class="btn btn-primary"><a href = "partials/_showData.php" 
      class = "text-dark" target = "_">Show Data</a></button></td>

      <td><button type="button" class="btn btn-danger"><a href = "partials/_deleteData.php" 
      class = "text-dark" target = "_">Delete Data</a></button></td>

      <td><button type="button" class="btn btn-success"><a href = "partials/_updateData.php" 
      class = "text-dark" target = "_">Update Data</a></button></td>
    </tr>
  
  </tbody>
</table>

</div>


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
