<?php

class Dashboard extends AE_Controller{

	public function index(){

		$this->dataView['titulo'] = 'ACES English';
		$this->dataView['subview'] = 'app/dashboard/body';

		$this->load->view('app/interface/interface', $this->dataView);

	}


	public function __controller() {
		parent ::__controller(); // TODO: Change the autogenerated stub
	}
}
