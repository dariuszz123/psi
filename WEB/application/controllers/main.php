<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {
    public function __construct()
       {
            parent::__construct();
       }
    public function index() {        
        $this->template->write('title', 'VUMA - prisijungimas');
    
        $this->template->write_view('center_content', 'login');
        $this->template->render();
    }
    public function login() {
        
        $this->template->write('title', 'VUMA - prisijungimas');
        $msg = NULL;
	$session_id = $this->session->userdata('logged_in');
        if ($session_id == true) 
            $msg = "Jus jau prisijunges";
        else 
        {

            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));
                if (empty($email) || empty($password) || !isset($_POST['submit']))
                        $msg = "Tušti laukeliai";
                else 
                {
                        $validate = $this->login_model->validateLogin($email, $password);
                        if ($validate >=1)
                        {
                            $username = $this->login_model->getUserData($validate, 'nario_vardas, nario_levelis');
                            $newdata = array(
                                        'id' => $validate,
                        'username'  => $username['nario_vardas'],
                                        'level'  => $username['nario_levelis'],
                        'logged_in' => TRUE
                                );
                                $this->session->set_userdata($newdata);
                                $msg = "Sveikiname sėkmingai prisijungus!";
                        }
                        else 
                                $msg = "Klaida. Toks vartotojas neegzistuoja arba nėra aktyvuotas.";
                }
        }
        $data['msg'] = $msg;
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */