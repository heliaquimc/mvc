<?php 

class Boot{
	private $route;

	function init(){
		$route = $this->getUri();
        list($ctrl, $act) = explode('@', $route['path']);

        $c = new $ctrl();
        if(isset($route['parm'])) $c->$act($route['parm']);
        else $c->$act();
	}

	function setRoute($path, $target){
		$this->route[$path] = $target;
	}

	function getUri(){
		$uri = str_replace('/_1', '', $_SERVER['REQUEST_URI']);
		$uri = array_values(array_filter(explode('/', $uri)));

        switch (count($uri)){
            case 1:
                $path = array_shift($uri);
                break;
            case 2:
                $path = array_shift($uri) .'/'.array_shift($uri);
                break;
            default:
                $path = array_shift($uri) .'/'.array_shift($uri);
                $parm = array_shift($uri);
                break;
        }

		$resp['path'] = "AppController@error";
        if(isset($this->route[$path])){
            $resp['path'] = $this->route[$path];
            if(!empty($parm)){
                $resp['parm'] = $parm;
            }
        }
        return $resp;
	}

}