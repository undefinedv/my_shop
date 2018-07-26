<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model("OrderModel");
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
        $data['orders']=$this->OrderModel->show_orders();
	if(empty($data['orders']))
	{
		show_404();
	}
	$data['title']='Orders informations';
	$this->load->view('templates/header',$data);
	$this->load->view('order/index.php',$data);
	$this->load->view('templates/footer');
    }

    public function insertorder()
    {
    	$buyer_id=$this->input->post('buyer_id');
	$goods_id=$this->input->post('goods_id');
	$price=$this->input->post('price');
	$ordertime=$this->input->post('ordertime');
	if($this->OrderModel->insert_orders($buyer_id,$goods_id,$price,$ordertime))
	{
		$data=array(
			"id"
		);
	}
	else{
		echo "<script>alert("insert order failed!");";
	}
    }

    public function changeorder()
    {
    	$id=$this->input->post('id');
	$price=$this->input->post('price');
	if($this->OrderModel->edit_order($id,$price))
	{
		$data=array(
			"id"
		);
	}
	else{
		echo "<script>alert("edit order failed!");";
	}
    }

    public function show()
    {
    	$id=$this->input->post('id');
	if($this->OrderModel->show_goods($id))
	{
		$data=array(
			"id"
		);
	}
	else{
		echo "<script>alert("show goods information failed!");";
	}
    }
}
