<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {


public function index()
{


}
    public function do_upload(){
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "jpg",
            'overwrite' => TRUE,
            'file_name' => $this->session->userdata('username')

        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
            $this->session->set_flashdata('upld_img',"<div style='color:green;'>Image uploaded successfully,please refresh the page to see the changes. .</div>");
            $data = array('upload_data' => $this->upload->data());
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