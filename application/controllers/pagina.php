<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$dados['titulo']='Aces English';
		$this->load->view('index', $dados);
	}

	public function quem_somos(){
		$dados['titulo']=' Quem Somos - Aces English';
		$this->load->view('quem_somos', $dados);
	}

	public function mapa(){
		$dados['titulo']='Mapa do site - Aces English';
		$this->load->view('mapa', $dados);
	}

	public function servicos(){
		$dados['titulo']='Aces English';
		$this->load->view('servicos', $dados);
	}
}
