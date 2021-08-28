<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font awsome cdn js -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product</title>
  </head>
  <body>
    
  <?php
  include "partials/_database.php";
  include "partials/_navbar.php";
  
  ?>

//<?php
//if(!isset($_POST['add']))
//{
 // $pid = ;
//print_r($_POST['id']);
//}

//?>


  <div class="container">
    <div class="row">

    <?php
    $pid = $_GET['cat_id'];

    $sql = "SELECT * from product where cat_id = '$pid'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
      $nid = $row['p_id'];
        echo '<div class="col-md-4 my-2">';
       echo' <form method = "post">
        <div class="card" style="width: 18rem;">
        <img src="'.$row['picture'].'" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">'.$row['model'].'</h5>
          <p class="card-text text-center">
          '."Type: ".$row['type'].'<br>'.'
          '."Pixel: ".$row['pixel'].'<br>'.'
          '."Aspect Ratio: ".$row['ratio'].'<br>'.'
          '.'<span>'."Price: ".$row['price'].'</span>'.'<br>'.'
          //<button type="submit" class="btn btn-warning my-2 py-2" name = "add">Add to cart <i class = "fas fa-shopping-cart"></i></button>
          </p>
          
          
        </div>
      </div>
    
    <!-- <input type = "hidden" name = "id" value = "<?php $nid ?>"> -->
      </form>
      </div>';
    
    }
    ?>
    </div>
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
