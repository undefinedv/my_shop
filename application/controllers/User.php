<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
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
            echo "<script>alert('login failed!Please try again or register first!');";
        }

    }

    public function register()
    {
	$username=$this->input->post('username');
	$password=$this->input->post('password');
	$address=$this->input->post('address');
	$phone=$this->input->post('phone');
	if($this->UserModel->register($username,$password,$address,$phone))
	{
		$data=array(
			"user_id"
		);
	}
	else{
		echo "<script>alert('register failed!');";
	}
    }

    public function changeinfo()
    {
    	$user_id=$this->input->post('user_id');
	$phone=$this->input->post('phone');
	$address=$this->input->post('address');
	if($this->UserModel->edit_userInfo($user_id,$phone,$address))
	{
		$data=array(
			"user_id"
		);
	}
	else{
		echo "<script>alert('change your information failed!')";
	}
    }
}
