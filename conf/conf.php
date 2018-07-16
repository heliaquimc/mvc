<?php

define('_RADDR_', $_SERVER['REMOTE_ADDR']);
date_default_timezone_set('America/Sao_Paulo');

$local = ['localhost', '127.0.0.1', '::1'];
if(in_array(_RADDR_, $local)) define('_LOCAL_', true);

if(defined('_LOCAL_') && _LOCAL_ != false){
    error_reporting(E_ALL);
}else{
    error_reporting(0);
}

define('_HEADER_', '../app/view/_layout/header');
define('_FOOTER_', '../app/view/_layout/footer');

