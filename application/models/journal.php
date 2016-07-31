<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Journal extends CI_Model
{
    function get_all()
    {
        $query = $this->db->query('SELECT journal_title FROM journals LIMIT 1');

        $row = $query->row();
        echo $row->journal_title;
        echo $row->journal_text;
    }


}
?>