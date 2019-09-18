<?php
class Category_model extends CI_Model{

	public function getAllCategory(){
		$query = $this->db->query("SELECT * FROM `category`");
        $count=$query->num_rows();
       return $query->result_array();
         // echo $this->db->last_query();die;
        
	}
    public function changestatus($id,$status){
          $this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('category');
    }
    public function editCategory($id){
      $query = $this->db->query("SELECT * FROM `category` WHERE `id`='" . $id . "'");
      $count=$query->num_rows();
      //echo "<pre>"; print_r($query->result());exit;
      if($count>0){
        return $query->row_array();
      }
    }
    public function getAllItemByCategory($id){

       $query = $this->db->query("SELECT * FROM `product` WHERE `cat_id`='" . $id . "'");
      $count=$query->num_rows();
      //echo "<pre>"; print_r($query->result());exit;
      if($count>0){
        return $query->result_array();
      }

    }
    public function update_category($data){

      $this->db->where('id', $data['id']);
           $this->db->set($data);
          $this->db->update('category');
            return true;

    }
    public function save_item($data){
      $this->db->insert('product',$data);
            return true;
    }
    public function uploadImage($data){
     // echo "<pre>"; print_r($data);//exit();
      $this->db->insert('product_image',$data);
            return true;
    }
    public function changeitemstatus($id,$status){

       $this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('product');

    }
    public function editItem($id){

       $query = $this->db->query("SELECT * FROM `product` WHERE `id`='" . $id . "'");
      $count=$query->num_rows();
      //echo "<pre>"; print_r($query->result());exit;
      if($count>0){
        return $query->row_array();
      }


    }
    public function update_product_item($data){
       $this->db->where('p_id', $data['p_id']);
             $this->db->set($data);
           return $this->db->update('product');

    }
    public function itemimagedelte($id){
      $this -> db -> where('id', $id);
       $this -> db -> delete('product_image');
    }
}

?>
