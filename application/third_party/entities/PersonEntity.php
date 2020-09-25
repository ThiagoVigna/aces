<?php namespace AE\Entities;

use DotFw\Infra\CrossCutting\Validation\StringValidator;
use DotFw\Infra\CrossCutting\Validation\Validator;

class PersonEntity {

	public int $Id;
	public string $First_Name;
	public string $Last_Name;
	public int $IsActive =1;
	public string  $EProfile;
	public ?string $Photo_Profile = NULL;
	public ?string $Photo_Main = NULL;

	public string $Date_Create;
	public ?string $Date_Update = NULL;

	public function __construct(
		int $id,
		string $First_Name,
		string $Last_Name,
		int $IsActive = 0,
		string $EProfile = 'STUDENT',
		string $Photo_Profile = NULL,
		string $Photo_Main = NULL
	){
		StringValidator::IsEmpty($First_Name, 'Primeiro nome', 'O primeiro nome não pode ser vazio');
		StringValidator::IsEmpty($Last_Name, 'Segundo nome', 'O segundo nome não pode ser vazio');

		StringValidator::HasMinLen($First_Name, 2, 'Primeiro nome', 'O primeiro nome não tem a quantidade mínima de caracteres.');
		StringValidator::HasMinLen($Last_Name, 3, 'Segundo nome', 'O segundo nome não tem a quantidade mínima de caracteres.');

		StringValidator::HasMaxLen($First_Name, 25, 'Primeiro nome', 'O primeiro nome deve ter no máximo 25 caracteres.');
		StringValidator::HasMaxLen($Last_Name, 50, 'Segundo nome', 'O segundo nome  deve ter no máximo 50 caracteres.');

		if( Validator::IsValid() ):

			if($id == 0):
				$this->Date_Create = date('Y-m-d H:i:s');
			else:
				$this -> Id = $id;
				$this->Date_Update = date('Y-m-d H:i:s');
			endif;

			$this -> First_Name = $First_Name;
			$this -> Last_Name = $Last_Name;
			$this -> IsActive = $IsActive;
			$this -> EProfile = $EProfile;
			$this -> Photo_Profile = $Photo_Profile;
			$this -> Photo_Main = $Photo_Main;
		endif;
	}


}
