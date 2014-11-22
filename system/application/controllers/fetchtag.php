<?php  
	
class Fetchtag extends CI_controller {
	
	public function fetch()  {
		session_start();
		$marketname = $_POST['market'];
		$productid = $_POST['prodid'];
		$this->load->model('logedin_model');
		$var['data']=$this->logedin_model->fetch_product_by_market($productid);
		$var['data1']=$this->logedin_model->fetch_price_by_market($productid,$marketname);
	    $this->load->view('show_product_by_market',$var);
	}
	public function fetch_discount()  {
		session_start();
		$discount1 = $_POST['discount1'];
		$productid = $_POST['prodid'];
		if(($discount1>100) || ($discount1<0 )) exit;
		$this->load->model('discount');
		$var['data22']=$this->discount->save_new_quotation($discount1,$productid);
		$this->load->model('logedin_model');
		$var=$this->logedin_model->validate_in_db();
		$var['data1']=$this->logedin_model->fetch_product();
		$this->load->view('show_approved_discount',$var);
	}
	public function assign_sm()  {
		session_start();
		$sm_id = $_POST['sales_manager'];
		$purchase_id = $_POST['purchase_id'];
		$c_id = $_POST['customer_id'];
		$discount = $_POST['discount'];
		$nh_id = $_SESSION['empid'];
		if(($discount>100) || ($discount<0 )) exit;
		$this->load->model('discount');
		$var['data22']=$this->discount->assign_to_sm($sm_id,$purchase_id,$nh_id,$c_id,$discount);
		$this->load->model('logedin_model');
			$var1['data1']=$this->logedin_model->fetch_customer_request();
			$var1['data2']=$this->logedin_model->fetch_available_sm();
	        $this->load->view('nh_view',$var1);
	}
	public function assign_rm()  {
		session_start();
		$rm_id = $_POST['regional_manager'];
		$purchase_id = $_POST['purchase_id'];
		$c_id = $_POST['customer_id'];
		$discount = $_POST['discount'];
		$sm_id = $_SESSION['empid'];
		if(($discount>100) || ($discount<0 )) exit;
		$this->load->model('discount');
		$var['data22']=$this->discount->assign_to_rm($rm_id,$purchase_id,$sm_id,$c_id,$discount);
		$this->load->model('logedin_model');
			$var1['data1']=$this->logedin_model->fetch_nh_assignment();
			$var1['data2']=$this->logedin_model->fetch_available_rm();
	        $this->load->view('sm_view',$var1);
	}
	public function fetchreport()  {
		session_start();
		$this->load->model('logedin_model');
		$var['data']=$this->logedin_model->fetchreport();
	    $this->load->view('report',$var);
	}
}
?>