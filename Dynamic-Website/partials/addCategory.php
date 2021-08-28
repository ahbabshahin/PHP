<?php
session_start();

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

    <title>Lea Tech</title>
</head>

<body>

<?php
include "_database.php";
include "_navbar.php";

?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    $model = $_POST['model'];
    $type = $_POST['type'];
    $pixel = $_POST['pixel'];
    $ratio = $_POST['ratio'];
    $price = $_POST['price'];
    $picture = $_POST['picture'];

    $model = htmlentities($model, ENT_QUOTES);
    $type = htmlentities($type, ENT_QUOTES);
    $pixel = htmlentities($pixel, ENT_QUOTES);
    $ratio = htmlentities($ratio, ENT_QUOTES);
    $price = htmlentities($price, ENT_QUOTES);
    $picture = htmlentities($picture, ENT_QUOTES);
    $cat = $_POST['cat'];

    $sql = "INSERT into product(model, type, pixel, ratio, price, picture, cat_id) Value('$model', '$type',  '$pixel', '$ratio', '$price', '$picture', '$cat')";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo '<script>
        alert("Insertion Successful!");
        </script>';
    }

    else{

        echo '<script>
        alert("Check your connection. If it\'s okay then contact the maintenance engineer!");
        </script>';
    }
}

?>

    <div class="container my-3">
        <form action = "dataEntry.php" method = "post">
            <div class="mb-3">
                <label for="cat_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name = "cat_name" id="cat_name">
                
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