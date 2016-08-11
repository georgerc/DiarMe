<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->model('adminModel');
        $data['username'] = $this->adminModel->get_users();
        $this->load->view('home_admin_view', $data);
    }

    public function users()
    {
        $this->load->model('adminModel');
        $data['username'] = $this->adminModel->get_users();
        $this->load->view('admin_users', $data);

    }

    public function public_posts()
    {
        $this->load->model('adminModel');
        $data['public_journals'] = $this->adminModel->get_journals();
        $this->load->view('admin_public_posts', $data);
    }

    public function suspend_user($post_id = NULL){
        $this->load->model('adminModel');
        $this->adminModel->suspend_user($post_id);
        redirect('admin/users');
    }
    public function resume_user($post_id = NULL)
    {
        $this->load->model('adminModel');
        $this->adminModel->resume_user($post_id);
        redirect('admin/users');
    }


}