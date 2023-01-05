<?php
// this function works when user login
function is_login($data,$location){
    if(isset($data)){
        header('Location:'.$location);
        die();
    }
}

// this function works when user not log in
function is_not_login($data,$location){
    if(!isset($data)){
        header('Location:'.$location);
        die();
    }
}


?>