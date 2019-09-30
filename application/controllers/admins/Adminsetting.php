<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsetting extends CI_Controller {

	public function index(){
		$data['row'] = $this->Adminsetting_model->companyinfo();

		//echo"<pre>";print_r($data['cinfo']);exit();
		$this->load->view('admin/company_info',$data);
	}
	public function term(){
		$data['row'] = $this->Adminsetting_model->terminfo();

		//echo"<pre>";print_r($data['cinfo']);exit();
		$this->load->view('admin/term',$data);

	}
	public function privacy(){
		$data['row'] = $this->Adminsetting_model->privacy();

		//echo"<pre>";print_r($data['cinfo']);exit();
		$this->load->view('admin/privacy',$data);

	}
	public function refund(){
		$data['row'] = $this->Adminsetting_model->refund();

		//echo"<pre>";print_r($data['cinfo']);exit();
		$this->load->view('admin/refund',$data);

	}
	public function career(){
		$data['row'] = $this->Adminsetting_model->career();

		//echo"<pre>";print_r($data['cinfo']);exit();
		$this->load->view('admin/career',$data);

	}
	public function saveterm(){

		 $data=array(
			 	'id' => $this->input->post('id'),
			 	'heading' => $this->input->post('heading'),
			 	'content' => $this->input->post('content'),
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminsetting_model->updateTerm($data);
			 redirect('admin/setting/term','refresh');
				 exit();

	}
	public function savecareer(){

		//echo "<pre>"; print_r($_POST); die();

		 $data=array(
			 	'id' => $this->input->post('id'),
			 	'heading' => $this->input->post('heading'),
			 	'content' => $this->input->post('content'),
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminsetting_model->updateCareer($data);
			 redirect('admin/setting/career','refresh');
				 exit();

	}
	public function saveaprivacy(){

		 $data=array(
			 	'id' => $this->input->post('id'),
			 	'heading' => $this->input->post('heading'),
			 	'content' => $this->input->post('content'),
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminsetting_model->updatePrivcay($data);
			 redirect('admin/setting/privacy','refresh');
				 exit();

	}
	public function saverefund(){

		 $data=array(
			 	'id' => $this->input->post('id'),
			 	'heading' => $this->input->post('heading'),
			 	'content' => $this->input->post('content'),
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminsetting_model->updateRefund($data);
			 redirect('admin/setting/refund','refresh');
				 exit();

	}
	public function updatecompany(){
		 $data=array(
			 	'id' => $this->input->post('id'),
			 	'heading' => $this->input->post('heading'),
			 	'content' => $this->input->post('content'),
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Adminsetting_model->updateCompany($data);
			 redirect('admin/setting','refresh');
				 exit();

	}


}
?>
