<?php
require_once 'routes.php';
require_once 'conf.php';

class Boot{
    function init(){
        $route = Route::get();
        list($ctrl, $act) = explode('@', $route['path']);

        $c = new $ctrl();
        if(isset($route['parm'])) $c->$act($route['parm']);
        else $c->$act();
    }
}