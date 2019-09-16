<?php
class Seller_model extends CI_Model{
     public function addseller($data){
         $this->db->insert('seller_login',$data);
          if ($this->db->affected_rows() ==1) {
            return true;
          }
      return false;
  }
   public function sellerLogin($data){
        $this->db->select('*');
        $this->db->from('seller_login');
        $this->db->where('seller_email',$data['seller_email']);
        $this->db->where('seller_password',$data['seller_password']);
        $result = $this->db->get();
        // echo $this->db->last_query();die;
        if($result->num_rows()){
            return $result->row_array();
        }
    }
}?>