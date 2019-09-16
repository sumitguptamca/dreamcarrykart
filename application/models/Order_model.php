<?php
class Order_model extends CI_Model{
	public function adminlogin($data){
		$this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $result = $this->db->get();
        // echo $this->db->last_query();die;
        if($result->num_rows()){
            return $result->row_array();
        }
	}
}?>