<?php

/* Esta classe realiza automaticamente tarefas de autenticação de usuário no sistema. */
class Auth{

	/**
	 * Diretório que irá armazenar as fotos de clientes enviadas pelas contas.
	 */
	public $account_directory = NULL;

	/**
	 * Recupera e guarda para uso posterior todas as informações do núcleo do CodeIgniter
	 * @properties object $CI
	 */
	private $CI;

	/**
	 * Armazena os dados do usuário coletados no banco de dados
	 * @properties object $user_data
	 */
	public $user_data = NULL;

	public $flash_data_message = NULL;

	public $last_payment = NULL;

	public $account = NULL;

	public $plan = NULL;

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
		CONCAT(p.First_Name, ' ', p.Last_Name) as FullName
	
	,	c.Email
	,	c.`Password`
FROM `credentials` c
LEFT JOIN person p ON p.Id = c.PersonId

WHERE
		c.Email = ?
	AND c.`Password` = ?
	AND c.IsActive = 'YES'

LIMIT 1
SQL;

				//$this->CI->db->query($sql, $this->dataToAutentication);
				$this->CI->db->where($this->dataToAutentication);
				$this->CI->db->from('credentials');
				$query = $this->CI->db->get();
				$this->user_data = $query->row();

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

//				self::get_account();
//				self::get_last_payment();

				// valida pagamento em aberto.

				/*
				// Registra acesso do usuário
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				$access = array(
					'user_id'       => $this->user_data->user_id,
					'date'          => date('Y-m-d'),
					'hour'          => date('h:i:s'),
					'activity'      => $actual_link,
					'address_ip'    => $_SERVER['REMOTE_ADDR'],
				);
				$this->CI->crud->save('users_access', $access);

				setcookie("user_logged",TRUE,time()+1000);
				*/
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
		'email' => NULL,
		'password' => NULL // senha já criptografada
	);

	/**
	 * Guarda na propriedade "$data_session" os dados usados pelo cliente para fazer login
	 * @method void set_data_session()
	 * @return void
	 * @param string $user_email
	 * @param string $user_email
	 * @param bool $encrypt_password
	 * @access private
	 */
	private function set_data_session($user_email, $user_password, $encrypt_password = FALSE) {
		// Seta dados em variavel para uso ainda nesta sessão
		$this->dataToAutentication['email'] = $user_email;
		$this->dataToAutentication['password'] = (!$encrypt_password) ? $user_password : md5($user_password);

		// Armazena dados em sessão para uso posterior
		$this->CI->session->set_userdata('email', $this->dataToAutentication['email']);
		$this->CI->session->set_userdata('password', (!$encrypt_password) ? $user_password : md5($user_password));
	}

	/**
	 * Verifica os dados de sessão. Se estiverem TRUE, ou FALSE.
	 * @method mixed check_data_session()
	 * @return mixed
	 */
	private function check_data_session(){
		return ($this->dataToAutentication['email'] == NULL or $this->dataToAutentication['password'] == NULL) ? FALSE : TRUE;
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

		/* valida */
		if ($sess['email'] == NULL or $sess['password'] == NULL):
			return FALSE;
		else:
			$this->set_data_session($sess['email'], $sess['password'], TRUE);

			return TRUE;
		endif;
	}

	private function get_last_payment(){
		$where['account_id'] = $this->user_data->account_id;
		$where['status'] = 'wait payment';

		$this->last_payment = $this->CI->crud->consult('account_payments', $where, TRUE, 'p', FALSE, '1');

		// Redireciona usuário para página de pagamento caso a fatura já tenha ultrapassado a data do vencimento.
		if( $this->last_payment != FALSE and $this->last_payment->date_due < date('Y-m-d') and $this->CI->uri->segment(3) != 'signature' and $this->user_data->ecology_staff == 'no' ):
			redirect(base_url('app/system_config/signature'));
		endif;
	}

	public function get_payment_data($data){
		if( $this->last_payment == NULL ):
			return NULL;
		else:
			return $this->last_payment->$data;
		endif;
	}

	private function get_account(){
		$this->account = $this->CI->crud->consult('account', ['account_id'=>$this->user_data->account_id], TRUE);

		if($this->account != FALSE):
			$this->account_directory = "public/account_".$this->user_data->account_id;;
			if( !file_exists($this->account_directory) ):
				mkdir($this->account_directory, 0755, TRUE);
			endif;
		endif;
	}

	public function get_account_data($data){
		if( $this->account == NULL ):
			return NULL;
		else:
			return $this->account->$data;
		endif;
	}

	public function get_plan(){
		$this->plan = $this->CI->crud->consult('plans', ['plan_id'=>$this->account->plan_id], TRUE);
	}
};
