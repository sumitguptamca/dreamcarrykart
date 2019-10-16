<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		// echo "<pre>"; print_r($_GET);exit();
		$banner=$this->Users_model->getAllBanner();
		$count = count($banner);
	    $indicators = '';
	    $slides = '';
	    $counter = 0;
	    foreach($banner AS $row){
	    	 $image = base_url($row['image_path']);
	    	 // echo "<pre>"; print_r($image);
	          if ($counter == 0) {
	            $indicators .= '<li data-target="#slider-carousel" data-slide-to="' . $counter . '"
	            class="active"></li>';
	            $slides .= '<div class="item active">
	            <div class="col-sm-6">
						<h1><span>E</span>-SHOPPER</h1>
						<h2>Free E-Commerce Template</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<button type="button" class="btn btn-default get">Get it now</button>
				</div>
	            <div class="col-sm-6">
	         	 	<img src="'. $image.'" class="girl img-responsive" alt="" />
	         	</div>

	            </div>';
	          } else {
	            $indicators .= '<li data-target="#slider-carousel"
	            data-slide-to="' . $counter . '"></li>';
	            $slides .= '<div class="item">
	            <div class="col-sm-6">
						<h1><span>E</span>-SHOPPER</h1>
						<h2>Free E-Commerce Template</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<button type="button" class="btn btn-default get">Get it now</button>
				</div>
	            <div class="col-sm-6">
	         	 	<img src="'. $image.'" class="girl img-responsive" alt="" />
	         	</div>
	            </div>';
	          }
          $counter=$counter+1;
	    }
	     $data['indicators'] = $indicators;
     	 $data['slides'] = $slides;
     	 $data['adsbanner']=$this->Users_model->getAllAdsBanner();
     	 $data['category']=$this->Users_model->getAllCategory();
     	 if($_GET['id']){
     	 	$data['product']=$this->Users_model->getAllProductItembyCate($_GET['id']);
     	 }else{
     	 	$data['product']=$this->Users_model->getAllProductItem();
     	 }

     	// echo "<pre>"; print_r($data);exit;
		$this->load->view('home_page',$data);
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
				            $_SESSION['user_mobile']=$result['mobile'];
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

	public function fetch_product_details(){
		$data['category']=$this->Users_model->getAllCategory();
		$data['adsbanner']=$this->Users_model->getAllAdsBanner();
		$data['itemdetails']=$this->Users_model->getItemDetailsById($_GET['id']);
		$data['images']=$this->Users_model->getAllImagesById($_GET['id']);
		$data['size']=$this->Users_model->getSizeById($_GET['id']);
		// echo "<pre>";print_r($data['size']);die;
		$this->load->view('product_details',$data);
	}
	public function save_cart(){
		if($_SESSION['userid']){
			$dataarr=array(
					'p_id'=>$this->input->post('p_id'),
					'p_name'=>$this->input->post('p_name'),
					'p_price'=>$this->input->post('p_price'),
					'p_totalprice'=>$this->input->post('p_price') * $this->input->post('quantity'),
					'size'=>$this->input->post('size'),
					'quantity'=>$this->input->post('quantity'),
					'user_id' =>$_SESSION['userid'],
					'created_date'=>date('Y-m-d h:i:s')
				);
			 // echo "<pre>";print_r($dataarr);die;
			$result=$this->Users_model->saveCart($dataarr);
			if($result){
					$_SESSION['TYPE'] = 'success';
           		    $_SESSION['MESSAGE'] = 'Cart saved successfully';
			}else{
					$_SESSION['TYPE'] = 'error';
            		$_SESSION['MESSAGE'] = 'Error while saving Cart.';
			}
			redirect('cart','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}
	public function fetch_cart(){
		$data['cartdetails']=$this->Users_model->getCartDetails();
		$data['totalprice']=$this->Users_model->getCartTotal();
		 // echo "<pre>";print_r($data);die;
		$this->load->view('cart',$data);
	}
	public function update_cart(){
		 // echo "<pre>"; print_r($_POST);exit();

		$counter = count($this->input->post('p_id'));
		if($_SESSION['userid']){
			if($_POST['update'] == 'Update'){
		for ($i=0; $i < $counter; $i++) {
			 $dataarr = array(
                	'p_id'=>$_POST['p_id'][$i],
					'p_name'=>$_POST['p_name'][$i],
					'p_price'=>$_POST['p_price'][$i],
					'p_totalprice'=>$_POST['p_price'][$i] * $_POST['quantity'][$i],
					'quantity'=>$_POST['quantity'][$i],
					'user_id' =>$_SESSION['userid'],
					'created_date'=>date('Y-m-d h:i:s'),

                );
               // echo "<pre>";  print_r($dataarr);
				 $result = $this->Users_model->updateCart($dataarr);
			}
			redirect('cart','refresh');
				 exit();
		}else{
			// echo "<pre>"; print_r($_POST);exit();
			$bookingID = 'order'.time();
			$data = array(
						'booking_id'=>$bookingID,
						'user_id' =>$_SESSION['userid'],
						'subtotal'=>$this->input->post('subtotal'),
						'gst'=>$this->input->post('cgst'),
						'total_price'=>$this->input->post('totalprice'),
						'status'=>1,
						'is_active'=>1,
						'created_date'=>date('Y-m-d h:i:s'),
				);
			$this->Users_model->insertDataBooking($data);
				for ($i=0; $i < $counter; $i++) {
			 $dataarr = array(
			 		'booking_id'=>$bookingID,
			 		'p_id'=>$_POST['p_id'][$i],
					'p_name'=>$_POST['p_name'][$i],
					'p_price'=>$_POST['p_price'][$i],
					'p_totalprice'=>$_POST['p_price'][$i] * $_POST['quantity'][$i],
					'gst'=>$_POST['gst'][$i],
					'size'=>$_POST['size'][$i],
					'quantity'=>$_POST['quantity'][$i],
					'user_id' =>$_SESSION['userid'],
					'created_date'=>date('Y-m-d h:i:s'),

                );
               // echo "<pre>";  print_r($dataarr);
				 $result = $this->Users_model->createBooking($dataarr);
			}
			redirect('booking?bid='.$bookingID.'','refresh');
				 exit();

		}
	}

	}
	public function booking(){
		// echo "<pre>"; print_r($_GET);exit();
		$data['cartdetails']=$this->Users_model->getCartBookingDetails($_GET['bid']);
			$data['bookingd']=$this->Users_model->getCartBookingTotal($_GET['bid']);
			$data['address']=$this->Users_model->getAddress();
		 // echo "<pre>";print_r($data);die;
		$this->load->view('booking',$data);

	}
	public function delete_cart_item(){
		// echo "<pre>"; print_r($_GET);exit();
		$result = $this->Users_model->delteCartItem($_GET['p_id'],$_SESSION['userid']);
		redirect('cart','refresh');
				 exit();

	}
	public function setAddress(){
		 // echo "<pre>"; print_r($_GET);exit();

		$id =  $this->input->get('id');
		$address = $this->input->get('address');
		$reg=$this->Users_model->updateaddress($id,$address);

			redirect('booking?bid='.$_GET['id'].'','refresh');
	}
	public function booking_payment(){

		// echo "<pre>"; print_r($_POST);print_r($_SESSION);exit();

		$pay = $this->instamojo->pay_request(
						$amount = $_POST['price'] ,
						$purpose = "DCC-BookingNo-".$_POST['bid'] ,
						$buyer_name = $_SESSION['user_name'],
						$email = $_SESSION['user_email'] ,
						$phone = $_SESSION['user_mobile'] ,
		     			$send_email = 'TRUE' ,
		     			$send_sms = 'TRUE' ,
		     			$repeated = 'FALSE'
		     		);

		$redirect_url = $pay['longurl'];
		// echo "<pre>"; print_r($redirect_url);exit();
		redirect($redirect_url,'refresh') ;

	}
	public function billadress(){
		// echo "<pre>"; print_r($_POST);die();
		$dataarr = array(
			 		'user_id'=>$_SESSION['userid'],
					'cname'=>$this->input->post('cname'),
					'fname'=>$this->input->post('fname'),
					'mobile'=>$this->input->post('mobile'),
					'address1'=>$this->input->post('address1'),
					'address2'=>$this->input->post('address2'),
					'city'=>$this->input->post('city'),
					'state' =>$this->input->post('state'),
					'country' =>$this->input->post('country'),
					'zipcode' =>$this->input->post('zipcode'),
					'create_date'=>date('Y-m-d h:i:s'),

                );
               // echo "<pre>";  print_r($dataarr);
				$this->Users_model->insertAddress($dataarr);
				 redirect('booking','refresh');
				 exit();
	}
	public function paymentconfirm(){

		$paymentId  = $_GET['payment_request_id']  ; // $paymentId generated by Instamojo
		$status     = $this->instamojo->status($paymentId);
		// $result = $this->instamojo->all_payment_request();
//echo "<pre>"; print_r($status);die();
		if($status['purpose'] != 'AddWallet'){
			echo "string";
			$bid = explode("-", $status['purpose']);
		// echo $bid[2]; exit();
		$data = array(
			'booking_id'=>$bid[2],
			'user_id'=>$_SESSION['userid'],
			'transaction_id'=>$status['id'],
			'payment_id'=>$_GET['payment_id'],
			'paid_amount'=>$status['amount'],
			'payment_status'=>$_GET['payment_status'],
			'pay_status'=>$status['status'],
			'email_status'=>$status['email_status'],
			'longurl'=>$status['longurl'],
		);
		$this->Users_model->updateorder($data);
		// echo "<pre>"; print_r($status); exit();
		 redirect('order','refresh');
				 exit();

		}else{
			// echo "<pre>"; print_r($status);exit();
			$data = array(
					'user_id'=>$_SESSION['userid'],
					'user_email'=>$status['email'],
					'transaction_id'=>$status['id'],
					'payment_id'=>$_GET['payment_id'],
					'paid_amount'=>$status['amount'],
					'status'=>$status['status'],
					'email_status'=>$status['email_status'],
					'longurl'=>$status['longurl'],
					'create_date'=>date('Y-m-d h:i:s'),

					);
			$this->Users_model->addWallet($data);
			redirect('home','refresh');
				 exit();

		}



	}
	public function my_order(){

		$data['orderall']=$this->Users_model->getAllOrder();
	 // echo "<pre>"; print_r($data); exit();
		$this->load->view('order',$data);

	}
	public function addwallet(){
		// echo "<pre>"; print_r($_POST);print_r($_SESSION); exit();
		$pay = $this->instamojo->pay_request(
						$amount = $_POST['cname'] ,
						$purpose = "AddWallet",
						$buyer_name = $_SESSION['user_name'],
						$email = $_SESSION['user_email'] ,
						$phone = $_SESSION['user_mobile'] ,
		     			$send_email = 'TRUE' ,
		     			$send_sms = 'TRUE' ,
		     			$repeated = 'FALSE'
		     		);

		// echo "<pre>"; print_r($pay); exit();
		$redirect_url = $pay['longurl'];
		redirect($redirect_url,'refresh') ;

	}
	public function confirmwallet(){

	}
}
