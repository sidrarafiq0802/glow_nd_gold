<?php
include("connection.php"); // DB connection file

// Set a static user ID (replace with actual logic in production)
$userId = 1;

// Handle Remove Action
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
  $cartId = (int)$_GET['remove'];
  mysqli_query($conn, "DELETE FROM cart WHERE cart_id = $cartId AND user_id = $userId");
  header("Location: cart.php"); // Prevent resubmission
  exit();
}

// Handle Quantity Update Action
if (isset($_POST['update_quantity']) && isset($_POST['cart_id']) && isset($_POST['quantity'])) {
  $cartId = $_POST['cart_id'];
  $quantity = $_POST['quantity'];

  // Fetch the price of the product
  $productQuery = "SELECT p.prod_price FROM prod_id p JOIN cart c ON p.prod_id = c.prod_id WHERE c.cart_id = $cartId";
  $productResult = mysqli_query($conn, $productQuery);
  $product = mysqli_fetch_assoc($productResult);
  $price = $product['prod_price'];

  // Update quantity and total price
  $totalPrice = $price * $quantity;
  mysqli_query($conn, "UPDATE cart SET quantity = $quantity, total_price = '$totalPrice' WHERE cart_id = $cartId AND user_id = $userId");
  header("Location: cart.php");
  exit();
}

// Fetch Cart Items
$query = "
  SELECT c.cart_id, c.total_price, c.quantity, p.prod_name AS product_name, p.prod_img AS product_image
  FROM cart c
  JOIN prod_id p ON c.prod_id = p.prod_id
  WHERE c.user_id = $userId
";
$cartItems = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cart</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .logo span {
  font-family: 'Arial', sans-serif;
  font-size: 28px;
  font-weight: bold;
  color: #333; /* Dark text for good contrast */
  text-transform: uppercase;
  letter-spacing: 2px;
}
  </style>
</head>

<body>

<!-- Main Menu Section -->
<section class="menu">
  <nav class="navbar navigation">
    <div class="container">
      <div class="navbar-header">
        <h2 class="menu-title">Main Menu</h2>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <?php include('./navbar.php'); ?>
    </div>
  </nav>
</section>

<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content">
          <h1 class="page-name">Cart</h1>
          <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Quantity</th>
                      <th class="">Total Price</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (mysqli_num_rows($cartItems) > 0): ?>
                      <?php while($item = mysqli_fetch_assoc($cartItems)): ?>
                        <tr>
                          <td>
                            <div class="product-info">
                              <img width="80" src="../../backend/<?php echo htmlspecialchars($item['product_image']); ?>" alt="">
                              <a href="#!"><?php echo htmlspecialchars($item['product_name']); ?></a>
                            </div>
                          </td>
                          <td>$<?php echo number_format($item['total_price'] / $item['quantity'], 2); ?></td>
                          <td>
                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                          </td>
                          <td>$<?php echo number_format($item['total_price'], 2); ?></td>
                          <td>
                            <a class="product-remove" href="cart.php?remove=<?php echo $item['cart_id']; ?>">Remove</a>
                            <button type="submit" name="update_quantity" class="btn btn-primary">Update</button>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    <?php else: ?>
                      <tr><td colspan="5" class="text-center">Your cart is empty.</td></tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                <a href="checkout.php" class="btn btn-main pull-right">Proceed to Checkout</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('./footer.php'); ?>

<!-- Essential Scripts -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="plugins/instafeed/instafeed.min.js"></script>
<script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
<script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/slick/slick-animation.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>
</html>
