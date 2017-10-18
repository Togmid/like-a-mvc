<?php

if (!function_exists('load_class')) {
	
	function &load_class($class, $san = 'core') {
		static $_classes = array();
		if (isset($_classes[$class]))
		{
			return $_classes[$class];
		}
		
		require $san . '/' . $class . '.php';
		$obj = new $class();
		$_classes[$class] = $obj;
		return $obj;
	}
	
}

if (!function_exists('load_model')) {
	
	function &load_model($model, $san = 'models') {
		$m_class = $model . '_model';
		
		static $_models = array();
		if (isset($_models[$m_class]))
		{
			return $_models[$m_class];
		}
		
		require $san . '/' . $m_class . '.php';
		$obj = new $m_class();
		$_models[$m_class] = $obj;
		return $obj;
	}
	
}

if (!function_exists('utf8_header')) {

    function utf8_header($type = 'text/html') {
        header('Content-Type: ' . $type . '; charset=UTF-8');
    }
	
	function error_404() {
		header("HTTP/1.1 404 Page not found!", TRUE, 404);
		exit;
	}

}