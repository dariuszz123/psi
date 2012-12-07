<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author KD
 */
class User_model extends CI_model{
    public function __construct() {
        $this->load->database();
    }
    public function getUserData($id)  {
        $query = $this->db->query("SELECT * FROM `users` WHERE `id` = '$id'");
        return $query ->row_array();
    }
    public function IsExistEmail($email) {
        $query = $this->db->query("SELECT `id` FROM `users` WHERE `nario_el_pastas` = '$email'");
        if ($query->num_rows() == 0) {
            return false;
        }
        else {
            return true;
        }
    }
    public function validateLogin($email, $pass) {
        $pass = base64_encode(pack('H*', sha1($pass)));
        $query  = $this->db->query("SELECT `id` FROM `users` WHERE `user_email` = '$email' and `activated` = '1' and `user_password` = '$pass'");
        if ($query->num_rows() == 1) {
            $date = date("Y-m-d H:i:s",time());
            $this->db->query("UPDATE `users` SET `last_login` = '$date' WHERE `id` = '".$slap['id']."'");
            return $slap['id'];
        }
        else {
                return false;
        }
    }
    public function addUser($data, $activation_code) {
        $password = $data['password'];
        $password2 = $data['passconf'];
        $email = $this->apsaugos->sken($data['email']);
        $user_type = $data['user_type'];
        if ($password == $password2) {
            $password_encoded = base64_encode(pack('H*', sha1($password)));
            $date = date("Y-m-d H:i:s",time());
            $this->db->query("INSERT INTO `users` 
                            SET 
                            `user_email` = '$email', 
                            `user_password` = '$password_encoded',
                            `nario_el_pastas` = '$email',
                            `user_type` = '$user_type',
                            `nario_reg_laikas` = '$date'
                    ");
                return true;
        }
        else {
                return false;
        }
    }
    public function activateUser($id) {
        $query = $this->db->query("SELECT `id` FROM `users` WHERE `activation` = '$id'");
        if ($query->num_rows() == 1)
        {
           $this->db->query("UPDATE `users` SET `activated` = '1' WHERE `id` = '$id'");
            return true;
        }
        else {
            return false;
        }
    }
    public function isLoggedIn() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            if ($this->getUserData($user_id)) {
                return true;
            }
        }
        return false;
    }
}

?>
