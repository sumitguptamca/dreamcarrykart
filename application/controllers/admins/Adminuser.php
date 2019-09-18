<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminuser extends CI_Controller {
	public function index()
	{
		$data['user']=$this->Adminuser_model->getAlluser();
		$this->load->view('admin/user',$data);
	}
	public function changeadminuserstatus(){
		 $id =  $this->input->get('id');
		 $status = $this->input->get('status');
		 $reg=$this->Adminuser_model->changeadminuserstatus($id,$status);
		 redirect('admin/adminuser','refresh');
	}
	public function editadminuser(){
		$data['user']=$this->Adminuser_model->getEditAdminuser($_GET['id']);
			$this->load->view('admin/edit_admin_user',$data);

	}
	public function updateadminuser(){
		//echo "<pre>"; print_r($_POST); exit();
		$data=array(
	       		'id' => $this->input->post('id'),
			 	'name' => $this->input->post('name'),
			 	'mobile' => $this->input->post('mobile'),
			  );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminuser_model->update_adminuser($data);
			 redirect('admin/adminuser','refresh');
				 exit();

	}


}

?>
