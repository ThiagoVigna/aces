<?php defined('BASEPATH') or exit('No direct script access allowed');

use DotFw\Infra\CrossCutting\Helpers\Notification;
use DotFw\Infra\CrossCutting\Validation\StringValidator;
use DotFw\Infra\CrossCutting\Validation\Validator;
use  \AE\Entities\PersonEntity;

class Profile extends AE_Controller{

    function __construct(){
        parent ::__construct();

        $this->load->model('Person_model', 'personmodel');
    }

    public function index(){
        $person = new PersonEntity();
        $person->Id = $this->auth->GetUserData('UserId');

        $this->dataView['user'] = $this->personmodel->GetPerson($person);

        $this->dataView['titulo'] = 'ACES English - User profile';
        $this->dataView['subview'] = 'app/profile/form';
        $this->load->view('app/interface/interface', $this->dataView);
    }

    public function save(){
        $id = $this->auth->GetUserData('UserId');
        $first_Name = $this->input->post('First_Name');
        $last_Name = $this->input->post('Last_Name');
        $address_Street = $this->input->post('Address_Street');
        $address_Neigborhood = $this->input->post('Address_Neigborhood');
        $address_City = $this->input->post('Address_City');
        $address_Zipcode = $this->input->post('Address_Zipcode');
        $address_State = $this->input->post('Address_State');
        $phone_Cell = $this->input->post('Phone_Cell');

        $person = new PersonEntity(
            $id,
            $first_Name,
            $last_Name,
            1,
            'STUDENT',
            $address_Street,
            $address_Neigborhood,
            $address_City,
            $address_Zipcode,
            $address_State,
            $phone_Cell
        );

        $result = false;
        if ( Validator::IsValid() ):
            $result = $this->personmodel->save($person);
        endif;

        if($result):
            $this
                ->rest
                ->Code(200)
                ->Result($result)
                ->Message("Dados salvos com sucesso.")
                ->Run();
        else:
            $this
                -> rest
                -> Code(500)
                -> Result(Notification ::GetNotifications())
                -> Message("Houve erros ao salvar os dados. Veja as notificações.")
                -> Run();
        endif;

    }

}