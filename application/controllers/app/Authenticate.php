<?php

class Authenticate extends CI_Controller {

	public function index(){
		$this->auth->Authenticate();
        $this->auth->Authorize();

		$userDiretory = DIR_USERS . $this->auth->GetUserData('UserId');

        if( !is_dir($userDiretory) ){
            if( !mkdir($userDiretory, 0755) ){
                die(__LINE__ . " - Erro inexperado ao acessar o diretório do usuário.");
            }
        }

		redirect(base_url('app'));
	}

	public function __construct(){
		parent::__construct();
	}
}
