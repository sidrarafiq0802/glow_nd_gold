<?php
include('connection.php');

// Set a static user ID (for testing or simplified logic)
$userId = 1;

// Check if product ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$prod_id = intval($_GET['id']);

// Fetch product price from the product table
$prod_query = "SELECT prod_price FROM prod_id WHERE prod_id = $prod_id";
$prod_result = mysqli_query($conn, $prod_query);

// Ensure the product exists
if (!$prod_result || mysqli_num_rows($prod_result) == 0) {
    die("Product not found");
}

$product = mysqli_fetch_assoc($prod_result);
$price = $product['prod_price'];

// Check if product already in cart for this user
$check_cart = "SELECT * FROM cart WHERE prod_id = $prod_id AND user_id = $userId";
$result = mysqli_query($conn, $check_cart);

// If product is already in cart, update it
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $newQty = $row['quantity'] + 1;
    $newTotal = $price * $newQty;

    $update = "UPDATE cart SET quantity = $newQty, total_price = '$newTotal' WHERE prod_id = $prod_id AND user_id = $userId";
    mysqli_query($conn, $update);
} else {
    // Insert new entry for the product in the cart
    $insert = "INSERT INTO cart (prod_id, quantity, total_price, user_id) VALUES ($prod_id, 1, '$price', $userId)";
    mysqli_query($conn, $insert);
}

// Redirect to the cart page
header("Location: cart.php");
exit();
?>
