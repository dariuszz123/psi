<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author KD
 */
class User_model extends CI_model {

    public function __construct() {
        $this->load->database();
    }

    public function get_user_data($id) {
        $query = $this->db->query("SELECT * FROM `users` WHERE `id` = '$id'");
        return $query->row_array();
    }

    public function is_user_exists($email) {
        $query = $this->db->query("SELECT `id` FROM `users` WHERE `nario_el_pastas` = '$email'");
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function encode_pass($pass) {
        return base64_encode(pack('H*', sha1($pass)));
    }

    public function login($email, $pass) {
        $query = $this->db->query("SELECT `id` FROM `users` WHERE `user_email` = '$email' and `activated` = '1' and `user_password` = '" . $this->encode_pass($pass) . "'");
        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            $this->db->query("UPDATE `users` SET `last_login` = NOW() WHERE `id` = '" . $user['id'] . "'");
            $this->session->set_userdata('user_id', $user['id']);
            return true;
        } else {
            return false;
        }
    }

    public function get_user_type($email) {

        if (preg_match("#(.*?)@stud.(.*).vu.lt#is", $email) === true) {
            return USER_STUDENT;
        } else if (preg_match("#(.*?)@(.*).vu.lt#is", $email) === true) {
            return USER_TEACHER;
        }

        return false;
    }
    
    public function gen_activation_hash() {
        return sha1(md5(hash('crc32', rand(1, 999))));
    }


    public function add_user($email, $password) {

        if (strlen($password) < 6) {
            $this->session->set_flashdata('message_error', "Slaptažodis per trumpas.");
            return false;
        }

        $user_type = $this->get_user_type($email);

        if ($user_type !== false) {
            $this->session->set_flashdata('message_error', "Klaidingas el. pašto adresas.");
            return false;
        }

        $this->db->query("INSERT INTO `users` 
                            SET 
                            `user_email` = '$email', 
                            `user_password` = '".$this->encode_pass($password)."',
                            `user_type` = '$user_type',
                            `activation_hash` = '".$this->gen_activation_hash()."'
        ");
        
        return true;
    }
    
    public function is_valid_activation_hash($user_id, $hash) {
        $user = $this->get_user_data($user_id);
        if($user && $user['activation_hash'] !== null && $user['activation_hash'] == $hash) {
            return true;
        }
        return false;
    }
    
    public function activate_user($user_id, $hash) {
        if($this->is_valid_activation_hash($user_id, $hash) === true) {
            $this->db->query("UPDATE `users` SET `activated` = NULL WHERE `id` = '$user_id'");
            return true;
        }else{
            return false;
        }
    }

    public function is_loggedin() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            if ($this->get_user_data($user_id)) {
                return true;
            }
        }
        return false;
    }

}

?>
