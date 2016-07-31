<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Post2 extends CI_Model
{

    function getDiscoverPosts($share)
    {
    	$this->db->select("journal_title,journal_text,odata,username,id,share");
        $this->db->from('journals');
        $this->db->where('share = 1')

        $interogare = $this->db->get();

        return $interogare->result();

    }

}

?>