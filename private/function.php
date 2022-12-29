<?php


//for source like css,js,img etc(it will return  /shms/public/source/ )
function assetsUrl($path){
    if($path[0] != '/'){
        $path = '/'.$path;
    }
    return WWW_PATH.$path;
}


function url($path){
    
}

?>