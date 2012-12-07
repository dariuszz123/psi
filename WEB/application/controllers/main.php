<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {
    public function __construct()
       {
            parent::__construct();
       }
    public function index() {        
        $this->template->write('title', 'VUMA - prisijungimas');
        $data['msg'] = null;
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }
    public function login() {
        $this->template->write('title', 'VUMA - prisijungimas');
        $msg = NULL;
	$session_id = $this->session->userdata('logged_in');
 
        $data['msg'] = $msg;
        $this->template->write_view('center_content', 'login', $data);
        $this->template->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */