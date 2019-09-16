<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	public function index()
	{
		$data['banner']=$this->Banner_model->getAllBanner();
		$this->load->view('admin/banner',$data);
	}
	public function add(){
		
		$this->load->view('admin/add_banner');
	}
	public function saveadd(){
		//echo "<pre>"; print_r($_POST);print_r($_FILES);exit();
		if(isset($_POST['submit'])){

		if (isset($_FILES['file']['name'])){
				$type = $this->input->post('type');
				 	$file_name = $_FILES['file']['name'];
			        $file_size = $_FILES['file']['size'];
			        $tmp_file =  $_FILES['file']['tmp_name'];
			        $valid_file_formats = array("jpg","jpeg", "JPEG");
			        $fileext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
			        if ($file_name) {
			        	if (in_array($fileext, $valid_file_formats)) {
			        		 if ($file_size < (10024 * 10024)) {
			        		 	$new_image_name = time() . "." . $fileext;
                   				 $imgpath = $type == 'cover' ? $_SERVER['DOCUMENT_ROOT']  . '/assets/banner_image/' :$_SERVER['DOCUMENT_ROOT']  .  '/assets/banner_image/';
                   				 move_uploaded_file($tmp_file,$imgpath.$new_image_name);
                   				 // echo $imgpath.$new_image_name; die;
                   			
								                 
			        		 }
			        	}
			        }
			       }

			 $data=array(
			 	'banner_name' => $this->input->post('banner_name'),
			 	'main_heading' => $this->input->post('main_heading'),
			 	'sub_heading' => $this->input->post('sub_heading'),
			 	'status' => 1,
			 	'image_path' => '/assets/banner_image/'.$new_image_name,
			 	'is_deleted' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Banner_model->add_banner($data);
			 redirect('admin/banner','refresh');
				 exit();
				}
	}
	public function changestatus(){
		//echo "<pre>"; print_r($_GET);exit;
		 $id =  $this->input->get('id');
		 $status = $this->input->get('status');
		$reg=$this->Banner_model->changestatus($id,$status);
				
			redirect('admin/banner','refresh');
	}
	public function saveadvertise(){
		//echo "<pre>"; print_r($_POST);print_r($_FILES);exit();
		if(isset($_POST['submit'])){

		if (isset($_FILES['file']['name'])){
				$type = $this->input->post('type');
				 	$file_name = $_FILES['file']['name'];
			        $file_size = $_FILES['file']['size'];
			        $tmp_file =  $_FILES['file']['tmp_name'];
			        $valid_file_formats = array("jpg","jpeg", "JPEG");
			        $fileext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
			        if ($file_name) {
			        	if (in_array($fileext, $valid_file_formats)) {
			        		 if ($file_size < (10024 * 10024)) {
			        		 	$new_image_name = time() . "." . $fileext;
                   				 $imgpath = $type == 'cover' ? $_SERVER['DOCUMENT_ROOT']  . '/assets/ad_image/' :$_SERVER['DOCUMENT_ROOT']  .  '/assets/ad_image/';
                   				 move_uploaded_file($tmp_file,$imgpath.$new_image_name);
                   				 // echo $imgpath.$new_image_name; die;
                   			
								                 
			        		 }
			        	}
			        }
			       }

			 $data=array(
			 	'ad_name' => $this->input->post('banner_name'),
			 	'start_date' => $this->input->post('startdate'),
			 	'end_date' => $this->input->post('enddate'),
			 	'status' => 1,
			 	'image_path' => '/assets/ad_image/'.$new_image_name,
			 	'is_deleted' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Banner_model->adv_banner($data);
			 redirect('admin/ads_banner','refresh');
				 exit();
				}
	}
	public function editbanner(){
		
		$data['banner']=$this->Banner_model->getEditBanner($_GET['id']);
		//echo "<pre>"; print_r($data); exit();
		$this->load->view('admin/edit_banner',$data);
	}
	public function updatebanner(){
		//echo "<pre>"; print_r($_POST);print_r($_FILES); exit();
		if(isset($_POST['submit'])){

			if (isset($_FILES['file']['name'])){
				$type = $this->input->post('type');
				 	$file_name = $_FILES['file']['name'];
			        $file_size = $_FILES['file']['size'];
			        $tmp_file =  $_FILES['file']['tmp_name'];
			        $valid_file_formats = array("jpg","jpeg", "JPEG");
			        $fileext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
			        if ($file_name) {
			        	if (in_array($fileext, $valid_file_formats)) {
			        		 if ($file_size < (10024 * 10024)) {
			        		 	$new_image_name = time() . "." . $fileext;
                   				 $imgpath = $type == 'cover' ? $_SERVER['DOCUMENT_ROOT']  . '/assets/ad_image/' :$_SERVER['DOCUMENT_ROOT']  .  '/assets/ad_image/';
                   				 move_uploaded_file($tmp_file,$imgpath.$new_image_name);
                   				 // echo $imgpath.$new_image_name; die;
                   			
								                 
			        		 }
			        	}
			        }
			        $img = '/assets/ad_image/'.$new_image_name;
			       }
			      else{
			       		$img = $this->input->post('imagefile');
			       }
	       	$data=array(
	       		'id' => $this->input->post('id'),
			 	'banner_name' => $this->input->post('banner_name'),
			 	'main_heading' => $this->input->post('main_heading'),
			 	'sub_heading' => $this->input->post('sub_heading'),
			 	'status' => 1,
			 	'image_path' => $img,
			 	'is_deleted' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Banner_model->update_banner($data);
			 redirect('admin/banner','refresh');
				 exit();

		}
	}
	public function deletebanner(){
		 $this->Banner_model->delete_banner($_GET['id']);
		  redirect('admin/banner','refresh');
				 exit();
	}
	public function updateadvertise(){
		//echo "<pre>"; print_r($_POST);print_r($_FILES);exit();
		if(isset($_POST['submit'])){

			if (isset($_FILES['file']['name']) && $_FILES['file']['size']>0){
				
				$type = $this->input->post('type');
				 	$file_name = $_FILES['file']['name'];
			        $file_size = $_FILES['file']['size'];
			        $tmp_file =  $_FILES['file']['tmp_name'];
			        $valid_file_formats = array("jpg","jpeg", "JPEG");
			        $fileext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
			        if ($file_name) {
			        	if (in_array($fileext, $valid_file_formats)) {
			        		 if ($file_size < (10024 * 10024)) {
			        		 	$new_image_name = time() . "." . $fileext;
                   				 $imgpath = $type == 'cover' ? $_SERVER['DOCUMENT_ROOT']  . '/assets/ad_image/' :$_SERVER['DOCUMENT_ROOT']  .  '/assets/ad_image/';
                   				 move_uploaded_file($tmp_file,$imgpath.$new_image_name);
                   				 // echo $imgpath.$new_image_name; die;
                   			
								                 
			        		 }
			        	}
			        }
			        $img = '/assets/ad_image/'.$new_image_name;
			       }
			      else{
			      	
			       		$img = $this->input->post('imagefile');
			       }
			     
	       	$data=array(
	       		'id'=>$this->input->post('id'),
			 	'ad_name' => $this->input->post('banner_name'),
			 	'start_date' => $this->input->post('startdate'),
			 	'end_date' => $this->input->post('enddate'),
			 	'status' => 1,
			 	'image_path' =>$img,
			 	'is_deleted' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Banner_model->adv_update_banner($data);
			 redirect('admin/ads_banner','refresh');
				 exit();

		}
	}
}

?>