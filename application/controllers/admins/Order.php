<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function index()
	{
		//die('34454');
		$this->load->view('admin/order_all');
	}
	public function c_order(){
		$this->load->view('admin/c_order');
	}
	public function p_order(){
		$this->load->view('admin/c_order');
	}
	public function cancel_order(){
		$this->load->view('admin/c_order');
	}
	
}

?>