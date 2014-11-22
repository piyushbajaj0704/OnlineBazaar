<?php
class Discount extends CI_Model
{  
	public function save_new_quotation($discount1,$productid)
	{   
		 if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
	      $empid = $_SESSION["empid"];
		  $this->load->database();
		  date_default_timezone_set("Asia/Calcutta");
		  $todaydate= date('d-m-Y'); 
		  $todaytime= date('H:i:s'); 
	      $data=array(
		  'customer_id' =>  $empid,
		  'product_id' => $productid,
		  'assign_status' => 0,
		   'discount' => $discount1,
		   'purchase_date' => $todaydate,
		   'purchase_time' =>$todaytime  );
		   $this->db->where('customer_id',$empid);
	    	 $this->db->insert('purchase',$data) ;
			
			 
			 $product=$this->db->query("SELECT customer_id,product_id, discount 
													FROM purchase  WHERE product_id='".$productid."' 
													AND customer_id='".$empid."'
													AND purchase_date= '".$todaydate."'
													 AND purchase_time= '".$todaytime."'");
			foreach($product->result() as $row) {
						$var['customer_id']=$row->customer_id;
						$var['product_id']= $row->product_id;
					    $var['discount']=$row->discount;
					}
				 if(isset($var)) return $var;	
	}
	
	public function assign_to_sm($sm_id,$purchase_id,$nh_id,$c_id,$discount)
	{   
		 if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		} 
		  $this->load->database();
		  if($discount > 25) $app=0; else $app=1;
	      $data=array(
		  'sm_id' =>  $sm_id,
		  'nh_id' => $nh_id,
		  'c_id' => $c_id,
		  'p_id' => $purchase_id,
		   'discount' => $discount,
		   'approval' =>  $app  );
	      $this->db->insert('assignment_of_sm',$data) ;
		  
		   $data=array(
		  'to_id' =>  $sm_id,
		  'from_id' => $nh_id,
		  'discount' => $discount,
		  'seen_status' => 1 );
	      $this->db->insert('notification',$data) ;
		   $data=array(
		  'to_id' =>  $c_id,
		  'from_id' => $nh_id,
		  'discount' => $discount,
		  'seen_status' => 1 );
	      $this->db->insert('notification',$data) ;
		   
		  $data = array(
               'assign_status' => 1
            );
			$this->db->where('purchase_id', $purchase_id);
			$this->db->update('purchase', $data); 
			
			 $data = array(
               'available' => 0
            );
			$this->db->where('sm_id', $sm_id);
			$this->db->update('availability_of_sm', $data); 
		  
		  if($discount <= 25) {
				$data=array(
			  'a_id' =>  $sm_id,
			  'c_id' => $c_id,
			  'prod_id' => $purchase_id,
			  'r_discount' => $discount );
			  $this->db->insert('report',$data) ;
		  }
    }
	
	public function  assign_to_rm($rm_id,$purchase_id,$sm_id,$c_id,$discount)
	{   
		 if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		} 
		  $this->load->database();
		  if($discount > 50) $app=0; else $app=1;
	      $data=array(
		  'rm_id' =>  $rm_id,
		  'sm_id' => $sm_id,
		  'c_id' => $c_id,
		  'p_id' => $purchase_id,
		   'discount' => $discount,
		   'approval' =>  $app  );
	      $this->db->insert('assignment_of_rm',$data) ;
		  
		  $data=array(
		  'to_id' =>  $c_id,
		  'from_id' => $sm_id,
		  'discount' => $discount,
		  'seen_status' => 1 );
	      $this->db->insert('notification',$data) ;
		  $data=array(
		  'to_id' =>  $rm_id,
		  'from_id' => $sm_id,
		  'discount' => $discount,
		  'seen_status' => 1 );
	      $this->db->insert('notification',$data) ;
		  
		   $data = array(
               'assign_status' => 1
            );
			$this->db->where('purchase_id', $purchase_id);
			$this->db->update('purchase', $data); 
			
			 $data = array(
               'available' => 0
            );
			$this->db->where('rm_id', $rm_id);
			$this->db->update('availability_of_rm', $data); 
		  
		  if($discount <= 50) {
				$data=array(
			  'a_id' =>  $rm_id,
			  'c_id' => $c_id,
			  'prod_id' => $purchase_id,
			  'r_discount' => $discount );
			  $this->db->insert('report',$data) ;
		  }
    }
}
?>