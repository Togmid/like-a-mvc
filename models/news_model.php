<?php

class news_model {
	
	public function __construct() {
		
	}
	
	public function get_list($cid = 0) {
		return array(
			array('name' => 'article 1'),
			array('name' => 'article 2')
		);
	}
}