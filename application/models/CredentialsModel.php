<?php


class CredentialsModel extends CI_Model {

	public function login(string $email, string $password){

		$sql = <<<SQL
SELECT
		CONCAT(p.First_Name, ' ', p.Last_Name) as FullName
	
	,	c.Email
	,	c.`Password`
FROM `credentials` c
LEFT JOIN person p ON p.Id = c.PersonId

WHERE
			c.Email = 'paulopereira.tec@outlook.com'
	AND c.`Password` = '33585d799fb68cbfb74a0b66607b9920'
	AND c.IsActive = 'YES'

LIMIT 1
SQL;

		$credential = $this->db->query($sql);

		return $credential;

	}

	public function __construct() {
	}

}
