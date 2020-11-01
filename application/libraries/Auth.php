<?php

use DotFw\Infra\CrossCutting\Helpers\Notification;
use AE\Entities\CredentialsEntity;
use DotFw\Service\Token;


class Auth{
	private $CI;

	private string $tokenName = "AEAUTH";

	private CredentialsEntity $credentials;

	private Token $token;

	public function index(){
	    
    }

	public function Authenticate(){
		if( self::getPost() ):
			$loginData = $this->CI->credentialsModel->login($this->credentials);

			if(count($loginData) == 0):
				Notification::SetNotification("Login", "Dados não encontrados no banco.");
				self::kickOut();
			endif;

			$this->token->NewToken($loginData, null);
		else:
			self::kickOut();
		endif;
	}

	private function kickOut(){ redirect(base_url()); }

	public function Authorize(){
		$token = $this->token->GetToken();

		if(!$this->token->TokenIsValid($token)):
			self::kickOut();
		endif;
	}

	/**
	 * @param null $keyWord
	 * @return array|mixed
	 */
	public function GetUserData( $keyWord = null){
		$userdata = (array) $this->token->GetData();
		$userdata = (array) $userdata[0];

		if(!empty($keyWord)):
			return $userdata[$keyWord];
		else:
			return $userdata;
		endif;
	}

	/** Gera um identificador único para este usuário e grava-o em cookie */
	private function setUniqueId($dueDate){

		if(is_null(self::getUniqueId())):
			$uniquid = uniqid($dueDate);
			$uniquid = md5($uniquid);
			$this->uniquid = $uniquid;

			setcookie($this->tokenName.'UID', $this->uniquid, $dueDate, '/');
		else:
			$this->uniquid = $_COOKIE[$this->tokenName.'UID'];
		endif;
	}

	/**
	 * Recupera o ID único desse usuário
	 * @method string|null getUniqueId()
	 */
	private function getUniqueId(){
		if(isset($_COOKIE[$this->tokenName.'UID'])):
			return $_COOKIE[$this->tokenName.'UID'];
		elseif( !empty($this->uniquid) ):
			return $this->uniquid;
		else:
			return null;
		endif;
	}

	private function getPost(){
		if( isset($_REQUEST['txt_auth_email']) && isset($_REQUEST['txt_auth_password']) ):
			$email = $this->CI->input->post('txt_auth_email');
			$password = $this->CI->input->post('txt_auth_password');

			$this->credentials = new CredentialsEntity(0, 0, $email, $password, $password, 1);

			return true;
		else:
			Notification::SetNotification("Login", "Não foi recebido nada do formulário");
			return false;
		endif;
	}

	function __construct() {
		$this->CI = &get_instance();
		$this->CI->load->helper('url', 'cookie');
		$this->CI->load->database();
		$this->CI->load->library(['session', 'form_validation']);

		$this->CI->load->model('crud');
		$this->CI->load->model('auth_model');
		$this->CI->load->model('credentials_model', 'credentialsModel');

		$timestamp = time()+60*60*8*1;

		$this->setUniqueId($timestamp);
		$jti = $this->getUniqueId();

		$this->token = new Token($jti, $timestamp, base_url());

	}

}
