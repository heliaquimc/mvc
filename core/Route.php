<?php

class Route{

    private static $arrRoute;

    public static function set($path, $ctrl){
        self::$arrRoute[$path] = $ctrl;
    }

    public static function get(){
        preg_match('/^(?<c>\/\w+\/?)(?<a>\/\w*\/?)?(?<p>\/.*?)?$/', $_SERVER['REQUEST_URI'], $m);
        $m = array_filter($m, "is_string", ARRAY_FILTER_USE_KEY);

        if(empty($_SESSION['auth'])) return ["path" => "AuthController@login"];
        if(empty($m)) return ["path" => self::$arrRoute['/']];

        $path = $m['c'] . (isset($m['a']) ? $m['a'] : '');
        $path = preg_replace('/^\//', '', preg_replace('/\/$/', '', $path));

        $resp['path'] = "AppController@error";
        if(isset(self::$arrRoute[$path])){
            $resp['path'] = self::$arrRoute[$path];
            if(!empty($m['p'])){
                $xp = explode('/', $m['p']);
                $resp['parm'] = array_values(array_filter($xp));
            }
        }
        return $resp;
    }
}