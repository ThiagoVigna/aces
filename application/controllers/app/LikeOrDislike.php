<?php

class LikeOrDislike extends AE_Controller {

    public $input;
    public $ldmodel;
    public $rest;

    public function index(){}

    public function save() {
        $PostId = $this->input->get('postId');
        $PersonId = $this->auth->GetUserData('UserId');

		// Verifica se já existe um registro para esse usuário e post
		$existing_ld = $this->ldmodel->get_by_person_post($PersonId, $PostId);
    
		if($existing_ld && $existing_ld->LikeOrDislike == 1) {
			$type = 0;
		} else {
			$type = 1;
		}
        $result = $this->ldmodel->save($PersonId, $type, $PostId);

        if (isset($result->TotalLikes) && $result->TotalLikes > 0) {
            $this->rest->Code(200)->Result($result)->Message("Like registrado com sucesso.")->Run();
        } else {
            $this->rest->Code(500)->Result($result)->Message("Houve um erro ao cadastrar o like.")->Run();
        }
    }

    public function __construct() {
        parent ::__construct();
        $this->load->model('Likeordislike_model', 'ldmodel');
    }
}
