<?php

use AE\Entities\PersonEntity;

class Person_model  extends CI_Model{

	public function save(PersonEntity $entity){

        $person = (array) $entity;

	    if($entity->Id == 0){
            $this->db->insert('person', $person);
            return $this->db->insert_id();
        }else{
	        $this->db->where('Id', $entity->Id);
            $this->db->update('person', $person);
            return $entity->Id;
        }

	}

	public function __construct() {
		parent ::__construct();
	}

    public function GetPerson(PersonEntity $personEntity){
	    $this->db->where('Id', $personEntity->Id);
	    $data = $this->db->get('person');
	    return $data->row();
    }
}
