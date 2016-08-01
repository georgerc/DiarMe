<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
//parent contruct incarca in tota classa.
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', '', TRUE);
    }

    //Functia de login
    function login()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database|min_length[4]|max_length[16]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login_view','refesh');
        } else {
            redirect('home', 'refresh');
        }
    }
//Logiut funtion
//Funtia de logout
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');


    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        //Validarea contra form_validation completata cu succes.//apelare login din model pentru validare impotriva bazei de date.
        $username = $this->input->post('username');

        //query the database// Validare inpotriva bazei de date
        //NOTE ! =========
        //Folosteste escape() la query pentru protectie.
        $result = $this->userModel->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', True);
                $this->session->set_userdata('username', $username);
               $this->session->set_userdata('avatar',$this->userModel->getavatar($username));

                redirect('home');
            }
            return TRUE;
        } else {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}


?>