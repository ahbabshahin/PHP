<?php
    $str = "*.csv";
    $filename = glob($str);

    // echo '<pre>';
    // print_r($filename);
    // echo '</pre>';

?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $num = $_GET['num'];
    //echo $num;
   // header("location:table.php?nm='.$num.'");
}
?>