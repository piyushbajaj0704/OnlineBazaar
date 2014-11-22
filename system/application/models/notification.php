<?php
 class Notification extends CI_model  {
	 public function fetch()  {
		  $this->load->database();
		  $empid = $_SESSION['empid'];
		  $query=$this->db->query(" SELECT to_id,from_id,fname,lname,discount
		  FROM notification,registrationdetails
		  WHERE to_id='".$empid."' AND seen_status=1  AND  
		  registrationdetails.customer_id = notification.to_id");
		   $i=1;
		  foreach($query->result() as $row)  {
			 $var['a'.$i]['to_id']= $row->to_id; 
			 $var['a'.$i]['discount']= $row->discount;
			 $var['a'.$i]['from_id']= $row->from_id;
			 $var['a'.$i]['fname']= $row->fname;
			 $var['a'.$i]['lname']= $row->lname;
			   $i++; 
		  }
		 if(isset($var)) return $var;
	 }
}
?>
