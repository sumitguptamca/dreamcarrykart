<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads_banner extends CI_Controller {
	public function index()
	{
		$data['banner']=$this->Banner_model->getAllAdvBanner();
		$this->load->view('admin/ads_banner',$data);
	}
	public function add(){
		$this->load->view('admin/ads_add');
	}
	public function changestatus(){
		 $id =  $this->input->get('id');
		 $status = $this->input->get('status');
		$reg=$this->Banner_model->changeAdvstatus($id,$status);
		 redirect('admin/ads_banner','refresh'); exit();
	}
	public function deleteadsbanner(){
		 $this->Banner_model->delete_ads_banner($_GET['id']);
		  redirect('admin/ads_banner','refresh');
				 exit();
	}
	public function editadsbanner(){

		$data['banner']=$this->Banner_model->getAllEditAdvBanner($_GET['id']);
		$this->load->view('admin/ads_edit',$data);

	}
	
}

?>