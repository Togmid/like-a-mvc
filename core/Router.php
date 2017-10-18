<?php

class Router {
	
	public function __construct() {
		$script_name = trim($_SERVER['SCRIPT_NAME'], '/');
		$script_arr = explode('/', $script_name);
		$this->site_dir = $script_arr[0];
		$uri = trim($_SERVER['REQUEST_URI'], '/');
		$clean_uri = str_replace('//', '/', $uri);
		$this->segments = explode('/', $clean_uri);
		
		if ($this->segments[0] == $this->site_dir) {
			array_shift($this->segments);
		}
	}
	
	public function routing() {
		$this->controller = count($this->segments) > 0 ? $this->segments[0] : 'home';
		$this->method = count($this->segments) > 1 ? $this->segments[1] : 'index';
		
		$controller_path = 'controller/' . $this->controller . '.php';
		if (file_exists($controller_path)) {
			require_once $controller_path;
			$controller_name = $this->controller;
			$controller = new $controller_name();
			
			if (method_exists($controller, $this->method)) {
				$s_segs = (count($this->segments) > 1 ? array_slice($this->segments, 2) 
				: (count($this->segments) > 0 ? array_slice($this->segments, 1) : $this->segments));
				
				call_user_func_array(array(&$controller, $this->method), $s_segs);
			} else {
				error_404();
			}
		} else {
			error_404();
		}
	}
}
