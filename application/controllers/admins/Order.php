<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function index()
	{
		$data['order']=$this->Order_model->getAllOrder();

		//echo "<pre>";print_r($data);die;
		$this->load->view('admin/order_all',$data);
	}
	public function c_order(){
		$data['order']=$this->Order_model->getAllOrder();
		$this->load->view('admin/c_order',$data);
	}
	public function p_order(){
		$data['order']=$this->Order_model->getAllOrder();
		$this->load->view('admin/p_order',$data);
	}
	public function cancel_order(){
		$data['order']=$this->Order_model->getAllOrder();
		$this->load->view('admin/cancel_order',$data);
	}
	
}

?>
