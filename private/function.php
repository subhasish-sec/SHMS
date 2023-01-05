<?php


//for source like css,js,img etc(it will return  /shms/public/source/ )
function assetsUrl($path){
    if($path[0] != '/'){
        $path = '/'.$path;
    }
    return WWW_PATH.$path;
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
        'specialization.php' => 'Specialization'
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

?>