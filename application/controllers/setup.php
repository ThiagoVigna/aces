<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller{

	function __construct(){
		parent ::__construct();
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> model('user_model', 'model');
	}

	public function index(){

	}

}
