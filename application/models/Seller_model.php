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

    ////// Product category List /////

    public function getAllCategory(){
       $query = $this->db->query("SELECT * FROM `category`");
        $count=$query->num_rows();
        return $query->result_array();
  }
  public function savedItem($data){
      $this->db->insert('product',$data);
      if ($this->db->affected_rows() ==1) {
            return true;
        }
      return false;
    }
   public function getProductItem($id,$sid){
      $query = $this->db->query("SELECT * FROM `product` WHERE `cat_id`='" . $id . "'  AND `seller_id`='". $sid ."'");
      // echo $this->db->last_query();die;
      $count=$query->num_rows();
      if($count>0){
        return $query->result_array();
      }

    }

}?>
