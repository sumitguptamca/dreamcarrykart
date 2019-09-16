<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		//die('34454');
		$this->load->view('admin/user');
	}
	
	
}

?>