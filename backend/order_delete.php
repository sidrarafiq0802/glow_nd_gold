<?php

$id = $_GET['id'];

include('./connection.php');

$sql = "DELETE FROM `checkout_details` WHERE id = '$id'";

$query = mysqli_query($conn, $sql);
if($query){
    header("Location:http://localhost/e%20prject%20ebook/backend/Order-Details.php");
}

?>