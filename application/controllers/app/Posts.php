<?php defined('BASEPATH') or exit('No direct script access allowed');

use DotFw\Infra\CrossCutting\Helpers\Notification;
use DotFw\Infra\CrossCutting\Validation\StringValidator;
use DotFw\Infra\CrossCutting\Validation\Validator;


class Posts extends AE_Controller
{

    public $input;

    public function view()
    {
        $this->dataView[ 'postMainId' ] = $this -> input -> get('postMainId');
        $this->dataView[ 'post' ] = $this -> postsmodel -> getOne($this->dataView[ 'postMainId' ]);
        $this->dataView[ 'lastPosts' ] = $this -> postsmodel -> lastPosts($this->dataView[ 'postMainId' ]);
        $this -> load -> view('app/posts/view', $this->dataView);
    }


    public function save()
    {
        $message = $this -> input -> post('Message');
        $personId = $this -> auth -> GetUserData('UserId');
        $postMainId = $this -> input -> post('PostMainId');

        Validator ::IsNullOrEmpty($message, "Message", "The message is empty.");
        StringValidator ::HasMinLen($message, 20, "Message", "The message must be at least 20 characters long.");
        StringValidator ::HasMaxLen($message, 500, "Message", "The message must be a maximum of 500 characters.");

        $result = false;
        if ( Validator ::IsValid() ):
            $result = $this -> postsmodel -> save($personId, $message, $postMainId);
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
		$this->dataView['lastPosts'] = $this->postsmodel->lastPosts();

		$this->load->view('app/posts/list', $this->dataView);
	}

	function __construct(){
		parent ::__construct();

		$this->load->model('Posts_model', 'postsmodel');

	}

}
