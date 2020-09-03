<?php defined('BASEPATH') or exit('No direct script access allowed');

class Site extends AE_Controller{

	public $load;
	public $form_validation;
	public $email;
	public $input;

	function __construct(){
		parent ::__construct();
		$this -> load -> helper('url');
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
	}

	public function index(){
		$dados[ 'titulo' ] = 'Aces English';
		$this -> load -> view('site/form-login', $dados);
	}

	public function quem_somos()
	{
		$this->dataView['titulo'] = ' Quem Somos';

		$this -> load -> view('site/interface', $this->dataView);
	}

	public function mapa()
	{
		$dados[ 'titulo' ] = 'Mapa do site - Aces English';
		$this -> load -> view('mapa', $dados);
	}

	public function servicos()
	{
		$dados[ 'titulo' ] = 'Aces English';
		$this -> load -> view('servicos', $dados);
	}

	public function contato()
	{
		$this -> load -> helper('form');
		$this -> load -> library(array('form_validation', 'email'));
		$this -> form_validation -> set_rules('nome', 'Nome', 'trim|required');
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|valid_email');

		if ( $this -> form_validation -> run() == FALSE ):
			$dados [ 'formerror' ] = validation_errors();
		else:
			$dados_form = $this -> input -> post();
			$this -> email -> from($dados_form[ 'email' ], $dados_form[ 'nome' ]);
			$this -> email -> to('Thiagovigna@hotmail.com');
			$this -> email -> subject($dados_form[ 'assunto' ]);
			$this -> email -> message($dados_form[ 'mensagem' ]);
			if ( $this -> email -> send() ):
				$dados[ 'formerror' ] = 'Email enviado com sucesso!';
			else:
				$dados[ 'formerror' ] = 'Erro ao enviar o email, tente novamente em alguns minutos.';
			endif;
			$dados [ 'formerror' ] = 'A validação funcionou corretamente';
		endif;

		$dados[ 'titulo' ] = 'Aces English';
		$this -> load -> view('contato', $dados);
	}
}
