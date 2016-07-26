<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    function index()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database|min_length[4]|max_length[16]');

        if($this->form_validation->run() == FALSE)
        {

            $this->load->view('login_view');
        }
        else
        {
            redirect('home', 'refresh');
        }

    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', True);
                $this->session->set_userdata('username', $username);
                redirect('home');
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        } 
    } 

}


?>