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

    //********************** log out ***************/
    if(isset($_GET['req']) && trim($_GET['req']) === trim('logout')){
       session_unset();
       session_destroy();
       redirect('index.php');
    }else{
        redirect('dashboard.php'); // if req is not set the redirect to dashboard page
    }
    
?>