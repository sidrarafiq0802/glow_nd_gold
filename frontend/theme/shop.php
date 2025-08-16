<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>ADDRESS BOOK</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <style>
	.filter-box {
  background: #f7f7f7;
  padding: 15px 20px;
  border-radius: 6px;
  box-shadow: 0 1px 5px rgba(0,0,0,0.1);
  margin-bottom: 30px;
}

.filter-box label {
  font-weight: bold;
  margin-right: 10px;
}

.filter-box .form-control {
  max-width: 250px;
  display: inline-block;
}
.product-thumb img {
  width: 100%;
  height: 350px!important;
  object-fit: cover;
}
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

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>0129- 12323-123123</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.php">
						<!-- replace logo here -->
						<SPAN>GLOW AND GOLD</SPAN>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="cart.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Cart</a>
						<div class="dropdown-menu cart-dropdown">
							

							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price">$1799.00</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
								<li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->
					<li class="commonSelect">
						<select class="form-control">
							<option>EN</option>
							<option>DE</option>
							<option>FR</option>
							<option>ES</option>
						</select>
					</li><!-- / Languages -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->

<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<?php
include('navbar.php');
?>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

<?php include('connection.php'); ?>

<section class="products section">
  <div class="container">
    <!-- Category Filter -->
    <div class="row">
  <div class="col-md-12">
    <div class="filter-box">
      <form method="GET" class="form-inline">
        <label for="cat_id">Filter by Category:</label>
        <select name="cat_id" id="cat_id" class="form-control" onchange="this.form.submit()">
          <option value="">All Categories</option>
          <?php
            $catSql = "SELECT cat_id, cat_name FROM catagories";
            $catResult = $conn->query($catSql);
            while ($catRow = $catResult->fetch_assoc()) {
              $selected = (isset($_GET['cat_id']) && $_GET['cat_id'] == $catRow['cat_id']) ? 'selected' : '';
              echo "<option value='{$catRow['cat_id']}' $selected>{$catRow['cat_name']}</option>";
            }
          ?>
        </select>
      </form>
    </div>
  </div>
</div>


    <!-- Products Grid -->
    <div class="row">
      <?php
        $where = "";
        if (!empty($_GET['cat_id'])) {
          $cat_id = intval($_GET['cat_id']);
          $where = "WHERE cat_id = $cat_id";
        }

        $sql = "SELECT * FROM prod_id $where";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $prodId = $row['prod_id'];
            $prodName = $row['prod_name'];
            $prodImg = $row['prod_img'];
            $prodPrice = $row['prod_price'];
            $prodDesc = $row['prod_description'];
      ?>
      <div class="col-md-4 mb-4">
        <div class="product-item">
          <div class="product-thumb">
            <img class="img-responsive product-img" src="../../backend/<?php echo $prodImg; ?>" alt="<?php echo $prodName; ?>" />
            <div class="preview-meta">
              <ul>
                <li><span data-toggle="modal" data-target="#product-modal-<?php echo $prodId; ?>"><i class="tf-ion-ios-search-strong"></i></span></li>
                <li><a href="add_to_cart.php?id=<?php echo $prodId; ?>"><i class="tf-ion-android-cart"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="product-content">
            <h4><a href="product-single.php?id=<?php echo $prodId; ?>"><?php echo $prodName; ?></a></h4>
            <p class="price">$<?php echo $prodPrice; ?></p>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal product-modal fade" id="product-modal-<?php echo $prodId; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="tf-ion-close"></i></button>
              <div class="row">
                <div class="col-md-6">
                  <img class="img-responsive" src="../../backend/<?php echo $prodImg; ?>" alt="<?php echo $prodName; ?>" />
                </div>
                <div class="col-md-6">
                  <div class="product-short-details">
                    <h2 class="product-title"><?php echo $prodName; ?></h2>
                    <p class="product-price">$<?php echo $prodPrice; ?></p>
                    <p class="product-short-description"><?php echo $prodDesc; ?></p>
                    <a href="add_to_cart.php?add=<?php echo $prodId; ?>" class="btn btn-main">Add To Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        } else {
          echo "<div class='col-12'><p>No products found.</p></div>";
        }

        $conn->close();
      ?>
    </div>
  </div>
</section>




<?php
include('footer.php');
?>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>
