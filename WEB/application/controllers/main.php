<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct()
       {
            parent::__construct();
       }
    public function index() {
        $this->template->add_css('css/style.css');
        $this->template->add_css('css/bootstrap.css');
        $this->template->add_css('css/bootstrap-responsive.css');
        
        $this->template->write('title', 'VUMA - prisijungimas');
    
        $this->template->write_view('center_content', 'login');
        $this->template->render();
    }
    public function login() {
         $this->template->add_css('css/style.css');
        $this->template->add_css('css/bootstrap.css');
        $this->template->add_css('css/bootstrap-responsive.css');
        
        $this->template->write('title', 'VUMA - prisijungimas');
    
        $this->template->write_view('center_content', 'logged');
        $this->template->render();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */