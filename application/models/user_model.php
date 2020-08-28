<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function get_person($id){
		$this -> db -> where('id', $id);
		$query = $this -> db -> get('person');
		if ( $query -> num_rows() > 1 ):
		$row = $query -> row();
		return $row->First_Name;
		else:
			return NULL;
		endif;

	}
}
