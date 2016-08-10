<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller
{

    function __Construct()
    {
        parent::__Construct();
        $this->load->database(); // load database/Icarcam baza de date global.
        $this->load->model('userModel'); // load model/Incarcam,modelul postModel.
    }

    public function index()
    {
        $data['posts'] = $this->userModel->getPosts(); // calling Post model method getPosts()/ Apel la functia getPosts();

        $this->load->view('home_view', $data); // load the view file , we are passing $data array to view file//incarca file view, incarcam $data la view-ul "home_view";
    }

    public function delete($post_id = NULL)
    {
    {
        $this->userModel->delete_post($post_id);

        redirect('/home', 'refresh');
    }
//Main discover_view function/Functia pricipala de pe pagina de discover.
    public function discover($page = 1)
    {
        $this->load->model('discover');
        $this->load->model('userModel');
        $data['posts'] = $this->discover->getDiscoverPosts($page);

        $data['result'] = $this->discover->getNumberOfPosts();

        $data['page'] = $page;

        $this->load->view('discover_view', $data);

    }

    //Edit funtion/Functia de edit.
    public function edit($post_id = NULL){
        $data['posts'] = $this->userModel->getPosts($this->session->userdata('username'));

        $data['jurnal_edit']=$this->userModel->edit_post($post_id);
        $data['id']=$post_id;

        $this->load->view('home_edit_view',$data);


    }


}

?>