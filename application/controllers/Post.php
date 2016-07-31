<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller
{

    function __Construct()
    {
        parent::__Construct();
        $this->load->database(); // load database
        $this->load->model('postModel'); // load model
    }

    public function index()
    {
        $data['posts'] = $this->postModel->getPosts(); // calling Post model method getPosts()

        $this->load->view('home_view', $data); // load the view file , we are passing $data array to view file
    }

    public function delete($post_id = NULL)
    {
        $this->postModel->delete_post($post_id);

        redirect('/home', 'refresh');
    }

    public function discover($page = 1)
    {
        $this->load->model('discover');

        $data['posts'] = $this->discover->getDiscoverPosts($page);

        $data['result'] = $this->discover->getNumberOfPosts();

        $data['page'] = $page;

        $this->load->view('discover_view', $data);

    }

    public function edit($post_id = NULL){
        $data['posts'] = $this->postModel->getPosts($this->session->userdata('username'));

        $data['jurnal_edit']=$this->postModel->edit_post($post_id);
        $data['id']=$post_id;

        $this->load->view('home_edit_view',$data);


    }

}

?>