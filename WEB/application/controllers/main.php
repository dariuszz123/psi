<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->write('title', 'VUMA - prisijungimas');
        
        if($_POST) {
            $success = $this->user_model->login($this->input->post('email'), $this->input->post('password'));
            if($success === true) {
                //redirect();
            }else{
                $this->session->set_flashdata('message_error', "Klaidingi prisijungimo duomenys");
                redirect(current_url());
            }
        }
        
        $data = array();
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }

    public function login() {
        $this->template->write('title', 'VUMA - prisijungimas');
        $data = array();
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */