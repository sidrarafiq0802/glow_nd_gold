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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include('./sidebar.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("./navbar.php"); ?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        
                        <div class="d-flex">
                            <form class="form-inline mr-2" method="GET" action="">
                                <input class="form-control mr-2" type="search" name="search" placeholder="Search by name..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                                <button class="btn btn-secondary" type="submit">Search</button>
                            </form>
                            
                            <a href="product_add.php" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Add Product
                            </a>
                        </div>
                    </div>

                    <!-- PHP for pagination -->
                    <?php
                    include('./connection.php');

                    $limit = 5;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $start = ($page - 1) * $limit;

                    // Get search term if provided
                    $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";

                    // Count query with optional search
                    if (!empty($searchTerm)) {
                        $countQuery = "SELECT COUNT(*) AS total FROM prod_id WHERE prod_name LIKE '%$searchTerm%'";
                    } else {
                        $countQuery = "SELECT COUNT(*) AS total FROM prod_id";
                    }
                    $countResult = mysqli_query($conn, $countQuery);
                    $total = mysqli_fetch_assoc($countResult)['total'];
                    $pages = ceil($total / $limit);

                    // Data query with optional search
                    if (!empty($searchTerm)) {
                        $sql = "SELECT prod_id.prod_id, prod_id.prod_name, catagories.cat_name, prod_id.prod_img, prod_id.prod_price, prod_id.prod_description 
                                FROM prod_id 
                                JOIN catagories ON prod_id.cat_id = catagories.cat_id 
                                WHERE prod_id.prod_name LIKE '%$searchTerm%'
                                ORDER BY prod_id.prod_id ASC
                                LIMIT $start, $limit";
                    } else {
                        $sql = "SELECT prod_id.prod_id, prod_id.prod_name, catagories.cat_name, prod_id.prod_img, prod_id.prod_price, prod_id.prod_description 
                                FROM prod_id 
                                JOIN catagories ON prod_id.cat_id = catagories.cat_id 
                                ORDER BY prod_id.prod_id ASC
                                LIMIT $start, $limit";
                    }
                    $data = mysqli_query($conn, $sql);
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">PRODUCT ID</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">PRODUCT IMAGE</th>
                                <th scope="col">PRODUCT PRICE</th>
                                <th scope="col">PRODUCT DESCRIPTION</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_assoc($data)) {
                                echo "
                                    <tr>
                                        <td>{$result['prod_id']}</td>
                                        <td>{$result['prod_name']}</td>
                                        <td>{$result['cat_name']}</td>
                                        <td><img src='{$result['prod_img']}' style='height:10vh;width:10vh'></td>
                                        <td>{$result['prod_price']}</td>
                                        <td>{$result['prod_description']}</td>
                                        <td>
                                            <a href='product_edit.php?id={$result['prod_id']}'><button type='button' class='btn btn-success mb-1'>EDIT</button></a>
                                            <a href='product_delete.php?id={$result['prod_id']}'><button type='button' class='btn btn-danger'>DELETE</button></a>
                                        </td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($searchTerm) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $pages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($searchTerm) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($searchTerm) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <?php include("./footer.php"); ?>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
