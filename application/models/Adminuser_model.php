<?php
class Adminuser_model extends CI_Model{

	public function getAlluser(){

		$query = $this->db->query("SELECT * FROM `users`");
       return $query->result_array();

	}
	public function changeadminuserstatus($id,$status){
		 $this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('users');

	}
	public function getEditAdminuser($id){
		$query = $this->db->query("SELECT * FROM `users` WHERE `id`='" . $id . "'");
			$count=$query->num_rows();
			//echo "<pre>"; print_r($query->result());exit;
			if($count>0){
				return $query->row_array();
			}
	}
	public function update_adminuser($data){
		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('users');
						return true;
	}

}
?>
