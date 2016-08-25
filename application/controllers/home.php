<?php

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
/*Verifica care user este admin si care user este utilizator si incarca View-ul potrivit.*/
    public function index()
    {
        if ($this->session->userdata('logged_in') === True) {
            $this->load->model('userModel');
            $this->load->model('adminModel');
            $session_data = $this->session->userdata('logged_in');
            $username = $this->session->userdata('username');
            $admin = $this->adminModel->get_admin($username);
            $suspended = $this->adminModel->get_suspended($username);
            $data['posts'] = $this->userModel->getPosts($this->session->userdata('username'));
            $data['username'] = $session_data['username'];
            $data['avatar'] = $this->userModel->getAvatar($this->session->userdata('username'));
            if ($admin == '1') {

                redirect('admin');
            } else {
                if ($suspended == '1') {
                    $this->load->view('suspended_view');
                } else {
                    $this->load->view('home_view', $data);
                }
            }


        } else
            //If no session, redirect to login page
            $this->load->view('login_view');
    }

/*LOGOUT FUNTION*/
/*Functia de delogare.*/
    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'logged_in' && $key != '' && $key != 'username' && $key != 'avatar') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>