<?php
ob_start();
   // get directory path

   //PATH LINK
   define("PATH",__FILE__);
   
   //get private path (it will return C:\xampp\htdocs\shms\private)
   define("PRIVATE_PATH",dirname(PATH)); 
   
   //get public path(it will return C:\xampp\htdocs\shms\public)
   define("PUBLIC_PATH",dirname(PRIVATE_PATH)."\public");

    // get document path
    // $link = $_SERVER['SCRIPT_NAME'];
    // echo $link;
    define("WWW_PATH","/shms/public/source");

    include_once("function.php");
    include_once("database_connection.php");
    include_once("authentication.php");
  
?>