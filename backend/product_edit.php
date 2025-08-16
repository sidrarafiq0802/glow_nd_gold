<?php
session_start();

if(!isset($_SESSION["email"])){
    echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/login.php';</script>";
}
?>
<?php
include('./connection.php');

// Get product ID from URL
$prod_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product data
$prod_sql = "SELECT * FROM `prod_id` WHERE prod_id = $prod_id";
$prod_query = mysqli_query($conn, $prod_sql);
$prod_data = mysqli_fetch_assoc($prod_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADDRESS BOOK</title>

    <!-- Bootstrap and custom styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('./sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include('./navbar.php'); ?>

                <!-- Page Content -->
                <div class="container-fluid">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="prodName" class="form-label">Product Name</label>
                            <input type="text" name="prod_name" value="<?= htmlspecialchars($prod_data['prod_name']) ?>" class="form-control" id="prodName">
                        </div>

                        <div class="mb-3">
                            <label for="categoryDropdown" class="form-label">Category</label>
                            <select name="cat_id" id="categoryDropdown" class="form-select w-100 form-control">
                                <option value="">CHOOSE ANY CATEGORY</option>
                                <?php
                                $cat_sql = "SELECT cat_id, cat_name FROM catagories";
                                $cat_result = mysqli_query($conn, $cat_sql);
                                while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                    $selected = ($cat_row['cat_id'] == $prod_data['cat_id']) ? 'selected' : '';
                                    echo "<option value='{$cat_row['cat_id']}' $selected>{$cat_row['cat_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="prodImg" class="form-label">Product Image</label>
                            <input type="file" name="prod_img" class="form-control" id="prodImg">
                            <?php if (!empty($prod_data['prod_img'])): ?>
                                <img src="<?= htmlspecialchars($prod_data['prod_img']) ?>" alt="Product Image" style="height:15vh; width:15vh; margin-top:1rem;">
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="prodPrice" class="form-label">Product Price</label>
                            <input type="text" name="prod_price" value="<?= htmlspecialchars($prod_data['prod_price']) ?>" class="form-control" id="prodPrice">
                        </div>

                        <div class="mb-3">
                            <label for="prodDesc" class="form-label">Product Description</label>
                            <input type="text" name="prod_desc" value="<?= htmlspecialchars($prod_data['prod_description']) ?>" class="form-control" id="prodDesc">
                        </div>

                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $prod_name = $_POST['prod_name'];
                        $cat_id = $_POST['cat_id'];
                        $prod_price = $_POST['prod_price'];
                        $prod_desc = $_POST['prod_desc'];

                        // Image handling
                        $prod_img_name = $_FILES['prod_img']['name'];
                        $prod_img_tempname = $_FILES['prod_img']['tmp_name'];

                        if (!empty($prod_img_name)) {
                            $location = "images/" . basename($prod_img_name);
                            move_uploaded_file($prod_img_tempname, $location);
                        } else {
                            $location = $prod_data['prod_img'];
                        }

                        // Update query
                        $update_sql = "UPDATE `prod_id` SET 
                            `prod_name` = '$prod_name',
                            `cat_id` = '$cat_id',
                            `prod_img` = '$location',
                            `prod_price` = '$prod_price',
                            `prod_description` = '$prod_desc'
                            WHERE `prod_id` = $prod_id";

                        if (mysqli_query($conn, $update_sql)) {
                            echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/product_display.php';</script>";
exit();

                        } else {
                            echo "<div class='alert alert-danger mt-3'>Update failed: " . mysqli_error($conn) . "</div>";
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Footer -->
            <?php include('./footer.php'); ?>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
