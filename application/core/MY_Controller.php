<?php

class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Books';
		$this->load->model('books_model');
		//$this->data['books'] = $this->books_model->
	}
}