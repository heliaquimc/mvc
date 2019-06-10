<?php

session_start();
define('_HEADER_', '../app/view/header');
define('_FOOTER_', '../app/view/footer');
date_default_timezone_set('America/Sao_Paulo');
function pre($cont){echo "<pre>"; print_r($cont); echo "</pre>";}
function prex($cont){echo "<pre>"; print_r($cont); echo "</pre>"; exit;}
if(true){ error_reporting(E_ALL);ini_set('display_errors', 1);ini_set('display_startup_errors', 1);}

function __autoload($class){
    $arrFolder = ['core', 'app/controller', 'app/model', 'app/view'];
    foreach($arrFolder as $folder) {
        if (file_exists("../$folder/$class.php")) {
            require_once "../$folder/$class.php";
            break;
        }
    }
}

$b = new Boot();
$b->setRoute('/', ['AppController','home']);
$b->setRoute('test', ['AppController','test']);
$b->init();