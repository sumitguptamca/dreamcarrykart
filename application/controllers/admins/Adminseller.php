<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminseller extends CI_Controller {
	public function index()
	{
		$data['user']=$this->Adminseller_model->getAllseller();
		//echo "<pre>"; print_r($data['user']); exit();
		$this->load->view('admin/seller',$data);
	}
	public function changeadminsellerstatus(){
		 $id =  $this->input->get('id');
		 $status = $this->input->get('status');
		 $reg=$this->Adminseller_model->changeadminsellerstatus($id,$status);
		 redirect('admin/adminseller','refresh');
	}
	public function editadminseller(){
		$data['user']=$this->Adminseller_model->getEditAdminseller($_GET['id']);
			$this->load->view('admin/edit_admin_seller',$data);
	}
	public function updateadminseller(){
		//echo "<pre>"; print_r($_POST); exit();
		if(isset($_POST['password'])){
			$password = md5($_POST['password']);
		}else{
			$password = $_POST['seller_password'];
		}
		$data=array(
	       		'id' => $this->input->post('id'),
			 	'seller_name' => $this->input->post('name'),
			 	'seller_mob' => $this->input->post('mobile'),
			 	'gst_no' => $this->input->post('gst_no'),
			 	'company_name' => $this->input->post('company_name'),
			 	'seller_password' => $password,
			  );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminseller_model->update_adminseller($data);
			 redirect('admin/adminseller','refresh');
				 exit();

	}


}

?>
