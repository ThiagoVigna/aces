<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	function __construct()
	{
		parent ::__construct();
	}

	public function validation()
	{
		return $this -> db -> get("credentials") -> result();
	}

	public function new_Credentials($new)
	{
		$this -> db -> insert("credentials", $new);
	}
}
