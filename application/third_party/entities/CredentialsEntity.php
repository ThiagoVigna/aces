<?php namespace AE\Entities;

use DotFw\Infra\CrossCutting\Validation\StringValidator;
use DotFw\Infra\CrossCutting\Validation\Validator;
use DotFw\Service\Cipher;


class CredentialsEntity{

	#region PROPRIEDADES PÚBLICAS - Iníciam-se com a letra maiúscula.
	public int $Id;
	public int $PersonId;
	public string $Email;
	public string $Password;
	public string  $Date_Create;
	public ?string $Date_Update = NULL;
	public string $Date_Expire;
	public int $IsActive = 1;
	#endregion

	#region Métodos públicos
	public function __construct(
		int $id,
		int $personId,
		string $email,
		string $password,
		string $passwordVerify,
		int $isActive
	){
		$cipher = new Cipher(KEY);

		StringValidator::IsNotEmailOrEmpty($email, 'Email', 'Você deve inserir um email válido Ex: EMAIL@EMAIL.com !');
		Validator::AreNotEquals($password, $passwordVerify, "Senha", "A verificação de senha são diferentes.");

		if( Validator::IsValid() ):
			if ( $id == 0) : // não existe
				$this->Date_Create = date('Y-m-d H:i:s');
			else: // existe
				$this->Date_Update = date('Y-m-d H:i:s');
				self::SetPersonId($id);
			endif;

			$this -> PersonId = $personId;
			$this -> Email = $email;
			$this -> Password = $cipher->GetHash($password);
			$this -> Date_Expire = date('Y-m-d H:i:s', strtotime('+2 months'));
			$this -> IsActive = $isActive;
		endif;
	}

	public function SetPersonId( int $id){
		$this->PersonId = $id;
	}
	#endregion
}
