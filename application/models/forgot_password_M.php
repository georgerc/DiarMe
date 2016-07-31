<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_Password_M extends CI_Model
{
    public function index()
    {


    }

    function email_exists($email)
    {
        $sql = "SELECT username,email FROM members WHERE email='{$email}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        return ($result->num_rows() === 1 && $row->email) ? $row->username : false;
    }

    public function verify_reset_password_code($email, $code)
    {
        $sql = "SELECT username,email FROM members WHERE email = '{$email}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            return ($code == md5($this->config->item('salt') . $row->username)) ? true : false;
        } else {
            return false;
        }
    }

    public function update_password()
    {
        $this->load->database();
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $sql = "UPDATE members SET password= '{$password}',old_pass='{$password}' WHERE email= '{$email}' LIMIT 1   ";
        $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return true;
        } else {
            return trues;
        }
    }

}

?>