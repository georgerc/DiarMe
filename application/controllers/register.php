<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        return $this->load->view('changepassword');
    }

    public function register_user()
    {
        $this->load->library('form_validation');
        //reguli de inscriere
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('username', 'User name', 'trim|is_unique[members.username]|required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[members.email]|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[60]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required|min_length[4]|max_length[60]');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'old_pass' => md5($this->input->post('password'))
        );

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login_view');

        } else {
            $this->load->model('user_model');
            $this->load->view('login_view');
            $this->db->insert('members', $data);


        }

    }
}

?>
?>

