<?php
$loggedin = false;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  $loggedin = true;
} 

?>

<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="/camera_shop/index.php" >Lea Tech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php

        if($loggedin)
        {
          echo '<li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="/camera_shop/adminPanel.php">Admin</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="partials/_signup.php">Signup</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="partials/_logout.php">logout</a>
        </li>';
        }

        if(!$loggedin)
        {
          echo '<li class="nav-item">
          <a class="nav-link text-light" href="partials/_login.php">Admin</a>
        </li>';
        }

        ?>
         
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
         <?php
         include "_database.php";
         
         $sql = "SELECT * from category";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result))
         {echo '
             <li class="nav-item">
             <a class="nav-link text-light" href="/camera_shop/product.php?cat_id='.$row['cat_id'].'">'.$row['cat_name'].'</a>
           </li>';
         }
         ?>
     </ul>
    </div>
  </div>
</nav>