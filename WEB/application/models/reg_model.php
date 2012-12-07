<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reg_model
 *
 * @author KD
 */
class Reg_model extends CI_model {
    public function __construct()
    {
        $this->load->database();
    }
    public function addUser($data, $activation_code)
    {
            $password = $data['password'];
            $password2 = $data['passconf'];
            $email = $this->apsaugos->sken($data['email']);
            $user_type = $data['user_type'];
            if ($password == $password2)
            {
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
            else 
                    return false;
    }
    public function activateUser($id)
    {
            $query = $this->db->query("SELECT `id` FROM `users` WHERE `activation` = '$id'");
            if ($query->num_rows() == 1)
            {
               $this->db->query("UPDATE `users` SET `activated` = '1' WHERE `id` = '$id'");
                return true;
            }
            else 
                return false;	
    }
}

?>
