<?php
session_start();
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Styles for Login Page -->
    <style>
        body {
            background: linear-gradient(135deg, #6e7dff, #66a7ff);
            font-family: 'Nunito', sans-serif;
        }

        .login-container {
            margin-top: 10%;
        }

        .login-card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: white;
        }

        .login-card .btn-primary {
            background-color: #6e7dff;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 12px;
        }

        .login-card .btn-primary:hover {
            background-color: #4a5fd9;
        }

        .forgot-password {
            font-size: 14px;
            color: #6e7dff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .social-buttons .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .social-buttons .facebook {
            background-color: #3b5998;
        }

        .social-buttons .twitter {
            background-color: #00acee;
        }
    </style>
</head>

<body id="page-top">

    <div class="container d-flex justify-content-center align-items-center login-container">
        <div class="card login-card shadow-lg col-md-4">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Login</h4>

                <!-- Login Form -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="email" class="form-control" id="username" name="email" placeholder="Username"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>

                <?php
include('./connection.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql = "SELECT * FROM `user_management` where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);
    if($count = mysqli_num_rows($result) > 0){
        $_SESSION['email'] = $data['email'];
        echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/index.php';</script>";
exit();
    }else{
        echo "Wrong Credentials";
        
    }
}
                ?>

                <!-- Forgot Password Link -->
                <div class="text-center mt-3">
                    <span>Dont have an Account?<a href="signup.php" class="forgot-password">Sign Up</a></span>
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
