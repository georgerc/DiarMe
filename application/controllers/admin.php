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
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $data['username'] = $this->adminModel->get_users();
            $data['count_users'] = $this->adminModel->count_users();
            $data['count_public_posts'] = $this->adminModel->count_public_posts();
            $data['count_warned_posts'] = $this->adminModel->count_warned_posts();
            $this->load->view('home_admin_view', $data);
        } else {
            redirect('login');
        }
    }
/*ADMIN ACTIONS */


/*USERS PANEL*/
    public function users()
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $data['username'] = $this->adminModel->get_users();
            $data['count_users'] = $this->adminModel->count_users();
            $data['count_public_posts'] = $this->adminModel->count_public_posts();
            $data['count_warned_posts'] = $this->adminModel->count_warned_posts();
            $this->load->view('admin_users', $data);
        } else {
            redirect('login');
        }

    }
/*PUBLIC POSTS PANEL*/
    public function public_posts()
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $data['public_journals'] = $this->adminModel->get_journals();
            $data['count_users'] = $this->adminModel->count_users();
            $data['count_public_posts'] = $this->adminModel->count_public_posts();
            $data['count_warned_posts'] = $this->adminModel->count_warned_posts();
            $this->load->view('admin_public_posts', $data);
        } else {
            redirect('login');
        }
    }
/*WARNED POSTS PANEL*/
    public function warned_posts()
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $warn_data['warn_posts'] = $this->adminModel->get_warn_posts();
            $warn_data['count_users'] = $this->adminModel->count_users();
            $warn_data['count_public_posts'] = $this->adminModel->count_public_posts();
            $warn_data['count_warned_posts'] = $this->adminModel->count_warned_posts();
            $this->load->view('admin_warned_posts', $warn_data);
        } else {
            redirect('login');
        }
    }
/*SUSPEND USER FUNCTION*/
    public function suspend_user($post_id = NULL)
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $this->adminModel->suspend_user($post_id);
            redirect('admin/users');
        } else {
            redirect('home/logout');
        }
    }
/*RESUME USER FUNCTION*/
    public function resume_user($post_id = NULL)
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $this->adminModel->resume_user($post_id);
            redirect('admin/users');
        } else {
            redirect('home/logout');
        }
    }
/*DELETE POST ADMIN FINCTION*/
    public function delete_userC($post_username = NULL)
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $this->adminModel->delete_user($post_username);;
            redirect('admin/users');
        } else {
            redirect('home/logout');

        }

    }
/*RENAME USER FUNCTION*/
    public function rename_userC()
    {

        $this->load->model('adminModel');

        $current_username = $this->input->post('current_username');
        $new_username = $this->input->post('newusername');
        $this->adminModel->rename_user($new_username, $current_username);;
        redirect('admin/users');


    }
/*SEND MESSAGE TO A USER //ADMIN// FUNCTION*/
    public function send_message()
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->library('email');
            $this->email->set_mailtype('html');
            $this->email->from($this->config->item('bot_email'), 'DiarMe');
            $this->email->to($this->input->post('email'));
            $this->email->subject($this->input->post('subject'));
            $message = '<!DOCTYPE html <meta http-equiv="Content-Type" content="text/html";charset=utf-8" /></head><body>';
            $message_post = $this->input->post('message');
            $message .= '<p>' . $message_post . '</p>';
            $message .= '</body></html>';
            $this->email->message($message);
            $this->email->send();
            redirect('admin/users');
        } else {
            redirect('home/logout');
        }
    }
/*VIEW USER JOURALS //ADMIN// FUNCTION*/
/*Preia toate jurnalele publice ale unui user. */
    public function get_user_journals($username = null)
    {
        $this->load->model('adminModel');
        $journals = $this->adminModel->get_user_journals($username);
        $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('journals' => $journals)));
    }
/*DELETE A PUBLIC JOURNAL FUNTION IN  USERS PANEL*/
    public function delete_postC($id)
    {
        $this->load->model('adminModel');
        if ($this->session->userdata('logged_in') === True) {
            $check_user = $this->session->userdata('username');
            $check_admin = $this->adminModel->get_admin($check_user);
            if ($check_admin == 1) {
                $this->load->model('adminModel');
                $this->adminModel->delete_post($id);
                redirect('admin/users');
            } else {
                die('You are not allowed to do this action');
            }
        } else {
            die('You are not allowed to do this action');

        }
    }
/*DELETE A WARN POST FUNCTION IN WARNED POSTS PANEL*/
    public function delete_post_warnedC($id)
    {
        $this->load->model('adminModel');
        if ($this->session->userdata('logged_in') === True) {
            $check_user = $this->session->userdata('username');
            $check_admin = $this->adminModel->get_admin($check_user);
            if ($check_admin == 1) {
                $this->load->model('adminModel');
                $this->adminModel->delete_post_warned($id);
                redirect('admin/warned_posts');
            } else {
                die('You are not allowed to do this action');
            }
        } else {
            die('You are not allowed to do this action');

        }
    }
/*SUSPEND A PUBLIC POSTS */

    public function warn_postC($id = NULL, $username = NULL)
    {
        $this->load->model('adminModel');
        if ($this->session->userdata('logged_in') === True) {
            $check_user = $this->session->userdata('username');
            $check_admin = $this->adminModel->get_admin($check_user);
            if ($check_admin == 1) {
                $message = $this->input->post('warn_message');
                $this->load->model('adminModel');
                $this->adminModel->warn_post($id, $username, $message);
                redirect('admin/public_posts');
            } else {

                die('Error');
            }
        } else {
            die('You are not allowed to do this action');
        }

    }
/**/
    public function dewarn_postC($id = NULL)
    {
        $this->load->model('adminModel');
        $check_user = $this->session->userdata('username');
        $check_admin = $this->adminModel->get_admin($check_user);
        if ($this->session->userdata('logged_in') === True && $check_admin == 1) {
            $this->load->model('adminModel');
            $this->adminModel->dewarn_post($id);
            redirect('admin/warned_posts');

        } else {
            die('You are not allowed to do this action');
        }

    }

    public function warn_post_admin($id=NULL)
    {
        $this->load->model('adminModel');
        $this->adminModel->warn_post_admin($id);
        redirect('admin/users');
    }
}