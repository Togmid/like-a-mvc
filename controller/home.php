<?php

class home {
	public function __construct() {
		//.....
		
		$this->news_model = &load_model('news');
	}
	
	public function index($id = 0) {
		$list = $this->news_model->get_list($id);
		$this->_view('index', array('list' => $list, 'id' => $id));
	}
	
	private function _view($view_name, $args) {
		extract($args);
		//$list, $id;
		
		$view_path = 'views/' . __CLASS__ . '/' . $view_name . '.php';
		
		if (file_exists($view_path)) {
			require_once $view_path;
		} else {
			error_404();
		}
	}
}