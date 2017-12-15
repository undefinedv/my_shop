<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        $this->load->library('session');
        $this->load->model("UserModel");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/login');
        $this->load->view('templates/footer');
    }
    public function login1()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($this->UserModel->login($username, $password))
        {
            $data = array(
                "user_id"
            );
        }
        else{
            echo "<script>alert();";
        }

    }

    public function register()
    {

    }
}
