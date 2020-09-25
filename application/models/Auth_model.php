<?php

use DotFw\Infra\CrossCutting\Helpers\Notification;
use AE\Entities\PersonEntity;
use AE\Entities\CredentialsEntity;

class Auth_model extends CI_Model{

	private $CI;

	function __construct() {
		parent ::__construct();

		$this->CI = &get_instance();
	}

	public function save(PersonEntity $personEntity, CredentialsEntity $credentialsEntity) {
		$this->CI->load->model('credentials_model');
		$this->CI->load->model('person_model');

		try{
			$this->db->trans_begin();

			$lastPersonId = $this->person_model->save($personEntity);

			$credentialsEntity->SetPersonId($lastPersonId);
			$this->credentials_model->save($credentialsEntity);

			$this->db->trans_commit();

			return true;
		}catch (Exception $exception){
			$this->db->trans_rollback();

			Notification::SetNotification("Banco de dados", $exception->getMessage());

			return false;
		}
	}

	public function login(CredentialsEntity $credentialsEntity){

	}
}
