
<?php
class PostModel extends CI_Model {

	function getPosts($username){
		$this->db->select("journal_title, id"); 
	  	$this->db->from('journals');
	  	$this->db->where('username = ', $username);
	  	$query = $this->db->get();
	  	return $query->result();
	}
}
?>