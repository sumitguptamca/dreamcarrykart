<?php
class Order_model extends CI_Model{
	public function getAllOrder(){
		$query = $this->db->query("SELECT bok.*,os.name as statusname ,ur.name,ur.email,ur.mobile  FROM `booking` as bok LEFT JOIN order_status as os ON os.id = bok.status LEFT JOIN users as ur ON ur.user_id=bok.user_id");
        $count=$query->num_rows();
       return $query->result_array();
	}
}?>
