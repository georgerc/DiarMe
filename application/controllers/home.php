<?php
class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->session->userdata('logged_in') === True)
        {
            $session_data = $this->session->userdata('logged_in');
            $this->load->model('userModel'); // load model
            $data['posts'] = $this->userModel->getPosts($this->session->userdata('username'));
            $data['username'] = $session_data['username'];
            $data['avatar']=$this->userModel->getAvatar($this->session->userdata('username'));
            $this->load->view('home_view', $data);
        }
        else
            //If no session, redirect to login page
             $this->load->view('login_view');
        }


    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->load->view('login_view');
    }

    function post_data($id) {
        // ceri datele de la baza de date
        
        // dai return in format JSON
    }

}

?>