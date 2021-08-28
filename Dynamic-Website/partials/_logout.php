<?php
session_start();
session_unset();
session_destroy();

header("location:/camera_shop/index.php");
exit();
?>