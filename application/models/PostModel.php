<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model
{

    function getPosts($username)
    {
        $this->db->select("journal_title,journal_text,odata,id");
        $this->db->from('journals');
        $this->db->where('username = ', $username);
        $this->db->order_by("odata","desc");
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
    function update_posts($id,$journal_text,$journal_title,$share)
    {
        $this->load->database();
        $this->db->set('journal_text',$journal_text);
        $this->db->set('journal_title',$journal_title);
        $this->db->set('share',$share);
        $this->db->where('id',$id);
        $this->db->update('journals');

    }
}

?>