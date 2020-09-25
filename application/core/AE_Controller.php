<?php defined('BASEPATH') or exit('No direct script access allowed');

class AE_Controller extends CI_Controller{

    public function __construct(){
        
        parent::__construct();
        
        $this->dataView['titulo'] = 'Aces English ';

        $this->auth->Authorize();

    }

    public $dataView;

}
