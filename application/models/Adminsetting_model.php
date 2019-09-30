<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsetting_model extends CI_Model{

	public function companyinfo(){

		$query = $this->db->query("SELECT * FROM `company_info`");
       return $query->row_array();

	}
	public function terminfo(){
		$query = $this->db->query("SELECT * FROM `term_condition`");
       return $query->row_array();

	}
	public function privacy(){
		$query = $this->db->query("SELECT * FROM `privacy`");
       return $query->row_array();

	}
	public function refund(){
		$query = $this->db->query("SELECT * FROM `refund`");
       return $query->row_array();

	}
	public function career(){
		$query = $this->db->query("SELECT * FROM `career`");
       return $query->row_array();

	}
	public function updateCareer($data){
		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('career');
						return true;
	}
	public function updateTerm($data){
		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('term_condition');
						return true;

	}
	public function updateRefund($data){
		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('refund');
						return true;

	}
	public function updateCompany($data){

		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('company_info');
						return true;

	}
	public function updatePrivcay($data){

		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('privacy');
						return true;

	}



}

?>
