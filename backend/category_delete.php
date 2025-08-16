<?php
session_start();

if(!isset($_SESSION["email"])){
    echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/login.php';</script>";
}
?>
<?php

include('./connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM `catagories` WHERE cat_id = '$id'";
$data = mysqli_query($conn,$sql);

if($data){
    echo '<script type="text/javascript">
            window.location.href = "http://localhost:82/e%20prject%20ebook/backend/category_display.php";
          </script>';
}

?>