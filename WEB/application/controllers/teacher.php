<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher extends CI_Controller {
	public function index()
	{
		$this->load->view('main_view');
	}
        public function changePassword() {
            
        }
        public function sendMessage() {
            $this->template->add_css('css/style.css');
            $this->template->add_css('css/bootstrap.css');
            $this->template->add_css('css/bootstrap-responsive.css');
        
            $this->template->write('title', 'VUMA - pranešimų siuntimas studentams');
            $data['msg'] = "";
            $this->template->write_view('center_content', 'sendMessage', $data);
            $this->template->render();
        }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
