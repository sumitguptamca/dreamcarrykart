<?php
class Banner_model extends CI_Model{

	public function add_banner($data){

		$this->db->insert('banner',$data);
						return true;

	}
	public function update_banner($data){
		$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('banner');
						return true;
	}
	public function delete_banner($id){
		 $this -> db -> where('id', $id);
   		 $this -> db -> delete('banner');
   		 return true;
	}
	public function delete_ads_banner($id){
		$this -> db -> where('id', $id);
   		 $this -> db -> delete('add_banner');
   		 return true;
	}
	public function getAllBanner(){
		$query = $this->db->query("SELECT * FROM `banner`");
        $count=$query->num_rows();
       return $query->result_array();
	}
	public function changestatus($id,$status){
          $this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('banner');
    }
    public function changeAdvstatus($id,$status){
          $this->db->where('id', $id);
            $this->db->set('status',$status);
           return $this->db->update('add_banner');
    }
    
    public function adv_banner($data){
    	$this->db->insert('add_banner',$data);
						return true;

    }
    public function getAllAdvBanner(){
    		$query = $this->db->query("SELECT * FROM `add_banner`");
        $count=$query->num_rows();
       return $query->result_array();

    }
    public function getAllEditAdvBanner($id){

    	$query = $this->db->query("SELECT * FROM `add_banner` WHERE `id`='" . $id . "'");
			$count=$query->num_rows();
			//echo "<pre>"; print_r($query->result());exit;
			if($count>0){
				return $query->row_array();
			}

    }
    public function adv_update_banner($data){

    	$this->db->where('id', $data['id']);
		    	 $this->db->set($data);
		    	$this->db->update('add_banner');
						return true;

    }
    public function getEditBanner($id){
    	$query = $this->db->query("SELECT * FROM `banner` WHERE `id`='" . $id . "'");
			$count=$query->num_rows();
			//echo "<pre>"; print_r($query->result());exit;
			if($count>0){
				return $query->row_array();
			}
    }
}
?>