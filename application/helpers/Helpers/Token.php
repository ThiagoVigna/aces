<?php namespace DotFw\Service;

use DotFw\Infra\CrossCutting\Helpers\Notification;

class Token {

	private $tokenName = 'AUTH-TOKEN';

	/** Verifica se existe um token de autenticação */
	public function GetToken(){
		if(isset($_COOKIE[$this->tokenName])) :
			$this->tokenData = $_COOKIE[$this->tokenName];
			return $this->tokenData;
		else:
			return null;
		endif;
	}

	public function GetClaims(){
		return $this->payload->claims;
	}

	public function GetData(){
		return $this->payload->data;
	}

	public function NewToken($data = null, array $claims = null) : string{

		$this->cipher = new Cipher(KEY);

		$this->Header = array(
			'typ' => 'JWT',
			'alg' => 'HS256'
		);

		$this->payload = array(
			'iss' => str_replace(['http', ':', '/'], '', $this->domain), // emissor do token
			'aud' => str_replace(['http', ':', '/'], '', $this->domain), // audiencia do token

			'exp' => $this->ExpireToken,    // o token é válido até (timestamp)
			'nbf' => (time() - 1),          // o token não é válido antes de (timestamp)
			'iat' => time(),                // criação do token (data timestamp)

			'jti' => $this->jti, // identificador único desse token

			'data' => $data,                  // dados de identificação do usuário
			'claims' => $claims,               // permissões de acesso
			'roles' => null
		);

		$header = json_encode($this->Header);
		$header = base64_encode($header);

		$payload = json_encode($this->payload);
		$payload = base64_encode($payload);

		$token = "{$header}.{$payload}";

		$this->signature = $this->cipher->GetHash($token);
		$signature = $this->signature;

		$token = "{$header}.{$payload}.{$signature}";

		setcookie($this->tokenName, $token, $this->ExpireToken, '/');

		return $token;
	}

	public function TokenIsValid( string $token = null) : bool{
		$newSignature = null;
		$tokenSplit = null;

		if($token != '' or !is_null($token)):
			$tokenSplit = explode('.', $token);

			$token = "{$tokenSplit[0]}.{$tokenSplit[1]}";

			$newSignature = $this->signature = $this->cipher->GetHash($token);
		else:
			return false;
		endif;

		if( $newSignature ==  $tokenSplit[2]): // assinatura válida
			self::DecodeToken($token);

			if($this->payload->aud != str_replace(['http', ':', '/'], '', $this->domain)):
				Notification::SetNotification('Permissões', 'Usuário não tem permissão para acessar este domínio.');
				return false;

			elseif($this->payload->exp != ($this->payload->iat+60*60*8*1)):
				Notification::SetNotification('Tempo de acesso esgotado', 'Ultrapassado o tempo limite de acesso.');
				return false;
			else:
				return true;
			endif;
		else:
			$this->Errors = 'Assinatura do token inválida.';

			return false; // assinatura inválida
		endif;
	}

	public function DecodeToken(string $token) {
		$tokenSplit = explode('.', $token);

		$this->Header = base64_decode($tokenSplit[0]);
		$this->payload = base64_decode($tokenSplit[1]);

		$this->Header = json_decode($this->Header);
		$this->payload = json_decode($this->payload);
	}

	function __construct(string $jti, int $expireToken, string $domain, bool $secure = true){

		$this->jti = $jti;
		$this->ExpireToken = $expireToken;
		$this->cipher = new Cipher(KEY);
		$this->domain = $domain;
		$this->secure = $secure;
	}

	public $Header;
	private $payload;
	private string $signature;
	private Cipher $cipher;

	/** @property string $jti Identificador único */
	private $jti;

	public int $ExpireToken;
	public ?string $Errors = null;

	private string $domain;
	private bool $secure;
}
