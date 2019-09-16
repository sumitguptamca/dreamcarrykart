<?php
class Users_model extends CI_Model{
	 public function addUsers($data){
     $this->db->insert('users',$data);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;
  }
  public function userlogin($data){
		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $result = $this->db->get();
        // echo $this->db->last_query();die;
        if($result->num_rows()){
            return $result->row_array();
        }
	}
}?>