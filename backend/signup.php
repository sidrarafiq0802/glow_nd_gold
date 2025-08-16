<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADDRESS BOOK - Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Styles for Sign Up Page -->
    <style>
        body {
            background: linear-gradient(135deg, #6e7dff, #66a7ff);
            font-family: 'Nunito', sans-serif;
        }

        .signup-container {
            margin-top: 10%;
        }

        .signup-card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: white;
        }

        .signup-card .btn-primary {
            background-color: #6e7dff;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 12px;
        }

        .signup-card .btn-primary:hover {
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
    </style>
</head>

<body id="page-top">

    <div class="container d-flex justify-content-center align-items-center signup-container">
        <div class="card signup-card shadow-lg col-md-4">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Sign Up</h4>

                <!-- Sign-Up Form -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number"
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
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>

                <!-- Already have an Account Link -->
                <div class="text-center mt-3">
                    <span>Already have an Account? <a href="login.php" class="forgot-password">Login</a></span>
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

</body>

</html>
<?php
include('./connection.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $firstname=$_POST['first_name'];
    $lastname=$_POST['last_name'];
    $email=$_POST['email'];
    $contact=$_POST['contact_number'];
    $password=$_POST['password'];
    
    $sql = "INSERT INTO `user_management`( `first_name`, `last_name`, `email`, `contact_number`, `password`) 
    VALUES ('$firstname','$lastname','$email','$contact','$password')";
    $result = mysqli_query($conn,$sql);
    
    if($result){
        echo "<script>window.location.href = 'http://localhost:82/e%20prject%20ebook/backend/login.php';</script>";
exit();
    }
}

?>