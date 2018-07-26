<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model("GoodModel");
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
	$data['goods']=$this->GoodModel->show_goods();
	if(empty($data['goods']))
	{
		show_404();
	}
	$data['title']='Goods informations';
	$this->load->view('templates/header',$data);
	$this->load->view('good/index.php',$data);
	$this->load->view('templates/footer');
    }

    public function insertgoods()
    {
    	$name=$this->input->post('name');
	$category=$this->input->post('category');
	$price=$this->input->post('price');
	$res=$this->input->post('res');
	$pic=$this->input->post('pic');
	if($this->GoodModel->insert_goods($name,$category,$price,$res,$pic))
	{
		$data=array(
			"id"
		);
	}
	else{
		echo "<script>alert('insert goods failed!');";
	}
    }

    public function changegoods()
    {
    	$good_id=$this->input->post('good_id');
	$price=$this->input->post('price');
	$res=$this->input->post('res');
	if($this->GoodModel->edit_goods($good_id,$price,$res))
	{
		$data=array(
			"id"
		);
	}
	else{
		return "<script>alert('edit good information failed!');";
	}
    }
}
