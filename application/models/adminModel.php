<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class AdminModel extends CI_Model
{
    /*ADMIN MODELS FUNCTIONS*/
    function get_users()
    {

        $this->db->select('id,username,email,suspended');
        $this->db->from('members');
        $this->db->where('admin', '0');
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

    function get_suspended($username)
    {
        $this->db->select('suspended');
        $this->db->from('members');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0]['suspended'];


    }

    function get_journals()
    {
        $sql = "SELECT journal_title,journal_text,odata,username,id FROM journals WHERE share ='0' AND warned ='0'";
        $result = $this->db->query($sql);
        return $result->result_array();
        // $this->db->select("journal_title,username,journal_text,odata,id");
        // $this->db->from('journals');
        // $this->db->where('share', '0');
        // $this->db->order_by("odata", "desc");
        // $query = $this->db->get();
        //  return $query->result_array();
    }

    function suspend_user($id)
    {
        $this->db->set('suspended', '1');
        $this->db->where('id', $id);
        $this->db->update('members');
    }

    function resume_user($id)
    {
        $this->db->set('suspended', '0');
        $this->db->where('id', $id);
        $this->db->update('members');
    }

    function delete_user($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('members');
        $this->db->where('username', $username);
        $this->db->delete('journals');
    }

    function rename_user($new_username, $current_username)
    {
        $this->db->set('username', $new_username);
        $this->db->where('username', $current_username);
        $this->db->update('members');
        $this->db->set('username', $new_username);
        $this->db->where('username', $current_username);
        $this->db->update('journals');
    }

    function get_user_journals($username)
    {
        $this->db->select("journal_title,journal_text,odata,id");
        $this->db->from('journals');
        $this->db->where('username', $username);
        $this->db->where('warned',0);
        $this->db->order_by("odata", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_post($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('journals');

    }
    function delete_post_warned($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('journals');

    }

    function warn_post($id, $username, $message)
    {
        $this->db->set('warned', '1');
        $this->db->set('warned_reason', $message);
        $this->db->where('id', $id);
        $this->db->update('journals');
    }

    function get_warn_posts()
    {
        $sql = "SELECT journal_title,journal_text,odata,username,id FROM journals WHERE share ='0' AND warned ='1'";
        $result = $this->db->query($sql);
        return $result->result_array();
        //  $this->db
        //      ->select("journal_title")
        //      ->from("journals")
        //      ->where('share = 0')
        //      ->or_where('warned = 1')
        //      ->or_where('username',$username);
        //  $query = $this->db->get();
        //  return $query->result_array();

    }

    function dewarn_post($id)
    {
        $this->db->set('warned', '0');
        $this->db->where('id', $id);
        $this->db->update('journals');

    }

    function count_users()
    {
        $sql = "SELECT username FROM members WHERE admin='0' ";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function count_public_posts()
    {
        $sql = "SELECT username FROM journals WHERE share='0' AND warned='0'";
        $result = $this->db->query($sql);
        return $result->num_rows();

    }

    function count_warned_posts()
    {
        $sql = "SELECT id FROM journals WHERE share ='0' AND warned ='1'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    function warn_post_admin($id){
        $this->db->set('warned','1')->where('id',$id)->update('journals');
    }
}


