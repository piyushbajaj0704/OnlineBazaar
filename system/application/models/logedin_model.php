<?php
class logedin_model extends CI_Model
{  
    public function index()
	{	  
		$this->load->view('you_view');
	}
	public function validate_in_db()
	{   	  
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);	   
		if(isset($_POST['Submit']))
		{ 	
			/////////////signedin//////
			if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
			$_SESSION['empid'] = $_POST['empid'];
			if($_POST['empid'] && $_POST['pass'])
			{  				    
				$query = "SELECT * FROM registrationdetails WHERE 
						(customer_id = '" . mysql_real_escape_string($_POST['empid']) . "') 
						and
						(pass = '" . mysql_real_escape_string($_POST['pass']) . "')";
						$login = mysql_query($query);
						$rs = mysql_fetch_assoc($login);
						$birth= $rs['B_day'];
						 
				if (mysql_num_rows($login) == 1) 
				{ 
					$_SESSION['empid'] = $_POST['empid'];
					$empid = $_SESSION['empid'];
					$today = mktime(0,0,0, date("m"),date("d"), date("y"));
					$present = date("Y-m-d", "$today");
					
					$pres = explode ("-", $present);		
					$DOB = explode ("-", $birth);
					
					$this->load->database();
						$query1 = "select * from signindetails where customer_id = '".$empid."' AND date = '".$present."' ";		  
						$result1 = mysql_query($query1);
						$rs = mysql_fetch_assoc($result1);
						 $emp_date = $rs['date'];	
						
					if ($emp_date != $present ) 
					{    
					 //echo "hello alredy logged in if"; exit;
						$this->load->database();
						$query1 = "select fname from registrationdetails where customer_id= '".$empid."'";		  
						$result1 = mysql_query($query1);
						$rs = mysql_fetch_assoc($result1);
						$name = $rs['fname'];	
										
						$query = "INSERT INTO signindetails (signIn,fname,customer_id,date) VALUES (NOW(),'".$name."','".$empid."','".$present."')";
				  return $empid;
						
					}
					else {
					return 1;					
				}
				}
				else
				{  
				   header('Location:http://localhost/OnlineBazaar/index.php?login=F');
				}			
			}
			else
			{
			    header('Location:http://localhost/OnlineBazaar/index.php?login=F');
			}
				/////////////signedin///////			
		}
	}	
	
	
	public function fetch_product()
	{   	  
    	if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		  $this->load->database();
					  	$product=$this->db->query("SELECT productid,productname,productdetail,image 
													FROM product ");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['productid']=$row->productid;
						$var['a'.$i]['productname']= $row->productname;
						$var['a'.$i]['productdetail']=$row->productdetail;
						$var['a'.$i]['image']=$row->image;
						$i++;
					}
				 if(isset($var)) return $var;		
		}
		
	public function fetch_product_by_market($productid)
	{   	  
    	if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		  $this->load->database();
					  	$product=$this->db->query("SELECT productid,productname,productdetail,image 
													FROM product  WHERE productid='".$productid."' ");
					foreach($product->result() as $row) {
						$var['productid']=$row->productid;
						$var['productname']= $row->productname;
						$var['productdetail']=$row->productdetail;
						$var['image']=$row->image;
					}
				 if(isset($var)) return $var;		
		}
		
		public function fetch_price_by_market($productid,$marketname)
	{   	  
		
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		  $this->load->database();
					  	$product=$this->db->query("SELECT marketid,productid,marketname,price 
													FROM market  WHERE productid='".$productid."' AND 
													 marketname='".$marketname."'  ");
					foreach($product->result() as $row) {
						$var['marketid']=$row->marketid;
						$var['productid']= $row->productid;
						$var['marketname']=$row->marketname;
						$var['price']=$row->price;
					}
				 if(isset($var)) return $var;		
		}
	
			// for National head
	public function fetch_customer_request()
	{   	  
		
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		 $this->load->database();
		$product=$this->db->query("SELECT purchase.customer_id,purchase_id,fname,lname,discount
													FROM purchase,registrationdetails
													  WHERE assign_status='0'  AND 
													  registrationdetails.customer_id = purchase.customer_id");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['customer_id']=$row->customer_id;
						$var['a'.$i]['purchase_id']= $row->purchase_id;
						$var['a'.$i]['fname']=$row->fname;
						$var['a'.$i]['lname']=$row->lname;
						$var['a'.$i]['discount']=$row->discount;
						$i++;
					}
				 if(isset($var)) return $var;		
		}
		
		public function fetch_available_sm()
	    {   	  
		
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		 $this->load->database();
		$product=$this->db->query("SELECT fname,lname,availability_of_sm.sm_id AS sm_id
													FROM availability_of_sm,registrationdetails
													  WHERE available='1' AND
													  registrationdetails.customer_id = availability_of_sm.sm_id  ");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['fname']=$row->fname;
						$var['a'.$i]['lname']=$row->lname;
						$var['a'.$i]['sm_id']=$row->sm_id;
						$i++;
					}
				 if(isset($var)) return $var;		
		}
		
		
		// for Sales manager
		public function fetch_nh_assignment()
	{   	  
		
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		 $this->load->database();
		$product=$this->db->query("SELECT c_id,purchase_id,fname,lname,assignment_of_sm.discount AS discount 
								FROM assignment_of_sm,registrationdetails,purchase
								  WHERE assignment_of_sm.approval='0'  AND 
								  assignment_of_sm.p_id = purchase.purchase_id  AND
								  registrationdetails.customer_id = purchase.customer_id");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['c_id']=$row->c_id;
						$var['a'.$i]['purchase_id']= $row->purchase_id;
						$var['a'.$i]['fname']=$row->fname;
						$var['a'.$i]['lname']=$row->lname;
						$var['a'.$i]['discount']=$row->discount;
						$i++;
					}
				 if(isset($var)) return $var;		
		}
		
		public function fetch_available_rm()
	    {   	  
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		 $this->load->database();
		$product=$this->db->query("SELECT fname,lname,availability_of_rm.rm_id AS rm_id
													FROM availability_of_rm,registrationdetails
													  WHERE available='1' AND
													  registrationdetails.customer_id = availability_of_rm.rm_id  ");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['fname']=$row->fname;
						$var['a'.$i]['lname']=$row->lname;
						$var['a'.$i]['rm_id']=$row->rm_id;
						$i++;
					}
				 if(isset($var)) return $var;		
		}
		
		public function fetchreport() {
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$con = mysql_connect('localhost','root','');
		$db1 = mysql_select_db('onlinebazaar', $con);
		 $this->load->database();
		$product=$this->db->query("SELECT r_id,a_id,c_id,prod_id,r_discount 
								FROM report ");
					$i=1;
					foreach($product->result() as $row) {
						$var['a'.$i]['r_id']=$row->r_id;
						$var['a'.$i]['a_id']= $row->a_id;
						$var['a'.$i]['c_id']=$row->c_id;
						$var['a'.$i]['prod_id']=$row->prod_id;
						$var['a'.$i]['r_discount']=$row->r_discount;
						$i++;
					}
				 if(isset($var)) return $var;	
   	}
}
?>