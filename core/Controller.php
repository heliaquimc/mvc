<?php

class Controller{

    function view($file, $arrVar = array(), $layout = true){
        extract($arrVar);
        ob_start();
        if($layout) include _HEADER_.'.php';
        include "../app/view/$file.php";
        if($layout) include _FOOTER_.'.php';
        echo ob_get_clean();
        exit;
    }
}