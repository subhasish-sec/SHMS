<?php
session_start();
    // to get the root file path
    function getActualFilePath(){
        $path = __DIR__;
        $startPoint = strpos($path,"\shms");
        $endPoint = intval($startPoint) + 5;
        return substr($path,0,$endPoint);
    }  
    
    // TO INCLUDE THE INITIALIZATION.PHP
    include(getActualFilePath()."/private/initialization.php");

    // **************** it will check whether it is login or not***
    $activeUser = isset($_SESSION['action']) ? $_SESSION['action'] : NULL;
    
    is_login($activeUser,'dashboard.php');

// ****************************************  Login *********************************************
    $error = "";
    if(isset($_POST['login']) && isset($_POST['admin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username,password FROM admin WHERE username='$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $rowData = $result->fetch_assoc();

            if(password_verify($password,$rowData['password'])){
                $_SESSION['username'] = $rowData['username'];
                $_SESSION['action'] = 'admin';
                redirect("dashboard.php");
            }else{

                $error = "Invalid Credential";
            }
        }else{
            
            $error = "Invalid Credential";
        }
    }

    // ****************************** end login *************************************
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo assetsUrl('admin/assets/img/favicon.png')?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/bootstrap.min.css')?>">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/font-awesome.min.css')?>">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/style.css')?>">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <!-- <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo"> -->
                        <h2 style="color: #fff;">Admin</h2>
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <!-- Form -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" autocomplete="off" placeholder="Username"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" autocomplete="off"
                                        placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                                    <input type="hidden" name="admin">
                                </div>
                                <?php if($error != ""){ echo "<p class='alert alert-danger'> {$error} </p>";}; ?>
                            </form>
                            <!-- /Form -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="<?php echo assetsUrl('assets/js/jquery-3.2.1.min.js')?>"></script>

    <!-- Bootstrap Core JS -->
    <script src="<?php echo assetsUrl('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo assetsUrl('assets/js/bootstrap.min.js')?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo assetsUrl('assets/js/script.js')?>"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

</html>