<?php 

class Boot{
	private $route;

	function init(){
		$route = $this->getUri();
        list($controller, $action) = $route['path'];

        $c = new $controller();
        if(isset($route['parm'])) $c->$action($route['parm']);
        else $c->$action();
	}

	function setRoute($path, $target){
		$this->route[$path] = $target;
	}

	function getUri(){
		$uri = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));

        switch (count($uri)){
            case 1:
                $path = array_shift($uri);
                break;
            case 2:
                $path = array_shift($uri) .'/'.array_shift($uri);
                break;
            default:
                $path = array_shift($uri) .'/'.array_shift($uri);
                $parm = $uri;
                break;
        }

		$resp['path'] = ['AppController','error'];
        if(isset($this->route[$path])){
            $resp['path'] = $this->route[$path];
            if(!empty($parm)){
                $resp['parm'] = $parm;
            }
        }
        return $resp;
	}

}