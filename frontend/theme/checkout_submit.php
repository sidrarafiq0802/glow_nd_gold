<?php
// Include database connection
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and fetch POST data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $card_expiry = mysqli_real_escape_string($conn, $_POST['card_expiry']);
    $card_cvc = mysqli_real_escape_string($conn, $_POST['card_cvc']);
    $total_price = mysqli_real_escape_string($conn, $_POST['total_price']);

    // Insert the data into the checkout_details table
    $sql = "INSERT INTO checkout_details (full_name, address, zip_code, city, country, card_number, card_expiry, card_cvc, total_price) 
            VALUES ('$full_name', '$address', '$zip_code', '$city', '$country', '$card_number', '$card_expiry', '$card_cvc', '$total_price')";

    if (mysqli_query($conn, $sql)) {
        // Successfully inserted the order details
        echo "<script>
        alert('Thank you for buying from Us!!')
        </script>";
        header("Location:http://localhost:80/e%20prject%20ebook/frontend/theme/index.php");
    } else {
        // Error inserting data
        echo "<script>
        alert('Something Went Wrong!!')
        </script>";
    }
} else {
    // If the form was not submitted
    echo "<h2>Please fill in the checkout form.</h2>";
}

mysqli_close($conn);
?>
