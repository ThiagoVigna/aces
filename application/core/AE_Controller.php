<?php defined('BASEPATH') or exit('No direct script access allowed');

use  \AE\Entities\PersonEntity;
use DotFw\Infra\CrossCutting\Helpers\Notification;

class AE_Controller extends CI_Controller{

	public $auth;
	public $personmodel;

    public function __construct(){
        
        parent::__construct();        
        $this->dataView['titulo'] = 'Aces English ';
        $this->auth->Authorize();
        $this->dataView['userData'] = self::getUserData();
    }

    private function getUserData(){
        $this->load->model('Person_model', 'personmodel');
        $id = $this->auth->GetUserData('UserId');
        $name = $this->auth->GetUserData('FullName');
        $person = new PersonEntity($id, $name, $name);
        Notification::DeleteAll(); /*Deleta todas as notificações existentes */
        return $this->personmodel->GetPerson($person);
    }
    public $dataView;
}
