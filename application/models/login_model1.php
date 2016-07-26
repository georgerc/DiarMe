<?php if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');
class User_model extends CI_Model {

    
    public function get_user ($name , $password)
    {
    
        $qurey=this->db->get_where('members'array('username'=$name));
        if($query->num_row()>0)
        {
            $query=$query->row_array();
            $user_name=$query['username'];
            $password=$query['password'];
            if($name === $user_name)
            {
            $userdata= array('username'=>$user_name);
                $this->session->set_userdata ('$userdata');
                return TRUE;
            
            }
            else 
                return FALSE;
                
        }
        
    }




}