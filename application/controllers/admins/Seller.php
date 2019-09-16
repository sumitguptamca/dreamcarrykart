<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
	public function index()
	{
		//die('34454');
		$this->load->view('admin/seller');
	}
	
	
}

?>