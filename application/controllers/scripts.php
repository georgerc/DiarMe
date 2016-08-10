<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scripts extends CI_Controller
{
    public function index()
    {

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

        $journal_text = $this->input->post('journal-text');
        $id=$this->input->post('id');
        $journal_title=$this->input->post('journal-title');
        $share=$this->input->post('share');
        $this->load->model('postModel');
        $this->postModel->update_posts($id,$journal_text,$journal_title,$share);
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




}

?>
