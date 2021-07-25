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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Big Bang Theory</title>
</head>

<body>

    <?php
  include 'partials/_dbconnect.php';
include 'partials/_navbarAdmin.php';

?>

    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $rdo = $_POST['rdo'];

    $sql = "INSERT INTO `data` (`Full_Name`, `Email`, `DOB`, `Opinion`) VALUES ( '$name', '$email', '$dob', '$rdo');";
    // $sql = "INSERT into data(Full_Name, Email,DOB) VALUES('$name', '$email''$dob')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your data have been entered.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        ';
    } else {
        echo mysqli_error($conn);
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> We are having some problems. Please try again someother times.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
}

?>

    <div class="container my-2">

    <h1><p class = "text-center"> Input your Information </p></h1>  

        <form action="indexAdmin.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">

            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>


            <!-- <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" name = "pass" id="pass">
  </div> -->

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob">
            </div>

            <label class="form-check-label" for="cbox">Political Opinon</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="rdo" id="rdo" Value="Yes">
                <label class="form-check-label" for="rdo"> Yes
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="rdo" id="rdo" Value="No">
                <label class="form-check-label" for="rdo"> No
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>