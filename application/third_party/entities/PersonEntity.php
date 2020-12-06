<?php namespace AE\Entities;

use DotFw\Infra\CrossCutting\Validation\StringValidator;
use DotFw\Infra\CrossCutting\Validation\Validator;

class PersonEntity {

    public int $Id;
    public string $First_Name;
    public string $Last_Name;
    public int $IsActive = 1;
    public string  $EProfile;
    public ?string $Photo_Profile = NULL;
    public ?string $Photo_Main = NULL;

    public string $Date_Create;
    public ?string $Date_Update = NULL;
    public ?string $Address_Street = NULL;
    public ?string $Address_Neigborhood = NULL;
    public ?string $Address_City = NULL;
    public ?string $Address_State = NULL;
    public ?string $Address_Zipcode = NULL;
    public ?string $Phone_Cell = NULL;

    public function __construct(
        int $id = 0,
        string $First_Name = "",
        string $Last_Name = "",
        int $IsActive = 0,
        string $EProfile = 'STUDENT',
        string $Address_Street = NULL,
        string $Address_Neigborhood = NULL,
        string $Address_City = NULL,
        string $Address_Zipcode = NULL,
        string $Address_State = NULL,
        string $Phone_Cell = NULL,
        string $Photo_Profile = NULL,
        string $Photo_Main = NULL
	){
		StringValidator::IsEmpty($First_Name, 'Primeiro nome', 'O primeiro nome não pode ser vazio');
		StringValidator::IsEmpty($Last_Name, 'Segundo nome', 'O segundo nome não pode ser vazio');

		StringValidator::HasMinLen($First_Name, 2, 'Primeiro nome', 'O primeiro nome não tem a quantidade mínima de caracteres.');
		StringValidator::HasMinLen($Last_Name, 3, 'Segundo nome', 'O segundo nome não tem a quantidade mínima de caracteres.');

		StringValidator::HasMaxLen($First_Name, 25, 'Primeiro nome', 'O primeiro nome deve ter no máximo 25 caracteres.');
		StringValidator::HasMaxLen($Last_Name, 50, 'Segundo nome', 'O segundo nome  deve ter no máximo 50 caracteres.');

        if(!is_null($Address_Street) || strlen($Address_Street) > 0){
            StringValidator::HasMinLen($Address_Street, 5, 'Logradouro', 'O logradouro deve ter no mínimo 5 caracteres.');
            StringValidator::HasMaxLen($Address_Street, 150, 'Logradouro', 'O logradouro deve ter no máximo 150 caracteres.');
        }

        if(!is_null($Address_Neigborhood) || strlen($Address_Neigborhood) > 0){
            StringValidator::HasMinLen($Address_Neigborhood, 10, 'Bairro', 'O Bairro deve ter no mínimo 10 caracteres.');
            StringValidator::HasMaxLen($Address_Neigborhood, 150, 'Bairro', 'O Bairro deve ter no máximo 150 caracteres.');
        }

        if(!is_null($Address_City) || strlen($Address_City) > 0){
            StringValidator::HasMinLen($Address_City, 5, 'Cidade', 'A Cidade deve ter no mínimo 10 caracteres.');
            StringValidator::HasMaxLen($Address_City, 150, 'Cidade', 'A Cidade deve ter no máximo 150 caracteres.');
        }

        if(!is_null($Address_Zipcode) || strlen($Address_Zipcode) > 0)
            StringValidator::HasLen($Address_Zipcode, 10, 'CEP', 'O CEP deve ter 10 caracteres.');

        if(!is_null($Phone_Cell) || strlen($Phone_Cell) > 0){
            StringValidator::HasMinLen($Phone_Cell, 14, 'telefone celular', 'O telefone celular deve ter no mínimo 14 caracteres.');
            StringValidator::HasMaxLen($Phone_Cell, 15, 'telefone celular', 'O telefone celular deve ter no máximo 15 caracteres.');
        }

        if( Validator::IsValid() ):

			if($id == 0):
				$this->Date_Create = date('Y-m-d H:i:s');
			else:
				$this->Id = $id;
				$this->Date_Update = date('Y-m-d H:i:s');
			endif;

			$this->First_Name = $First_Name;
			$this->Last_Name = $Last_Name;
			$this->IsActive = $IsActive;
			$this->EProfile = $EProfile;

            $this->Address_Street = $Address_Street;
            $this->Address_Neigborhood = $Address_Neigborhood;
            $this->Address_City = $Address_City;
            $this->Address_Zipcode = $Address_Zipcode;
            $this->Address_State = $Address_State;
            $this->Phone_Cell = $Phone_Cell;
		endif;
	}


}
