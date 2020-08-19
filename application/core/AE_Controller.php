<?php defined('BASEPATH') or exit('No direct script access allowed');

class AE_Controller extends CI_Controller{

    public function __controller(){ 
        
        parent::__controller();
        
        $this->dataView['titulo'] = 'Aces English ';

    }

    public $dataView;

}