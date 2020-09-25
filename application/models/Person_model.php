<?php

use AE\Entities\PersonEntity;

class Person_model  extends CI_Model{

	public function save(PersonEntity $personEntity){
		$person = (array) $personEntity;

		$this->db->insert('person', $person);
		return $this->db->insert_id();
	}

	public function __construct() {
		parent ::__construct();
	}
}
