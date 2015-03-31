<?php

class Router {
    public static function Start() {
        $urlArray = @explode("/", $_SERVER["REDIRECT_URL"]);
        if(!empty($urlArray[1])) { $dDriver = $urlArray[1]; } else { $dDriver = "index"; }
        if(!empty($urlArray[2])) { $dAction = $urlArray[2]; } else { $dAction = "index"; }
		
		$GLOBALS['driver'] = $dDriver;
		$GLOBALS['action'] = $dAction;
		$GLOBALS['link']  = $urlArray;
		
		spl_autoload_register("loadclass");
		
        @include_once(SITE_ROOT. "/engine/controllers/". $dDriver .".php");
		
		if(NO_MVC == "no") {
			
			$controllerClassName = $dDriver . "Controller";
			$actionMethod = "action". $dAction;
			
			if(!class_exists($controllerClassName)) {
				header('HTTP/1.1 404 Not Found');
			}
			
			$controllerClass = new $controllerClassName;
			
			if(!method_exists($controllerClass, $actionMethod)) { 
				header('HTTP/1.1 404 Not Found'); 
			}
			else {
				$controllerClass->$actionMethod(); 
			}
		
		}

		return 1;
    }
}

function loadclass($class) {
	include_once(SITE_ROOT . "/engine/" . strtolower($class) . ".php");
}

?>
