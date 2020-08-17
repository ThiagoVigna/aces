<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagina extends CI_Controller
{

	function __construct()
	{
		parent ::__construct();
		$this -> load -> helper('url');
	}

	public function index()
	{
		$dados[ 'titulo' ] = 'Aces English';
		$this -> load -> view('index', $dados);
	}

	public function quem_somos()
	{
		$dados[ 'titulo' ] = ' Quem Somos - Aces English';
		$this -> load -> view('quem_somos', $dados);
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
