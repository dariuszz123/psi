<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {
    
   private $meniu = array();
    
    public function __construct() {
        parent::__construct();
        if ($this->user_model->is_loggedin()) {
            if ($this->user_model->user_have_role(USER_TEACHER)) {
                $title = "Dėstytojams";
                $this->meniu = array_merge($this->meniu, array (
                    'name' => 'Vartotojo duomenys',
                    'url' => '',
                    'is_active' => true
                ));
                $this->meniu = array_merge($this->meniu, array (
                    'name' => 'Pakeisti slaptažodį',
                    'url' => '',
                    'is_active' => ''
                ));
                $this->meniu = array_merge($this->meniu, array (
                    'name' => 'Siųsti pranešimus',
                    'url' => '',
                    'is_active' => ''
                ));
                
            }
            else if ($this->user_model->user_have_role(USER_ADMIN)){
                $title = "Administratoriams";
            }
            else {
                redirect(base_url());
            }
        }
    }

    public function index() {
        $data = array();
        $data['nav'] = $this->meniu;
        $this->template->write_view('center_content', 'dash_board', $data);
        $this->template->render();
    }

    public function view_user() {
        
    }

    public function del_user() {
        
    }

    public function change_user_data() {
        
    }

    public function make_admins() {
        
    }

    public function send_message() {
        
    }
    
    public function all_users() {
        
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
