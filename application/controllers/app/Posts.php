<?php defined('BASEPATH') or exit('No direct script access allowed');

use DotFw\Infra\CrossCutting\Validation\Validator;
use \DotFw\Infra\CrossCutting\Validation\StringValidator;
use \DotFw\Infra\CrossCutting\Helpers\Notification;


class Posts extends AE_Controller{

	public function view(){
		$dataview['postMainId'] = $this->input->get('postMainId');
		$dataview['post'] = $this->postsmodel->getOne($dataview['postMainId']);
		$dataview['lastPosts'] = $this->postsmodel->lastPosts($dataview['postMainId']);
		$this->load->view('app/posts/view', $dataview);
	}

	public function save(){
		$message = $this->input->post('Message');
		$personId = $this->auth->get_user_data('Id');
		$postMainId = $this->input->post('PostMainId');

		StringValidator::IsNullOrEmpty($message, "Message", "The message is empty.");
		StringValidator::HasMinLen($message, 20, "Message", "The message must be at least 20 characters long.");
		StringValidator::HasMaxLen($message, 500, "Message", "The message must be a maximum of 500 characters.");

		$result = false;
		if(Validator::IsValid()):
			$result = $this->postsmodel->save($personId, $message, $postMainId);
		endif;
		
		if($result):
			$this->rest->Code(200)->Result($result)->Message("Post inserido com sucesso.")->Run();
		else:
			$this->rest->Code(500)->Result(Notification::GetNotifications())->Message("Houve um erro ao inserir o post.")->Run();
		endif;
	}

	/* Exibe um formulário para cadastro de novos posts */
	public function form(){
		$this->dataview['postMainId'] = $this->input->get('postMainId');

		$this->load->view('app/posts/form', $this->dataview);
	}

	/* Alista os últimos posts conforme requisitado pelo usuário. */
	public function index(){
		$dataview['lastPosts'] = $this->postsmodel->lastPosts();

		$this->load->view('app/posts/list', $dataview);
	}

	function __construct(){
		parent ::__construct();

		$this->load->model('Posts_model', 'postsmodel');

	}

}