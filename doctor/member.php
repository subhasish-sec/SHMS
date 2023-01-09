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


<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<h2>Welcome, <?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a></h2>
<p>
PBA INSTITUTE
</p>
</body>
</html>
<?php
}
?>


