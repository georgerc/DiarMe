<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class AdminModel extends CI_Model
{


    function get_users()
    {

        $this->db->select('id,username,email,suspended');
        $this->db->from('members');
        $this->db->where('admin','0');
        $query = $this->db->get();

        return $query->result_array();
    }
    function get_admin($username)
    {
        $this->db->select('admin');
        $this->db->from('members');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0]['admin'];
    }
        function get_suspended($username){
            $this->db->select('suspended');
            $this->db->from('members');
            $this->db->where('username',$username);
            $query = $this->db->get();
            $data = $query->result_array();
            return $data[0]['suspended'];


        }
    function get_journals()
    {
        $this->db->select("journal_title,username,journal_text,odata,id");
        $this->db->from('journals');
        $this->db->where('share','1');
        $this->db->order_by("odata", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function suspend_user($id){
        $this->db->set('suspended','1');
        $this->db->where('id',$id);
        $this->db->update('members');
    }
    function resume_user($id){
        $this->db->set('suspended','0');
        $this->db->where('id',$id);
        $this->db->update('members');
    }


    }

