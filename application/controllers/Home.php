<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('home_page');
	}
	public function login(){
		$this->form_validation->set_rules('uemail','Email','required');
		$this->form_validation->set_rules('upassword','Password','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			if (isset($_POST['submit'])) {
				$data=array(
					'email'=>$this->input->post('uemail'),
					'password'=>md5($this->input->post('upassword'))
				);
				$result=$this->Users_model->userlogin($data);
				//echo "<pre>"; print_r($result);exit();
				if($result){
					if($result['status'] != 0){
						 	$_SESSION['userid']=$result['user_id'];
				            $_SESSION['user_name']=$result['name'];
				            $_SESSION['user_email']=$result['email'];
							$_SESSION['TYPE'] = 'success';
		           		    $_SESSION['MESSAGE'] = 'Welcome ' . $_SESSION['user_name'];
		           		    redirect('home');
					}else{
						$_SESSION['TYPE'] = 'error';
	            		$_SESSION['MESSAGE'] = 'Admin Has Been Dissbale User Please Contact Admin.';
						$this->load->view('login');

					}
					

				}
				else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Invalid credential.';
					$this->load->view('login');
				}

			}
			else{
				$_SESSION['TYPE'] = 'error';
            	$_SESSION['MESSAGE'] = 'Invalid credential.';
				$this->load->view('login');
			}

		}
		else{
			$this->load->view('login');
		}
	}
	public function signup(){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email Id','required|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('mobile','Mobile','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			if (isset($_POST['submit'])) {
				// echo "<pre>";print_r($_POST);die;
				$uid = 'user' . time();
				$dataarr=array(
					'user_id'=>$uid,
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>md5($this->input->post('password')),
					'mobile'=>$this->input->post('mobile'),
					'status'=>1,
					'is_active'=>1,
					'created_date'=>date('Y-m-d h:i:s')
				);
				//echo "<pre>";print_r($dataarr);die;
				$add=$this->Users_model->addUsers($dataarr);
				// echo "<pre>";print_r($add);die;
				if($add){
					$_SESSION['TYPE'] = 'success';
           		    $_SESSION['MESSAGE'] = 'users saved successfully';
				}else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Error while saving users.';
				}
				redirect('login','refresh');

			}
			else{
				$this->load->view('login');
			}
		}
		else{
				$this->load->view('login');
		}
	}
	public function logout(){
			session_start();
			session_unset();
			session_destroy();
			$_SESSION = NULL;
			redirect('home');
			exit;
	}
}
