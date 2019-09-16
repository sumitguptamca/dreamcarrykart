<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	public function index()
	{
		//die('34454');
		$this->load->view('admin/index');
	}
	public function login(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			if (isset($_POST['submit'])) {
				$data=array(
					'email'=>$this->input->post('email'),
					'password'=>md5($this->input->post('password'))
				);
				$result=$this->Admin_model->adminlogin($data);
				//echo "<pre>"; print_r($result);exit();
				if($result){
					
		            $_SESSION['adminID']=$result['id'];
		            $_SESSION['adminname']=$result['admin_name'];
		            $_SESSION['admin_email']=$result['email'];
					$_SESSION['TYPE'] = 'success';
           		    $_SESSION['MESSAGE'] = 'Welcome ' . $_SESSION['adminname'];
           		    redirect('admin/dashboard');
				}
				else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Invalid credential.';
					$this->load->view('admin/login');
				}

			}
			else{
				$_SESSION['TYPE'] = 'error';
            	$_SESSION['MESSAGE'] = 'Invalid credential.';
				$this->load->view('admin/login');
			}

		}
		else{
			$this->load->view('admin/login');
		}
	}
	public function logout(){
			session_start();
			session_unset();
			session_destroy();
			$_SESSION = NULL;
			redirect('admin');
			exit;
	}

}
