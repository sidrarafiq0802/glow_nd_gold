<?php
include("connection.php");

$_id =$_GET['id'];
$sql ="DELETE FROM `prod_id` WHERE prod_id = '$_id'";
$data =mysqli_query($conn,$sql);
if($data){
    echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/product_display.php';</script>";
exit();
}
?>