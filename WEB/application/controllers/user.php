<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    private $meniu = array();

    public function __construct() {
        parent::__construct();
        if ($this->user_model->is_loggedin()) {
            array_push($this->meniu, array(
                'slug' => 'index',
                'name' => 'Vartotojo duomenys',
                'url' => '' . base_url() . 'user/index',
                'is_active' => false
            ));
            array_push($this->meniu, array(
                'slug' => 'change_password',
                'name' => 'Pakeisti slaptažodį',
                'url' => '' . base_url() . 'user/change_password',
                'is_active' => false
            ));
            array_push($this->meniu, array(
                'slug' => 'send_message',
                'name' => 'Siųsti pranešimus',
                'url' => '' . base_url() . 'user/send_message',
                'is_active' => false
            ));
            if ($this->user_model->user_have_type(USER_TEACHER)) {
                $title = "Dėstytojams";
            } else if ($this->user_model->user_have_type(USER_ADMIN)) {
                $title = "Administratoriams";
                array_push($this->meniu, array(
                    'slug' => 'users_list',
                    'name' => 'Vartotojų sąrašas',
                    'url' => '' . base_url() . 'user/users_list',
                    'is_active' => false
                ));
            } else {
                redirect(base_url());
            }
        }
    }

    private function set_active_meniu($slug) {
        $i = 0;
        foreach ($this->meniu as $value) {
            if ($value['slug'] == $slug) {
                $this->meniu[$i]['is_active'] = true;
                break;
            }
            $i++;
        }
    }

    public function index() {
        if ($this->user_model->is_loggedin()) {
            $data = array();
            $this->set_active_meniu('index');
            $data['nav'] = $this->meniu;
            $users['user'] = $this->user_model->get_user();
            $data['content'] = $this->load->view('user_data', $users, true);
            $this->template->write_view('center_content', 'dash_board', $data);
            $this->template->render();
        } else {
            redirect(base_url());
        }
    }

    public function users_list($page = 1) {
        if ($this->user_model->is_loggedin()) {
            $data = array();
            $this->set_active_meniu('users_list');
            $data['nav'] = $this->meniu;
            $users = array();
            $offset = ($page - 1) * 20;
            $users['user'] = $this->user_model->get_all_users($offset, 20);
            $data['content'] = $this->load->view('users_table', $users, true);
            $this->template->write_view('center_content', 'dash_board', $data);
            $this->template->render();
        } else {
            redirect(base_url());
        }
    }

    public function del_user() {
        if ($this->user_model->is_loggedin()) {
            $data = array();
            $this->set_active_meniu('users_list');

            $this->template->write_view('center_content', 'dash_board', $data);
            $this->template->render();
        } else {
            redirect(base_url());
        }
    }

    public function change_user_data() {
        
    }

    public function make_admins() {
        
    }

    public function send_message() {
        if ($this->user_model->is_loggedin()) {
            $data = array();
            $this->set_active_meniu('send_message');
            $data['nav'] = $this->meniu;
            $data['content'] = $this->load->view('send_message', '', true);
            $this->template->write_view('center_content', 'dash_board', $data);
            $this->template->render();
        } else {
            redirect(base_url());
        }
    }

    public function change_password() {
        if ($this->user_model->is_loggedin()) {
            $data = array();
            $this->set_active_meniu('change_password');
            $data['nav'] = $this->meniu;
            $data['content'] = $this->load->view('change_password', '', true);
            $this->template->write_view('center_content', 'dash_board', $data);
            $this->template->render();
        } else {
            redirect(base_url());
        }
    }

    public function logout() {
        $this->user_model->logout();
        redirect(base_url());
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
