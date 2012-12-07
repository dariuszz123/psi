<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reg
 *
 * @author KD
 */
class Reg  extends CI_Controller {
	public function index()
	{
            $this->template->add_css('css/style.css');
            $this->template->add_css('css/bootstrap.css');
            $this->template->add_css('css/bootstrap-responsive.css');
            $this->template->write('title', 'VUMA - registracija');
            $this->template->write_view('center_content', 'reg');
            $this->template->render();
	}
        public function registration() {
            
        }
}

?>
