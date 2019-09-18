<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('seller/index');
	}
	public function showProductCategory()
	{
		$data['category']=$this->Seller_model->getAllCategory();
		$this->load->view('seller/product_list',$data);
	}
	public function addProductItem(){
		$this->load->view('seller/add_productitem');

	}
	public function saveProductItem(){
		// echo "<pre>"; print_r($_POST);print_r($_FILES);//exit();
		if(isset($_POST['submit'])){
			 $p_id = time();
			 $data=array(
			 	'p_id' =>$p_id,
			 	'seller_id' =>  $_SESSION['sellerid'],
			 	'cat_id' =>$this->input->post('cat_id'),
			 	'p_name' => $this->input->post('p_name'),
			 	'p_description' => $this->input->post('p_description'),
			 	'p_availability' => $this->input->post('p_availability'),
			 	'p_condition' => $this->input->post('p_condition'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'p_price' => $this->input->post('p_price'),
			 	'p_offerprice' => $this->input->post('p_offerprice'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'status'=> 1,
			 	'is_active'=>1,
			 	'is_delete' => 0,
			 	'create_date' => date('Y-m-d'),
			 );
			// echo "<pre>"; print_r($data);exit;
			$this->Seller_model->savedItem($data);
			if (isset($_FILES['file']['name'])){
				$total = count($_FILES['file']['name']);
			 	for ($i = 0; $i < $total; $i++) {
				 	$file_name = $_FILES['file']['name'][$i];
			        $file_size = $_FILES['file']['size'][$i];
			        $tmp_file =  $_FILES['file']['tmp_name'][$i];
			        $valid_file_formats = array("jpg","jpeg", "JPEG");
			        $fileext = strtolower(pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION));

			        if ($file_name) {
			        	if (in_array($fileext, $valid_file_formats)) {
			        		 if ($file_size < (10024 * 10024)) {
			        		 	$new_image_name = uniqid() . "." . $fileext;
			        		 		//echo "<pre>"; print_r($new_image_name);
                   				 $imgpath = $_SERVER['DOCUMENT_ROOT']  .  '/assets/product_image/';
                   				 move_uploaded_file($tmp_file,$imgpath.$new_image_name);
                   				 $image =  '/assets/product_image/'.$new_image_name;
				                        $data = array(
				                        	'p_id'=> $p_id,
				                        	'image_path'=> $image,
				                        	'create_date' => date('Y-m-d'),
				                        );
				                      //echo "<pre>";  print_r($data);
										$reg=$this->Category_model->uploadImage($data);
                   				 	// echo $imgpath.$new_image_name; die;
			        		 	}
			        		}
			         	}
			       	}

			    }
				redirect('seller/product','refresh');
				exit();
			}
	}
	public function showProductItem(){
		$data['product']=$this->Seller_model->getProductItem($_GET['id'],$_GET['sid']);
		$this->load->view('seller/show_productitem',$data);
	}
}
