<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
/*RERECTIONARE IN CAZ CA URILIZATORUL NU ARE PERMISIUNE SAU ESTE DELOGAT*/
    function index()
    {
        $this->load->helper(array('form'));
        $this->load->view('login_view');
    }

}

?>