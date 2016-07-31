<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_Password_C extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function reset_password()
    {
        $this->load->model('forgot_password_M');
        if (isset($_POST['email'])) {
            $this->load->library("form_validation");
            $this->load->helper('security');
            $this->form_validation->set_rules('email', "Email Adress", 'trim|required|min_length[6]|max_length[50]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view', array('error' => 'Please enter a valid email adress'));

            } else {

                $email = trim($this->input->post('email'));
                $result = $this->forgot_password_M->email_exists($email);

                if ($result) {
                    $this->send_reset_password_email($email, $result);
                    $this->load->view('login_view', array('email' => $email));


                } else {

                    $this->load->view('login_view', array('error' => 'Email adress not registered'));


                }

            }


        }
    }
   public function send_reset_password_email($email, $username)
    {
        $this->load->model('forgot_password_M');
        $this->load->library('email');
        $email_code = md5($this->config->item('salt') . $username);
        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_email'), 'DiarMe');
        $this->email->to($email);
        $this->email->subject('Password Change DiarMe');

        $message = '<!DOCTYPE html <meta http-equiv="Content-Type" content="text/html";charset=utf-8" /></head><body>';
        $message .='<p>You have requiested a password change.Please <strong><a href="'.base_url().'index.php/forgot_password_C/reset_password_form/'.$email.'/'.$email_code.'">click here</a></strong>to reset your password.</p>';
        $message .='</body></html>';

        $this->email->message($message);
        $this->email->send();

    }
    public function reset_password_form($email,$email_code){

        if(isset($email,$email_code)){
            $this->load->model('forgot_password_M');
            $email=trim($email);
            $email_hash=sha1($email.$email_code);
            $verified=$this->forgot_password_M->verify_reset_password_code($email,$email_code);

            if($verified){
                $this->load->view('update_password_view',array('email_hash' =>$email_hash,'email_code'=>$email_code,'email'=> $email));
            }else{
                $this->load->view('update_password_view',array('error'=>'We encounter a problem,please try again'));
            }

        }

    }
    public function update_password(){

        if(!isset($_POST['email'],$_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'].$_POST['email_code'])){
            die('Error updating your password');
        }
        $this->load->model('forgot_password_M');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('email_hash','Email Hash','trim|required');
        $this->form_validation->set_rules('email','Email');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password_conf','Confirm Password','trim|required|min_length[6]|matches[password]|max_length[50]|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('update_password_view');


        }else{

            $result=$this->forgot_password_M->update_password();
            if($result){

                $this->load->view('update_password_view_succes');


            }else
            {
                $this->load->view('login_view');

            }

        }

}

}


?>