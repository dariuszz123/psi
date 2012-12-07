<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of
 *
 * @author KD
 */
class Login_model extends CI_model{
   public function __construct()
	{
            $this->load->database();
	}
   public function getUserData($id) 
	{
            $query = $this->db->query("SELECT * FROM `users` WHERE `id` = '$id'");
            return $query ->row_array();
	}
    public function IsExistEmail($email) 
    {
        $query = $this->db->query("SELECT `id` FROM `users` WHERE `nario_el_pastas` = '$email'");
        if ($query->num_rows() == 0) {
            return false;
        }
        else {
            return true;
        }
    }
    public function validateLogin($email, $pass) 
    {
        $pass = base64_encode(pack('H*', sha1($pass)));
        $query  = $this->db->query("SELECT `id` FROM `users` WHERE `user_email` = '$email' and `activated` = '1' and `user_password` = '$pass'");
        if ($query->num_rows() == 1) 
        {
            $date = date("Y-m-d H:i:s",time());
            $this->db->query("UPDATE `users` SET `last_login` = '$date' WHERE `id` = '".$slap['id']."'");
            return $slap['id'];
        }
        else {
                return false;
        }
    }
}

?>
