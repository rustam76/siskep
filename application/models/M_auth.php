<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    // cek login admin
    public function CekUser($username)
    {

        $query = $this->db->query("SELECT * from tbl_user where username ='$username'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function CekLogin($username, $password)
    {
        $query = $this->db->query("SELECT * from tbl_user where username ='$username' and password='$password'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    // bats cek login admin

}
