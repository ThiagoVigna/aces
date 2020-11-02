<?php defined('BASEPATH') or exit('No direct script access allowed');

use  \AE\Entities\PersonEntity;

class AE_Controller extends CI_Controller{

    public function __construct(){
        
        parent::__construct();
        
        $this->dataView['titulo'] = 'Aces English ';

        $this->auth->Authorize();

        $this->dataView['userData'] = self::getUserData();

    }

    private function getUserData(){
        $this->load->model('Person_model', 'personmodel');
        $person = new PersonEntity();
        $person->Id = $this->auth->GetUserData('UserId');
        return $this->personmodel->GetPerson($person);
    }

    public $dataView;

}
