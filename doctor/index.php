<?php
function getActualFilePath(){
    $path = __DIR__;
    $startPoint = strpos($path,"\shms");
    $endPoint = intval($startPoint) + 5;
    return substr($path,0,$endPoint);
}  

// TO INCLUDE THE INITIALIZATION.PHP
include(getActualFilePath()."/private/initialization.php");
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
    <link rel="stylesheet" href="<?php  echo assetsUrl('admin/assets/css/bootstrap.min.css')?>"> 

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/font-awesome.min.css')?>">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/style.css')?> ">

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
                        <h2 style="color: #fff;">Doctor</h2>
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to Dashborad</p>

                            <!-- Form -->
                            <form action="" method="post">
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
                              
                                </div>
                                
                            </form>
                            <!-- /Form -->
                            <?php
if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];



	//$con=mysql_connect('localhost','root','') or die(mysql_error());
	//mysql_select_db('user_registration') or die("cannot select DB");
	$con= mysqli_connect("localhost","root","","shms",3306);

	$query=$con->query("SELECT * FROM doctors WHERE docEmail='".$username."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($query))
	{
	$dbemail=$row['docEmail'];
	$dbpassword=$row['docPassword'];
	}

	if($username == $dbemail && password_verify($password,$dbpassword))
	{
	session_start();
	$_SESSION['sess_user']=$username;

	/* Redirect browser */
	header("Location: doctor-dashboard.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>
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
    <script src="<?php echo assetsUrl('assets/js/bootstrap.min.js')?>">"></script>
    <script src="<?php echo assetsUrl('assets/js/script.js')?> "></script>

    <!-- Custom JS -->
    <script src=" "></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

</html>