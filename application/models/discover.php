<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Model
{

    function getDiscoverPosts($page)
    {
        $this->db->select("journal_title,journal_text,odata,username,id");
        $this->db->from('journals');
        $this->db->where('share = 0');
        $this->db->order_by("odata","desc");
        $this->db->limit(6,($page-1)*6);
        $query = $this->db->get();
        return $query->result();
    }
    function getNumberOfPosts()
    {
        $this->db->select("id");
        $this->db->from('journals');
        $this->db->where('share = 0');
        $test ="SELECT share FROM journals WHERE share=0";
        $result = $this->db->query($test);
        return $result->num_rows();
    }


}

?>