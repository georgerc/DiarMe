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
        $this->db->where('username', $username);
        $this->db->deletE('journals');
    }

    function update_avatar($username)
    {
        $this->db->where('username', $username);
        $this->db->set('avatar', '1');
        $this->db->update('members');
    }

    function getPosts($username)
    {
        $this->db->select("journal_title,journal_text,odata,id");
        $this->db->from('journals');
        $this->db->where('username = ', $username);
        $this->db->order_by("odata", "desc");
        $query = $this->db->get();

        return $query->result();
    }

    function delete_post($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('journals');

    }

    function edit_post($id)
    {
        $this->db->select('journal_text');
        $this->db->from('journals');
        $this->db->where('id= ', $id);
        $query = $this->db->get();

        return $query->result_array();

    }

    function update_posts($id, $journal_text, $journal_title, $share)
    {
        $this->load->database();
        $this->db->set('journal_text', $journal_text);
        $this->db->set('journal_title', $journal_title);
        $this->db->set('share', $share);
        $this->db->where('id', $id);
        $this->db->update('journals');

    }


}

?>