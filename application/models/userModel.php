<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class UserModel extends CI_Model
{
    //Validate user credentials to see if they match with the database.
    //Validarea datelor introduse de user pentru a vedea daca sunt in baza de date.
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

    function getavatar($username)
    {
        $this->load->database();
        $this->db->select('avatar');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();
        $data = $query->result_array();

        //echo($data[0]['avatar']);
        return $data[0]['avatar'];

    }
            function delete_account($username)
            {
                $this->db->where('username', $username);
                $this->db->delete('members');



            }
            function delete_journals($username)
            {
                $this->db->where('username',$username);
                $this->db->deletE('journals');
            }
            function update_avatar($username) {
                $this->db->where('username',$username);
                $this->db->set('avatar','1');
                $this->db->update('members');
            }



}

?>