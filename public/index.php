<?php
session_start();
function __autoload($class){
    $arrFolder = ['app/controller', 'app/model', 'app/view', 'conf', 'core'];
    foreach($arrFolder as $folder) {
        if (file_exists("../$folder/$class.php")) {
            require_once "../$folder/$class.php";
            break;
        }
    }
}

function pre($cont){
    echo "<pre>";
    print_r($cont);
    echo "</pre>";
}

$b = new Boot();
$b->init();
