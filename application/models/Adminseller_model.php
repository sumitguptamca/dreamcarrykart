<?php
class Adminseller_model extends CI_Model{

	public function getAllseller(){

		$query = $this->db->query("SELECT * FROM `seller_login`");
       return $query->result_array();

	}
	public function changeadminsellerstatus($id,$status){
		$this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('seller_login');

	}
	public function getEditAdminseller($id){
		$query = $this->db->query("SELECT * FROM `seller_login` WHERE `id`='" . $id . "'");
			$count=$query->num_rows();
			//echo "<pre>"; print_r($query->result());exit;
			if($count>0){
				return $query->row_array();
			}

	}
	public function update_adminseller($data){
			$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('seller_login');
						return true;
	}

}
?>
