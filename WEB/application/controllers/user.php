<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        if () {
            
        }
        $this->template->write('title', 'VUMA - ');
        
        $this->template->write_view('center_content', 'dash_board', $data);
        $this->template->render();
    }

    public function viewUser() {
        
    }

    public function delUser() {
        
    }

    public function changeUserData() {
        
    }

    public function makeAdmins() {
        
    }

    public function sendMail() {
        
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
