<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class UserModel extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('id, username, password');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>