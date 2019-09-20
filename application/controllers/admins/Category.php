<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$data['category']=$this->Category_model->getAllCategory();
		
		//echo "<pre>";print_r($data['category']);die;
		$this->load->view('admin/category',$data);
	}
	public function changestatus(){

		
		 $id =  $this->input->get('id');
		 $status = $this->input->get('status');
		$reg=$this->Category_model->changestatus($id,$status);
				
			redirect('admin/category','refresh');
		
	}
	public function editcategory(){

		$data['row']=$this->Category_model->editCategory($_GET['id']);
		
		//echo "<pre>";print_r($data['category']);die;
		$this->load->view('admin/edit_category',$data);

	}
	public function updatecategory(){
		//echo "<pre>";print_r($_POST);die;
		if(isset($_POST['submit'])){
			 $data=array(
			 	'id'=>$this->input->post('id'),
			 	'cat_name' => $this->input->post('cat_name'),
			 	
			 );
			 //echo "<pre>"; print_r($data);exit;
			 $this->Category_model->update_category($data);
			 redirect('admin/category','refresh');
				 exit();
		}

	}
	public function additem(){
		$data['size']=$this->Category_model->getAllSzie();

		//echo "<pre>";print_r($data['size']);die;
			$this->load->view('admin/additem',$data);

	}
	public function saveitem(){
		//echo "<pre>"; print_r($_POST);print_r($_FILES);exit();

		if(isset($_POST['submit'])){
				$p_id = time();
			 $data=array(
			 	'p_id' =>$p_id,
			 	'cat_id' =>$this->input->post('cat_id'),
			 	'p_name' => $this->input->post('p_name'),
			 	'p_description' => $this->input->post('p_description'),
			 	'p_availability' => $this->input->post('p_availability'),
			 	'p_condition' => $this->input->post('p_condition'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'p_material' => $this->input->post('p_material'),
			 	'p_size' => json_encode($this->input->post('p_size')),
			 	'p_price' => $this->input->post('p_price'),
			 	'p_offerprice' => $this->input->post('p_offerprice'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'status'=> 1,
			 	'is_active'=>1,
			 	'is_delete' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			// echo "<pre>"; print_r($data);exit;
			$this->Category_model->save_item($data);
			$psize = $_POST['p_size'];
			if($psize){
				foreach ($psize as $ps) {
					$data2 = array(
						'p_id' =>$p_id,
					 	'size_id' => $ps,
					);
					//echo "<pre>"; print_r($data2);
					$this->Category_model->save_size($data2);
				}

			}
			//exit;

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

			
			 redirect('admin/category','refresh');
				 exit();
				}
	}

	public function showitem(){
		$data['product']=$this->Category_model->getAllItemByCategory($_GET['cid']);
		$this->load->view('admin/show_item',$data);
	}
	public function changeitemstatus(){
		//echo "<pre>";print_r($_GET);die;
		$id =  $this->input->get('id');
		 $status = $this->input->get('status');
		$reg=$this->Category_model->changeitemstatus($id,$status);
		redirect('admin/category/showitem?cid='.$_GET['cat_id'].'','refresh');
				 exit();

	}
	public function edit_item(){

			$data['item']=$this->Category_model->editItem($_GET['itemid'],$_GET['cid']);
			$data['size']=$this->Category_model->getAllSzie();

		//echo "<pre>";print_r($data['item']);die;
		$this->load->view('admin/edit_item',$data);

	}
	public function updateitem(){
		//echo "<pre>"; print_r($_POST); exit();

		if(isset($_POST['submit'])){

			 $data=array(
			 	'id'=>$this->input->post('item_id'),
			 	'p_id' =>$this->input->post('p_id'),
			 	'seller_id' =>$this->input->post('seller_id'),
			 	'cat_id' =>$this->input->post('cat_id'),
			 	'p_name' => $this->input->post('p_name'),
			 	'p_description' => $this->input->post('p_description'),
			 	'p_availability' => $this->input->post('p_availability'),
			 	'p_condition' => $this->input->post('p_condition'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'p_material' => $this->input->post('p_material'),
			 	'p_size' => json_encode($this->input->post('p_size')),
			 	'p_price' => $this->input->post('p_price'),
			 	'p_offerprice' => $this->input->post('p_offerprice'),
			 	'p_brand' => $this->input->post('p_brand'),
			 	'status'=> 1,
			 	'is_active'=>1,
			 	'is_delete' => 0,
			 	'create_date' => date('Y-m-d'),

			 );
			 //echo "<pre>"; print_r($data);exit;
			$this->Category_model->update_product_item($data);

			$psize = $_POST['p_size'];
			if($psize){
				$pid = $this->input->post('p_id');
				$this->Category_model->deletesize($pid);
				foreach ($psize as $ps) {
					$data2 = array(
						'p_id' =>$pid,
					 	'size_id' => $ps,
					);
					//echo "<pre>"; print_r($data2);
					$this->Category_model->save_size($data2);
				}

			}
			//ex

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
				                        	'p_id'=> $this->input->post('p_id'),
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


			 redirect('admin/category/showitem?cid='.$_POST['cat_id'].'','refresh');
				 exit();
				}


	}
	public function deleteitem(){

	}
	public function deleteitemimage(){
		//echo "<pre>"; print_r($_GET);exit();
		$data['item']=$this->Category_model->itemimagedelte($_GET['image_id']);
		redirect('admin/category/edititem?itemid='.$_GET['itemid'].'&cid='.$_GET['cid'].'','refresh');
				 exit();

	}

	
}

?>
