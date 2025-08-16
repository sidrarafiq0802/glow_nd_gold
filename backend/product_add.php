<?php
session_start();

if(!isset($_SESSION["email"])){
    echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
       include('./sidebar.php');
       ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php
include("./navbar.php");
               ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Product Add</h1>
                        
                    </div>
                    <form action ="" method ="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product name</label>
    <input type="text"  name ="prod_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">cat-id</label>
    <select name="cat_id" class="form-select form-control" id="cat_id">

        <option value="">CHOOSE ANY PRODUCT</option>
        <?php
include("./connection.php");

$cat_sql = "SELECT * FROM `catagories`";
$cat_query = mysqli_query($conn,$cat_sql);

while($cat_data = mysqli_fetch_assoc($cat_query)){
    echo "
    <option value='{$cat_data['cat_id']}'>{$cat_data['cat_name']}</option>
    ";
}
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product image</label>
    <input type="file" name ="prod_img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product price</label>
    <input type="text" name ="prod_price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product descripition</label>
    <input type="text" name ="prod_desc" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-warning">ADD</button>

</form>
                  <?php

include("./connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$prod_name = $_POST['prod_name'];
$cat_id = $_POST['cat_id'];
$prod_img_name = $_FILES['prod_img']['name'];
$prod_img_tempname = $_FILES['prod_img']['tmp_name'];
$prod_price = $_POST['prod_price'];
$prod_desc= $_POST['prod_desc'];

$location = "images/".$prod_img_name;
    
    $sql = "INSERT INTO `prod_id`( `prod_name`, `cat_id`, `prod_img`, `prod_price`, `prod_description`) VALUES
     ('$prod_name','$cat_id','$location', '$prod_price', '$prod_desc')";

    $data = mysqli_query($conn,$sql);
if($data){

    if(move_uploaded_file($prod_img_tempname,$location)){
        echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/product_display.php';</script>";
exit();
    }
    else {
        echo "Image not moved";
    }
}
else{
    echo "Error in File upload";
}
}

?>

            
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
include("./footer.php");
               ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>