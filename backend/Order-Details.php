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

    <title>ADDRESS BOOK</title>

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
                <div class="px-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 text-gray-800">Order Details</h1>
        
    </div>
                <!-- Begin Page Content -->
                <table class="table">
                <thead>
                <tr>
                                <th scope="col">ORDER ID</th>
                                <th scope="col">FULL NAME</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col">ZIP CODE</th>
                                <th scope="col">CITY</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">CARD NUMBER</th>
                                <th scope="col">EXPIRY (MM/YY)</th>
                                <th scope="col">CVC</th>
                                <th scope="col">TOTAL PRICE</th>
                                <th scope="col">ORDER DATE</th>
                                <th scope="col">ACTION</th>
                            </tr>
</thead>
<tbody>

                            <?php
                            // Include the database connection
                            include('./connection.php');

                            // Query to fetch orders
                            $sql = "SELECT * FROM `checkout_details`";
                            $data = mysqli_query($conn, $sql);

                            // Loop through all results and display them in the table
                            while($result = mysqli_fetch_assoc($data)){
                                echo "
                                <tr>
                                    <td>{$result['id']}</td>
                                    <td>{$result['full_name']}</td>
                                    <td>{$result['address']}</td>
                                    <td>{$result['zip_code']}</td>
                                    <td>{$result['city']}</td>
                                    <td>{$result['country']}</td>
                                    <td>{$result['card_number']}</td>
                                    <td>{$result['card_expiry']}</td>
                                    <td>{$result['card_cvc']}</td>
                                    <td>{$result['total_price']}</td>
                                    <td>{$result['order_date']}</td>
                                    <td> 
                                        <a href='order_delete.php?id={$result['id']}' class='text-white'><button type='button' class='btn btn-danger'>DELETE</button></a>
                                    </td>
                                </tr>
                                ";
                            }
                            ?>
                        </tbody>
 </table>
 </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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