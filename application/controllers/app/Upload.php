<?php defined('BASEPATH') or exit('No direct script access allowed');

use \DotFw\Infra\CrossCutting\Helpers\Notification;

class Upload extends AE_Controller{


    public function __construct()
    {
        parent ::__construct();
        $this->load->model('Person_model', 'personmodel');
    }

    public function index()
    {
        $this->dataView['titulo'] = 'ACES English - User profile';
        $this->dataView['subview'] = 'app/profile/form';
        $this->load->view('app/interface/interface', $this->dataView);
    }

        public function profile(){
            /**
             * As pastas devem estar com permissões 775 e com as seguintes configurações
             * chown -R www-data:www-data /var/www/html/uploads/
             * @see https://stackoverflow.com/questions/19433382/codeigniter-the-upload-destination-folder-does-not-appear-to-be-writable
             **/

            $this->load->helper(array('form', 'url'));

            $config['upload_path']          = DIR_USERS. "/". $this->auth->GetUserData('UserId');
            $config['allowed_types']        = '*';
            $config['max_size']             = '3000';
            $config['file_name']            = "perfil";

            $this->load->library('upload', $config);

            // List of name of files inside
            // specified folder
            $files = glob($config['upload_path'].'/perfil.*');

            // Deleting all the files in the list
            foreach($files as $file) {
                if(is_file($file))
                    // Delete the given file
                    unlink($file);
            }

            $path_parts = pathinfo($_FILES["photo"]["name"]);
            $extension = $path_parts['extension'];
            $fullAddress = 'perfil.'.$extension;


            $this->load->model("person_model");
            $this->person_model->saveModelPerfil($this->auth->GetUserData('UserId'), $fullAddress);
            if ( ! $this->upload->do_upload('photo')):
                $error = $this->upload->display_errors();
                Notification::SetNotification("Foto de perfil", "O envio da foto de perfil apresentou erros");
                Notification::SetNotification("Foto de perfil", "Erro apresentado: $error");
            else:
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name = $upload_data['file_name'];
                $data = array('upload_data' => $this->upload->data());
            endif;

            redirect(base_url('app/profile'));
    }

        public function main(){
        /**
         * As pastas devem estar com permissões 775 e com as seguintes configurações
         * chown -R www-data:www-data /var/www/html/uploads/
         * @see https://stackoverflow.com/questions/19433382/codeigniter-the-upload-destination-folder-does-not-appear-to-be-writable
         **/

        $this->load->helper(array('form', 'url'));

        $config['upload_path']          = DIR_USERS. "/". $this->auth->GetUserData('UserId');
        $config['allowed_types']        = '*';
        $config['max_size']             = '3000';
        $config['file_name']            = "main";

        $this->load->library('upload', $config);

        // List of name of files inside
        // specified folder
        $files = glob($config['upload_path'].'/main.*');

        // Deleting all the files in the list
        foreach($files as $file) {
            if(is_file($file))
                // Delete the given file
                unlink($file);
        }

        $path_parts = pathinfo($_FILES["main"]["name"]);
        $extension = $path_parts['extension'];
        $fullAddress = 'main.'.$extension;


        $this->load->model("person_model");
        $this->person_model->saveModelMain($this->auth->GetUserData('UserId'), $fullAddress);
        if ( ! $this->upload->do_upload('main')):
            $error = $this->upload->display_errors();
            Notification::SetNotification("Foto de capa", "O envio da foto de perfil apresentou erros");
            Notification::SetNotification("Foto de capa", "Erro apresentado: $error");
        else:
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            $data = array('upload_data' => $this->upload->data());
        endif;

        redirect(base_url('app/profile'));
    }
}
