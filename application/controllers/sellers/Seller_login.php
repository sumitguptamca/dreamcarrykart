<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_login extends CI_Controller {
	public function index()
	{
		$this->load->view('seller/seller_login');
	}
	public function signup()
	{
		$this->form_validation->set_rules('sname','Name','required');
		$this->form_validation->set_rules('semail','Email Id','required|is_unique[users.email]');
		$this->form_validation->set_rules('spassword','Password','required');
		$this->form_validation->set_rules('smob','Mobile No.','required|exact_length[10]');
		$this->form_validation->set_rules('gst','GST','required|exact_length[15]');
		$this->form_validation->set_rules('cname','Company Name','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			if (isset($_POST['submit'])) {
				//echo "<pre>";print_r($_POST);die;
				$sid = 'seller' . time();
				$dataarr=array(
					'seller_id'=>$sid,
					'seller_name'=>$this->input->post('sname'),
					'seller_email'=>$this->input->post('semail'),
					'seller_password'=>md5($this->input->post('spassword')),
					'seller_mob'=>$this->input->post('smob'),
					'gst_no'=>$this->input->post('gst'),
					'company_name'=>$this->input->post('cname'),
					'status'=>0,
					'is_active'=>1,
					'is_deleted'=>0,
					'created_date'=>date('Y-m-d h:i:s')
				);
				//echo "<pre>";print_r($dataarr);die;
				$add=$this->Seller_model->addseller($dataarr);
				// echo "<pre>";print_r($add);die;
				if($add){
					$_SESSION['TYPE'] = 'success';
           		    $_SESSION['MESSAGE'] = 'Seller saved successfully';
				}else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Error while saving seller.';
				}
				redirect('seller','refresh');

			}
			else{
				$this->load->view('seller/seller_signup');
			}
		}
		else{
				$this->load->view('seller/seller_signup');
		}
		
	}
	public function login(){
		//echo "<pre>"; print_r($_POST);exit();
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			if (isset($_POST['submit'])) {
				$data=array(
					'seller_email'=>$this->input->post('email'),
					'seller_password'=>md5($this->input->post('password'))
				);
				// echo "<pre>"; print_r($data);exit();
				$result=$this->Seller_model->sellerLogin($data);
				//echo "<pre>"; print_r($result);exit();
				if($result){
					if($result['status'] != 0){
		            $_SESSION['sellerid']=$result['seller_id'];
		            $_SESSION['sellername']=$result['seller_name'];
		            $_SESSION['selleremail']=$result['seller_email'];
		            $_SESSION['seller_mob']=$result['seller_mob'];
		            $_SESSION['gst_no']=$result['gst_no'];
		            $_SESSION['company_name']=$result['company_name'];
					$_SESSION['TYPE'] = 'success';
           		    $_SESSION['MESSAGE'] = 'Welcome ' . $_SESSION['sellername'];
           		    redirect('seller/dashboard');
	           		}else{
	           			$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Admin Has Been Dissbale Seller Please Contact Admin.';
					$this->load->view('seller/seller_login');
	           		}
				}
				else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Invalid credential.';
					$this->load->view('seller/seller_login');
				}

			}
			else{
				$_SESSION['TYPE'] = 'error';
            	$_SESSION['MESSAGE'] = 'Invalid credential.';
				$this->load->view('seller/seller_login');
			}

		}
		else{
			$_SESSION['TYPE'] = 'error';
            $_SESSION['MESSAGE'] = 'Invalid credential.';
			$this->load->view('seller/seller_login');
		}
	}
	public function logout(){
			session_start();
			session_unset();
			session_destroy();
			$_SESSION = NULL;
			redirect('seller');
			exit;
	}

}
