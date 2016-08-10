<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
//parent contruct incarca in tota classa.
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', '', TRUE);
    }
    public function index()
    {
        $data['posts'] = $this->userModel->getPosts(); // calling Post model method getPosts()/ Apel la functia getPosts();

        $this->load->view('home_view', $data); // load the view file , we are passing $data array to view file//incarca file view, incarcam $data la view-ul "home_view";


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
            $this->load->view('login_view');
            $this->db->insert('members', $data);


        }

    }

    public function change_password()
    {
//        $this->page_handler->member_page();
        $this->load->database();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
        $this->form_validation->set_rules('new_pw', 'New Password', 'required');
        $this->form_validation->set_rules('conf_pw', 'Confirm Password', 'required|matches[new_pw]');
        if ($this->form_validation->run() == TRUE) {
            $sql = $this->db->select("*")->from("members")->where("username", $this->session->userdata("username"))->get();

            foreach ($sql->result() as $my_info) {
                $db_password = $my_info->password;
                $db_id = $my_info->id;
            }
            if (md5($this->input->post("old_pass")) == $db_password) {

                $fixed_pw = md5($this->input->post("new_pw"));

                //$update = $this->db->query("UPDATE 'members' SET 'password' = '$fixed_pw' WHERE 'id'='$db_id'") or die(mysql_error());
                $this->db->set('password', $fixed_pw);
                $this->db->where('id', $db_id);
                $this->db->update('members');

                //$this->session-> set_flashdata('result', 'Password has been changed successfully!');
                $this->session->set_flashdata('result', "<div style='color:darkgreen;'>Password has been changed successfully.</div>");
                redirect('/home');
            }
        } else {

            $this->session->set_flashdata('result', "<div style='color:red;'>An error has occurred,please try again .</div>");
            redirect('/home', 'refresh');
        }

    }

    public function insert_text()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'journal_title' => $this->input->post('journal-title'),
            'journal_text' => $this->input->post('journal-text'),
            'share' => $this->input->post('share')
        );

        $this->load->helper('url');
        $this->db->insert('journals', $data);




        redirect('/home', 'refresh');
    }

    public function insert_edit_text()
    {
        $this->load->model('userModel');

        $journal_text = $this->input->post('journal-text');
        $id=$this->input->post('id');
        $journal_title=$this->input->post('journal-title');
        $share=$this->input->post('share');
        $this->userModel->update_posts($id,$journal_text,$journal_title,$share);
        redirect('/home','refresh');


    }

    public function redirect_discover()
    {
        $this->load->view('discover_view');
    }
    public function delete_all_C()
    {
        $this->load->model('userModel');
        $this->userModel->delete_account($this->session->userdata('username'));
        $this->userModel->delete_journals($this->session->userdata('username'));
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->load->view('login_view');

    }
    public function delete_journals_C()
    {
        $this->load->model('userModel');

        $this->userModel->delete_journals($this->session->userdata('username'));

        redirect('/home','refresh');

    }
    public function delete($post_id = NULL)
    {
        {
            $this->userModel->delete_post($post_id);

            redirect('/home', 'refresh');
        }
    }
//Main discover_view function/Functia pricipala de pe pagina de discover.
    public function discover($page = 1)
    {
        $this->load->model('userModel');
        $data['posts'] = $this->userModel->getDiscoverPosts($page);

        $data['result'] = $this->userModel->getNumberOfPosts();

        $data['page'] = $page;

        $this->load->view('discover_view', $data);

    }

    //Edit funtion/Functia de edit.
    public function edit($post_id = NULL)
    {
        $data['posts'] = $this->userModel->getPosts($this->session->userdata('username'));

        $data['jurnal_edit'] = $this->userModel->edit_post($post_id);
        $data['id'] = $post_id;

        $this->load->view('home_edit_view', $data);


    }
    public function do_upload(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "jpg",
            'overwrite' => TRUE,
            'file_name' => $this->session->userdata('username')
        );
        $this->load->model('userModel');
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
            $this->session->set_flashdata('upld_img',"<div style='color:green;'>Image uploaded successfully,please refresh the page to see the changes. .</div>");
            $data = array('upload_data' => $this->upload->data());
            $this->userModel->update_avatar($this->session->userdata('username'));
            $this->session->set_userdata('avatar','1');
            redirect('/home','refresh:3 ');
        }
        else
        {
            $this->session->set_flashdata('upld_img',"<div style='color:red;'>The image must be JPG and a maximum size ok 2Mb,please try again. .</div>");

            redirect('/home');
        }
    }


}


?>