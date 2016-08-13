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

    public function suspend_user($post_id = NULL)
    {
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

    public function delete_userC($post_username = NULL)
    {
        $this->load->model('adminModel');
        $this->adminModel->delete_user($post_username);;
        redirect('admin/users');
    }

    public function rename_userC()
    {
        $this->load->model('adminModel');
        $current_username=$this->input->post('current_username');
        $new_username=$this->input->post('newusername');
        $this->adminModel->rename_user($new_username,$current_username);;
        redirect('admin/users');

    }

    public function send_message()
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'DiarMe');
        $this->email->to($this->input->post('email'));
        $this->email->subject($this->input->post('subject'));
        $message = '<!DOCTYPE html <meta http-equiv="Content-Type" content="text/html";charset=utf-8" /></head><body>';
        $message_post=$this->input->post('message');
        $message .='<p>'.$message_post.'</p>';
        $message .='</body></html>';
        $this->email->message($message);
        $this->email->send();
        redirect('admin/users');
    }
}