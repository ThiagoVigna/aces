<?php

use AE\Entities\CredentialsEntity;

class Credentials_model extends CI_Model {

// 	public function login(CredentialsEntity $credentialsEntity){
// 		$sql = <<<SQL
// SELECT
// 		c.Email
		
// 	,	CONCAT(p.First_Name, ' ', p.Last_Name ) AS FullName
// 	,	p.Id AS UserId
//     ,   p.Photo_Profile
//     ,   p.Photo_Main
		
// FROM credentials c
// JOIN person p ON p.Id = c.PersonId
// WHERE
// 			c.Email = ?
// 	AND c.Password = ?
// 	AND c.IsActive = 1
	
// LIMIT 1;
// SQL;

// 		//$this->db->where('Email', $credentialsEntity->Email);
// 		//$this->db->where('Password', $credentialsEntity->Password);
// 		//$executeQuery = $this->db->get('credentials');

// 		$executeQuery = $this->db->query($sql, [$credentialsEntity->Email, $credentialsEntity->Password]);
// 		return $executeQuery->result();
// 	}
public function login(CredentialsEntity $credentialsEntity){
    $this->db->select('c.Email, CONCAT(p.First_Name, " ", p.Last_Name) AS FullName, p.Id AS UserId, p.Photo_Profile, p.Photo_Main');
    $this->db->from('credentials c');
    $this->db->join('person p', 'p.Id = c.PersonId');
    $this->db->where('c.Email', $credentialsEntity->Email);
    $this->db->where('c.Password', $credentialsEntity->Password);
    $this->db->where('c.IsActive', 1);
    $this->db->limit(1);
    $executeQuery = $this->db->get();
    return $executeQuery->result();
}

	public function save(CredentialsEntity $credentialsEntity){
		$credentials = (array) $credentialsEntity;
		$this->db->insert('credentials', $credentials);

		return $this->db->insert_id();
	}

	public function __construct() {
		parent ::__construct();
	}

}
