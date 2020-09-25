<?php

use AE\Entities\CredentialsEntity;

/* Esta classe realiza automaticamente tarefas de autenticação de usuário no sistema. */
class AuthBKP{

	/**
	 * Diretório que irá armazenar as fotos de clientes enviadas pelas contas.
	 */
	public $account_directory = NULL;

	/**
	 * Recupera e guarda para uso posterior todas as informações do núcleo do CodeIgniter
	 * @properties object $CI
	 */
	private $CI;

	public $user_data = NULL;
	public $flash_data_message = NULL;
	public $account = NULL;

	/**
	 * Classe construtora que efetua todas as verificações de autenticação do usuário.
	 * @method void __construct()
	 * @return void
	 * @access public
	 */
	function __construct() {
		$this->CI = &get_instance();
		$this->CI->load->helper('url', 'cookie');
		$this->CI->load->database();
		$this->CI->load->library(['session', 'form_validation']);
		$this->CI->load->model('crud');

		self::get_logged_account();
	}

	/**
	 * Recupera os dados da conta logada no sistema
	 * @method void get_logged_account()
	 *
	 */
	public function get_logged_account(){

		# 0. Verifica se o usuário está dentro da área restrita do sistema.
		if ($this->CI->uri->segment(1) == 'app'):
			# 1. Verifica se há dados enviados via POST ou guardados em SESSION
			self::check_data_from_POST();
			self::check_data_from_SESSION();

			if (!self::check_data_session()): // Não há dados em sessão. Expulsa usuário.
				self::write_log("Erro ao verificar os dados do usuário em POST ou SESSION. Usuário expulso.");
				redirect(base_url());
			else:
				$sql = <<<SQL
SELECT
  		p.Id
	,	CONCAT(p.First_Name, ' ', p.Last_Name) as FullName
	,	c.Email
FROM `credentials` c
LEFT JOIN person p ON p.Id = c.PersonId

WHERE
		c.Email = "{$this->credentials->Email}"
	AND c.Password = "{$this->credentials->Password}"
	AND c.IsActive = 'YES'

LIMIT 1
SQL;

				$result = $this->CI->db->query($sql);
				$this->user_data = $result->row();

				if( !is_null($this->flash_data_message) ) $this->CI->session->set_flashdata('notif', $this->flash_data_message);

				// verifica se a consulta foi bem sucedida
				if($this->CI->db->affected_rows() <= 0):
					$this->flash_data_message = array(
						'message' => 'Verifique suas credencias e tente novamente.',
						'type' => 'danger'
					);
					$this->CI->session->set_flashdata('notif', $this->flash_data_message);
					redirect(base_url());
				endif;
			endif;
		endif;
	}

	/**
	 * Determina se os logs do sistema estão ativos.
	 * @property boolean $writeLogActive
	 * @access private
	 */
	private $writeLogActive = TRUE;

	/**
	 * Escreve nos logs do sistema.
	 * @method void write_log()
	 * @param string $message
	 * @param string $level
	 * @access public
	 */
	public function write_log($message = 'Nenhuma mensagem', $level = 'error'){
		if($this->writeLogActive == TRUE):
			log_message($level, $message);
		endif;
	}

	/* ---------------------------- A PARTIR DAQUI EFETUA AÇÕES RELACIONADAS À PROPRIEDADE "$data_session" ---------------------------- */

	/**
	 * Retorna o dado expecífico do usuário solicitado.
	 * @method string get_user_data()
	 * @param string $data <informa qual dado se deseja que seja retornado>
	 * @return string
	 * @access public
	 */
	public function get_user_data($data) {
		return $this->user_data->$data;
	}

	/**
	 * Armazena na memória os dados usados pelo cliente para realizar o login.
	 * @properties Array $data_session
	 */
	private $dataToAutentication = array(
		'Email' => NULL,
		'Password' => NULL // senha já criptografada
	);

	private CredentialsEntity $credentials;

	/**
	 * Guarda na propriedade "$data_session" os dados usados pelo cliente para fazer login
	 * @method void set_data_session()
	 * @return void
	 * @param string $user_email
	 * @param string $user_email
	 * @param bool $encrypt_password
	 * @access private
	 */
	private function set_data_session() {
		// Armazena dados em sessão para uso posterior
		$this->CI->session->set_userdata('email', $this->credentials->Email);
		$this->CI->session->set_userdata('password', $this->credentials->Password);
	}

	/**
	 * Verifica os dados de sessão. Se estiverem TRUE, ou FALSE.
	 * @method mixed check_data_session()
	 * @return mixed
	 */
	private function check_data_session(){
		return ($this->credentials->Email == NULL or $this->credentials->Password == NULL) ? FALSE : TRUE;
	}

	/**
	 * Limpa os dados armazenados em memória pela variável "$data_session" e também os dados armazenados em sessão.
	 * @method void clear_data_session()
	 */
	public function clear_data_session(){
		unset($this->dataToAutentication);
		$this->CI->session->sess_destroy(); // removo qualquer vestígio de dados em SESSION
	}


	/* ---------------------------- A PARTIR DAQUI VERIFICA SE HÁ DADOS ENVIADOS VIA "POST" OU "SESSION" ---------------------------- */

	/**
	 * Verifica se há dados armazenados em sessão
	 * @method boolean check_data_from_SESSION()
	 * @return boolean
	 */
	private function check_data_from_SESSION() {
		// recupera informações
		$sess['email'] = $this->CI->session->userdata('email');
		$sess['password'] = $this->CI->session->userdata('password');

		/* valida */
		if ($sess['email'] == NULL or $sess['password'] == NULL):
			self::write_log("--- Não há dados em sessão. ---");
			return FALSE;
		else:
			$this->set_data_session($sess['email'], $sess['password']);
			self::write_log("--- Dados em sessão encontrados. ---", 'info');
			return TRUE;
		endif;
	}

	/**
	 * Verifica se há dados armazenados em sessão
	 * @method boolean check_data_from_POST()
	 * @return boolean
	 */
	private function check_data_from_POST() {
		// recupera informações
		$sess['email'] = $this->CI->input->post('txt_auth_email', TRUE);
		$sess['password'] = $this->CI->input->post('txt_auth_password', TRUE);

		$this->credentials = new CredentialsEntity(0, 0, $sess['email'] , $sess['password'], $sess['password'], 1);

		/* valida */
		if ($this->credentials->Email == NULL or $this->credentials->Password == NULL):
			return FALSE;
		else:
			$this->set_data_session();
			return TRUE;
		endif;
	}

	public function get_account_data($data){
		if( $this->account == NULL ):
			return NULL;
		else:
			return $this->account->$data;
		endif;
	}
};
