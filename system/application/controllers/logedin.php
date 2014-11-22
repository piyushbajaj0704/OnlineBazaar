<?php 
class Logedin extends CI_Controller
{ 
  public function index()
	{
	   if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}
		$this->load->helper('date_helper');		        
		$this->load->view('you_view.php');// loading form view
	}
	public function validate_in_db()
	{   
	    //echo "insert_to_db";
	    //$this->load->database('mydata');
		if (session_status() == PHP_SESSION_NONE) {
  		  session_start();
		}	
		$this->load->model('logedin_model');
		$var=$this->logedin_model->validate_in_db();
		//if($var !=1 ) exit;
		if(($var >= 100) && ($var < 200))  {
			$var1['data1']=$this->logedin_model->fetch_customer_request();
			$var1['data2']=$this->logedin_model->fetch_available_sm();
			$this->load->model('notification');
			$var1['data']=$this->notification->fetch();
	        $this->load->view('nh_view',$var1);
		}
		else if(($var >= 200) && ($var < 300))  {
			$var1['data1']=$this->logedin_model->fetch_nh_assignment();
			$var1['data2']=$this->logedin_model->fetch_available_rm();
			 $this->load->model('notification');
			$var1['data']=$this->notification->fetch();
	        $this->load->view('sm_view',$var1);
		}
		else {
		$var1['data1']=$this->logedin_model->fetch_product();
		 $this->load->model('notification');
		$var1['data']=$this->notification->fetch();
	    $this->load->view('home_view',$var1);
		}
	}

}	 
?>
