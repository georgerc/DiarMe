<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', '', TRUE);
    }

    public function index()
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            redirect('home');
        } else {
            redirect('login');
        }

    }
    function not_found() {
        $this->load->view('404_error_view');
    }
    /*LOGIN FUNCTION*/
    /*Verifica daca userul exista in baza de date si daca parolele corespund*/
    function login()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database|min_length[4]|max_length[16]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            //$this->load->view('login_view','refesh');
            $this->load->view('login_view');
        } else {
            redirect('home', 'refresh');
        }
    }
/*Functia de validare a datelor introduse de utilizator si creerea sesiuni in cazul in care datele sunt valide.*/
    function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->userModel->login($username, $password);

        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'logged_in' => TRUE,
                    'avatar' => $this->userModel->getavatar($username)
                );
                $this->session->set_userdata($sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
/*REGISTER FUNCTION*/
/*Functia de inregistrare, valideaza datele si le trimite in model pentru inregistrare lor in baza de date.*/
    public function register_user()
    {
        $this->load->library('form_validation');
        $this->load->helper('htmlpurifier');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('username', 'User name', 'trim|is_unique[members.username]|required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[members.email]|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[60]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required|min_length[4]|max_length[60]');


        $data = array(
            'username' => html_purify($this->input->post('username')),
            'email' => html_purify($this->input->post('email')),
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
/*CHANGE PASSWORD FUNCTION */
/*Functia de schimbare a parolei. */
    public function change_password()
    {
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
            if (md5($this->input->post("old_pass", TRUE)) == $db_password) {
                $fixed_pw = md5($this->input->post("new_pw", TRUE));
                $this->db->set('password', $fixed_pw);
                $this->db->where('id', $db_id);
                $this->db->update('members');
                $this->session->set_flashdata('result', "<div style='color:darkgreen;'>Password has been changed successfully.</div>");
                redirect('/home');
            }
        } else {

            $this->session->set_flashdata('result', "<div style='color:red;'>An error has occurred,please try again .</div>");
            redirect('/home', 'refresh');
        }

    }
/*INSERT A JOURNAL IN TO DATABASE*/
/*Verifica datele si le introduce in baza de date*/
    public function insert_text()
    {
        $this->load->model('userModel');
        $this->load->helper('htmlpurifier');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            if ($this->session->userdata('avatar') == 1) {
                $img_path = 'uploads/' . $this->session->userdata('username') . '.jpg';
            } else {
                $img_path = 'uploads/default.png';
            }


            $data = array(
                'username' => $this->session->userdata('username'),
                'journal_title' => html_purify($this->input->post('journal-title')),
                'journal_text' => html_purify($this->input->post('journal-text')),
                'share' => $this->input->post('share', TRUE),
                'longitude' => $this->input->post('longitude', TRUE),
                'latitude' => $this->input->post('latitude', TRUE),
                'img_path' => $img_path
            );

            $this->load->helper('url');
            $this->db->insert('journals', $data);


            redirect('/home', 'refresh');
        } else {
            redirect('login');
        }
    }
/*EDIT JOURNAL FUNCTION*/
/*Functia de editare a unui jurnal */
    public
    function insert_edit_text()
    {
        $this->load->helper('security');
        $this->load->model('userModel');
        $this->load->helper('htmlpurifier');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');

            $journal_text = html_purify($this->input->post('journal-text'));
            $id = $this->input->post('id');
            $journal_title = html_purify($this->input->post('journal-title'));
            $share = $this->input->post('share', TRUE);
            if ($this->session->userdata('avatar') == 1) {
                $img_path = 'uploads/' . $this->session->userdata('username') . '.jpg';
            } else {
                $img_path = 'uploads/default.jpg';

            }
            $this->userModel->update_posts($id, $journal_text, $journal_title, $share, $img_path);
            redirect('/home', 'refresh');

        } else {
            redirect('login');
        }

    }
/*DELETE ACCOUNT*/
/*Permite posibilitate utilizatorului de a sterge contul impreuna cu tot ceea ce a postat acesta.*/
    public
    function delete_all_C()
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');
            $this->userModel->delete_account($this->session->userdata('username'));
            $this->userModel->delete_journals($this->session->userdata('username'));
            $this->session->unset_userdata('logged_in');
            session_destroy();
            $this->load->view('login_view');
        } else {
            redirect('login');
        }
    }
/*DELETE ALL USER JOURNALS*/
/*Permite posibilitate utilizatorului de a sterge toate jurnalele postate de acesta.*/
    public
    function delete_journals_C()
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');

            $this->userModel->delete_journals($this->session->userdata('username'));

            redirect('/home', 'refresh');
        } else {
            redirect('login');
        }
    }
/*DELTE A POST*/
/*Permite posibilitate utilizatorului de a sterge  un jurnal.*/
    public
    function delete($post_id = NULL)
    {
        $id_of_user = $this->session->userdata('username');

        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {

            {
                $this->userModel->delete_post($post_id, $id_of_user);

                redirect('/home', 'refresh');
            }
        } else {
            redirect('login');
        }
    }

//Main discover_view function/Functia pricipala de pe pagina de discover.
    public
    function discover($page = 1)
    {

        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {

            $data['posts'] = $this->userModel->getDiscoverPosts($page);

            $data['result'] = $this->userModel->getNumberOfPosts();

            $data['page'] = $page;
            $data['avatar'] = $this->userModel->getAvatar_All();
            $this->load->view('discover_view', $data);
        } else {
            redirect('login');

        }

    }

//Adaugarea jurnalelor pe o mapa
    public
    function map()
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');
            $data['posts'] = $this->userModel->getMapJournals($this->session->userdata('username'));

            $this->load->view('see_on_map_view', $data);
        } else {
            redirect('login');


        }
    }

//Edit funtion/Functia de edit.
    public
    function edit($post_id = NULL)
    {

        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {

            $data['posts'] = $this->userModel->getPosts($this->session->userdata('username'));

            $data['jurnal_edit'] = $this->userModel->edit_post($post_id);
            $data['id'] = $post_id;

            $this->load->view('home_edit_view', $data);
        } else {
            redirect('login');
        }

    }
/*UPLOAD FUNCTION*/
/*Verifica daca o poza este valida, redenumeste cu numele userului apoi o incarca in folderul uplaods*/
    public
    function do_upload()
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg",
                'overwrite' => TRUE,
                'file_name' => $this->session->userdata('username')
            );
            $this->userModel->update_img($config['file_name']);
            $this->load->model('userModel');
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
                $this->session->set_flashdata('upld_img', "<div style='color:green;'>Image uploaded successfully,please refresh the page to see the changes. .</div>");
                $this->userModel->update_avatar($this->session->userdata('username'));
                $this->session->set_userdata('avatar', '1');
                redirect('/home', 'refresh:3 ');
            } else {
                $this->session->set_flashdata('upld_img', "<div style='color:red;'>The image must be JPG and a maximum size ok 2Mb,please try again. .</div>");

                redirect('/home');
            }
        } else {
            redirect('login');
        }
    }
/*GET JOURNALS*/

    public
    function get_user_journals($username = null)
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('adminModel');
            $journals = $this->adminModel->get_user_journals($username);
            $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('journals' => $journals)));
        } else {
            redirect('login');

        }
    }
/*GET WARNED POSTS FOR ONE USER*/
/*afiseaza in home_view jurnalele care au primit 'warn'*/
    public
    function get_user_warned_posts()
    {
        $this->load->model('userModel');
        $username = $this->session->userdata('username');
        $warned_posts = $this->userModel->get_warn_posts($username);
        $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('warned_posts' => $warned_posts)));
    }
/*COMMENT_VIEW FUNTIONS*/
/*GET COMMENTS*/
/*Preia comentariile unui post specific pe baza id-ului si al titlu-lui.*/
    public
    function comments($id=NULL , $title = Null)
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');
            $check = $this->userModel->check_title($id);
            $number_of_comments = $this->userModel->number_of_comments($id);
            if (isset($id) && isset($title) && isset($check)) {
                if ($check['journal_title'] === urldecode($title) && $check['id']=== $id) {
                    $data['comments_db'] = $this->userModel->get_comments($id);
                    $data['public_post'] = $this->userModel->get_info_post($id);
                    $data['comment_id'] = $this->userModel->get_comment_id($id);

                    if ($number_of_comments > 0) {
                        foreach ($data['comment_id'] as $test) {
                            foreach ($test as $value) {
                                $data['comment_vote'][] = $this->userModel->count_upvotes_comment($id, $value);

                            }
                        }
                        for ($i = 0; $i < $number_of_comments; $i++) {
                            $data['comments_db'][$i]['comment_vote'] = $data['comment_vote'][$i];

                        }
                        $this->load->view('comments_view', $data);

                    } else {
                        $this->load->view('comments_view', $data);
                    }
                } else {
                    redirect('user/discover/1');
                }
            } else {
                redirect('user/discover/1');
            }
        } else {
            redirect('home');
        }
    }
    public function redirect_discover(){

            $this->load->view('comments_view');
    }

    public
    function comments1($id = NULL)
    {
        $this->load->model('userModel');
        $check_id = $this->userModel->check_id($this->session->userdata('username'));
        if ($this->session->userdata('logged_in') === True && $check_id[0]['username'] == $this->session->userdata('username')) {
            $this->load->model('userModel');
            echo $this->userModel->comments($id);
        } else {
            redirect('login');
        }
    }
/*VOTE FUNTIONS*/
/*Verifica daca userul a votat deja sau nu.*/
    public
    function check_vote()
    {
        $this->load->model('userModel');
        $id_of_post = $this->input->post('id_of_post', TRUE);
        $id_of_comment = $this->input->post('id_of_comment', TRUE);
        $username = $this->input->post('username', TRUE);
        $vote_number = $this->userModel->count_upvotes_comment($id_of_post,$id_of_comment);
        $check = $this->userModel->check_for_votes($id_of_post, $id_of_comment, $username);
        if ($check === TRUE) {
            $this->userModel->accept_vote($id_of_post, $id_of_comment, $username);
            $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('result' => 0,'vote_number'=>$vote_number)));
        } else {
            $this->userModel->delete_vote($id_of_post, $id_of_comment, $username);
            $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode(array('result' => 1,'vote_number'=>$vote_number)));
        }


    }
/*DELETE COMMENT*/
/*Permite posibilitate userului care a postat comentariul sa il stearga. */
    public function delete_comment()
    {
        $this->load->model('userModel');

        if ($this->session->userdata('logged_in') === True && $this->input->post('username') == $this->session->userdata('username')) {
            $id_of_post = $this->input->post('id_of_post', TRUE);
            $id_of_comment = $this->input->post('id_of_comment', TRUE);
            $username = $this->input->post('username', TRUE);
            $this->load->model('userModel');
            $this->userModel->delete_commentDb($id_of_post, $id_of_comment, $username);
        } else {
            redirect('home');
        }

    }
}

?>