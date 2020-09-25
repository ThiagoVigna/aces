<?php

class Authenticate extends CI_Controller {

	public function index(){
		$this->auth->Authenticate();
		redirect(base_url('app'));
	}

	public function __construct(){
		parent::__construct();
	}
}
