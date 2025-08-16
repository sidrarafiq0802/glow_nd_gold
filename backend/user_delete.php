<?php
include('./connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM `user_management` WHERE user_id = '$id'";

$result = mysql_query($conn,$sql);

if($result){
    header("Location:http://localhost/e%20prject%20ebook/backend/user_display.php");
}

?>