<?php


//for source like css,js,img etc(it will return  /shms/public/source/ )
function assetsUrl($path){
    if($path[0] != '/'){
        $path = '/'.$path;
    }
    return WWW_PATH.$path;
}
//  for upload pic or any type of file
function uploadFile($path){
    if($path[0] != '/'){
        $path = '/'.$path;
    }
    return "/shms/public/upload".$path;
}


// this function redirect to another page
function redirect($location){
    header("location:".trim($location));
    die();
}

// to get page title
function pageTitle($data){
    $pageTitle = [
       'index.php'=>'Login',
        'dashboard.php' => 'Dashboard',
        'specialization.php' => 'Specialization',
        'doctor.php' => 'Doctor',
        'profile.php' => 'Profile'
    ];
    if(isset($data)){
        $getPage = explode('/', $data);
        foreach($pageTitle as $key => $value){
            if($key === $getPage[count($getPage)-1]){
                return $value;
                break;
            }
        }
    }
}
//  has password
function hash_password($password){
    if(isset($password)){
        $hashPassword = password_hash($password,PASSWORD_DEFAULT);
        return $hashPassword;
    }
    return;
}

// test
function test($d){
    echo "<pre>";
    print_r($d);
    die();
}

?>