<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->write('title', 'VUMA - prisijungimas');

        if($this->user_model->is_loggedin()) {
            redirect('user');
        }
        
        if($_POST) {
            $success = $this->user_model->login($this->input->post('email'), $this->input->post('password'));
            if($success === true) {
                if($this->user_model->user_have_type(USER_ADMIN) === false && $this->user_model->user_have_type(USER_TEACHER)) {
                    $this->user_model->logout();
                    $this->session->set_flashdata('message_error', "Prisijungti gali tik dėstytojai ir administratoriai!");
                    redirect(current_url());
                }
                redirect('user');
            }else{
                $this->session->set_flashdata('message_error', "Klaidingi prisijungimo duomenys");
                redirect(current_url());
            }
        }
        
        $data = array();
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }

    public function register() {
        $this->template->write('title', 'VUMA - registracija');
        
        if($_POST) {
            
            if($this->input->post('password') == $this->input->post('password_repeat')) {
                $success = $this->user_model->register_user($this->input->post('email'), $this->input->post('password'));
                if($success) {
                    redirect('main/register_success');
                }
                redirect('main/register');
            } else {
                $this->session->set_flashdata('message_error', "Slaptažodžiai nesutampa");
                redirect('main/register');
            }
            
        }
        
        $this->template->write_view('center_content', 'register');
        $this->template->render();
    }

    public function register_success() {
        $this->template->write('title', 'VUMA - registracija');
        $this->template->write_view('center_content', 'register_success');
        $this->template->render();
    }
    
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */