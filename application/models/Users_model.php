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
  public function getAllBanner(){
    $query = $this->db->query("SELECT * FROM `banner`");
        $count=$query->num_rows();
        return $query->result_array();
  }
  public function getAllAdsBanner(){
        $query = $this->db->query("SELECT * FROM `add_banner`");
        $count=$query->num_rows();
       return $query->result_array();

    }
  public function getAllCategory(){
    $query = $this->db->query("SELECT * FROM `category`");
        $count=$query->num_rows();
       return $query->result_array();
         // echo $this->db->last_query();die;
  }
  public function getAllProductItem(){
    $query = $this->db->query("SELECT * FROM `product` AS p LEFT JOIN product_image AS pi ON pi.p_id = p.p_id GROUP BY pi.p_id");
    $count=$query->num_rows();
    return $query->result_array();
  }
  public function getAllProductItembyCate($id){
    $query = $this->db->query("SELECT * FROM `product` AS p LEFT JOIN product_image AS pi ON pi.p_id = p.p_id where p.cat_id= $id GROUP BY pi.p_id");
    $count=$query->num_rows();
    return $query->result_array();
  }
  public function getItemDetailsById($id){
     $query = $this->db->query("SELECT * FROM `product` AS p LEFT JOIN product_image AS pi ON pi.p_id = p.p_id where p.p_id = $id GROUP BY pi.p_id");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();
  }
   public function getAllImagesById($id){
     $query = $this->db->query("SELECT pi.image_path FROM `product` AS p LEFT JOIN product_image AS pi ON pi.p_id = p.p_id where p.p_id = $id");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();
  }
  public function getSizeById($id){
    $query = $this->db->query("SELECT * FROM `size` WHERE id IN (SELECT size_id FROM product_size WHERE p_id=$id)");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();
  }
  public function saveCart($data){
  $this->db->insert('cart',$data);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;
  }
  public function insertAddress($dataarr){
    $this->db->insert('address',$dataarr);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;

  }
  public function getAddress(){

     $query = $this->db->query("SELECT * FROM `address` where user_id='".$_SESSION['userid']."' ");
   //echo $this->db->last_query();die;
    return $query->result_array();

  }
  public function getCartDetails(){
    $query = $this->db->query("SELECT * FROM `cart` as c LEFT JOIN product_image as pi ON pi.p_id=c.p_id where c.user_id='".$_SESSION['userid']."' GROUP BY pi.p_id");
    $count=$query->num_rows();
   //echo $this->db->last_query();die;
    return $query->result_array();
  }
  public function getCartBookingDetails($bid){
    $query = $this->db->query("SELECT * FROM `booking_product` as c LEFT JOIN product_image as pi ON pi.p_id=c.p_id where c.user_id='".$_SESSION['userid']."' and c.booking_id='".$bid."' GROUP BY pi.p_id");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();
  }
  public function getCartTotal(){
    $query = $this->db->query("SELECT SUM(p_totalprice) as totalprice FROM `cart`  where user_id='".$_SESSION['userid']."'");
    $count=$query->num_rows();
   //echo $this->db->last_query();die;
    return $query->row_array();
  }

  public function updateaddress($id,$address){

    $this->db->where('booking_id', $id);
            $this->db->set('bill_address',$address);
           return $this->db->update('booking');

  }
  public function updateorder($data){

     $this->db->where('booking_id', $data['booking_id']);
    $this->db->where('user_id', $data['user_id']);
          $this->db->set($data);
          $this->db->update('booking');
          // echo $this->db->last_query();die;
            return true;

  }

  public function getCartBookingTotal($bid){
    $query = $this->db->query("SELECT * FROM `booking`  where user_id='".$_SESSION['userid']."' and booking_id='".$bid."'");
    $count=$query->num_rows();
   //echo $this->db->last_query();die;
    return $query->row_array();
  }

  public function updateCart($data){

    $this->db->where('p_id', $data['p_id']);
    $this->db->where('user_id', $data['user_id']);
           $this->db->set($data);
          $this->db->update('cart');
          // echo $this->db->last_query();die;
            return true;

  }
  public function delteCartItem($pid,$userid){

     $this->db->where('p_id', $pid);
     $this->db->where('user_id', $userid);
       $this->db->delete('cart');
       return true;

  }
  public function insertDataBooking($data){

    $this->db->insert('booking',$data);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;

  }
  public function addWallet($data){
    $this->db->insert('wallet',$data);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;
  }
  public function createBooking($data){

    $this->db->where('p_id', $data['p_id']);
     $this->db->where('user_id', $data['user_id']);
       $this->db->delete('cart');

    $this->db->insert('booking_product',$data);
      if ($this->db->affected_rows() ==1) {
        return true;
      }
      return false;

  }
  public function getAllOrder(){

    $query = $this->db->query("SELECT * FROM `booking`  where user_id='".$_SESSION['userid']."'");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();

  }
  public function getAllOrderBooking($bid){
    // $query = $this->db->query("SELECT * FROM `booking`  where user_id='".$_SESSION['userid']."'");
    $query = $this->db->query("SELECT bp.* FROM `booking_product` as bp  where bp.user_id='".$_SESSION['userid']."' and bp.booking_id='".$bid."'");
    $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->result_array();
  }
 public function getImageForOrder($pid){
   $query = $this->db->query("SELECT * from `product_image` where p_id='".$pid."' GROUP BY p_id");
   $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->row_array();
 }
 public function getAllwalletbyID($id){

  $query = $this->db->query("SELECT SUM(paid_amount) as amount from `wallet` where user_id='".$id."' and status='Completed' ");
   $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->row_array();

 }

 public function getAllitemCount($id){

  $query = $this->db->query("SELECT count(p_id) as count from `cart` where user_id='".$id."'");
   $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->row_array();

 }

 public function getOrderStatus($status){
  $query = $this->db->query("SELECT * FROM `order_status` WHERE id='".$status."' ");
   $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->row_array();
 }
 public function getBookingIdByUid(){
  $query = $this->db->query("SELECT booking_id FROM `booking` WHERE user_id='".$_SESSION['userid']."' ");
   $count=$query->num_rows();
   // echo $this->db->last_query();die;
    return $query->row_array();
 }
}
?>
