<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/mystyles.css"  type="text/css" >
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/styles.css"  type="text/css" >
<style>
.askquestion {
	font-size:24px;
	font-family:Tahoma, Geneva, sans-serif;
	background-color:#999;
	float:right;
	margin-top:80px;
	margin-right:20px;
	padding:10px;	
	color:#000;
}
.settings {
	font-size:24px;
	font-family:Tahoma, Geneva, sans-serif;
	background-color:#999;
	float:right;
	margin-top:80px;
	margin-right:55px;
	padding:10px;	
	color:#000;
}
td {
	text-align:center;
}
.forumcat1,.forumcat2 ,.forumcat3 {
	font-size:26px;
	font-family:Tahoma, Geneva, sans-serif;
	float:left;
	width:33%;
}
.forumcat1{
	text-shadow: 1px 1px 5px #F00;
}
.forumcat2 {
		
}
.forumcat3 {
	
}
.discussheader {
	font-family:Tahoma, Geneva, sans-serif;
	font-size:32px;
	margin-bottom:40px;
	padding-bottom:10px;
	border-bottom-width:2px;
	border-bottom-color:#000;
	border-bottom-style:ridge;
	background-color:#6C9;
}
.mainsection {
	margin-top:30px;	 
}
.topic {
	/* background-color:#3F9; */
	height:40px;
}
.questions {
	margin-top:50px;
	 	background: #C36;
    margin: auto;
	 height:auto;
    width: 85%;
	/*margin-bottom:50px; */
	background: #ffffff; 

}
.block {
	width:882px;
	height:70px;
	margin: auto;
	padding-left:95px;
	padding-right:95px;
	background: #ffffff; 

}
.query {
	font-size:20px;
	font-family:Tahoma, Geneva, sans-serif;	
	/*float:left;*/
}
a.query {
	font-size:20px;
	font-family:Tahoma, Geneva, sans-serif;	
	display: block;
	/*float:left;*/
}

ul {
  text-align: left;
  display: inline;
  margin: 0;
  padding: 15px 4px 17px 0;
  list-style: none;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
ul li {
  font: bold 12px/18px sans-serif;
  display: inline-block;
  margin-right: -4px;
  position: relative;
  padding: 15px 20px;
  background:#999;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}
ul li:hover {
  background: #F00;
  color: #fff;
}
ul li ul {
  padding: 0;
  position: absolute;
  top: 48px;
  right: 3px;
  width: 200px;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  display: none;
  opacity: 0;
  visibility: hidden;
  -webkit-transiton: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  -ms-transition: opacity 0.2s;
  -o-transition: opacity 0.2s;
  -transition: opacity 0.2s;
}
ul li ul li { 
  background: #555; 
  display: block; 
  color: #fff;
  text-shadow: 0 -1px 0 #000;
}
ul li ul li:hover { background: #06F; color: #000; }
ul li:hover ul {
  display: block;
  opacity: 1;
  visibility: visible;
}

.x {
	font-size:18px;
	font-weight:300;
	font-family:Tahoma, Geneva, sans-serif;
	background-color:#999;
	float:right;
	margin-top:80px;
	margin-right:55px;
	color:#000;
}
.x1 {
	font-size:18px;
	font-weight:300;
	font-family:Tahoma, Geneva, sans-serif;
	background-color:#F00;
	float:right;
	margin-top:80px;
	margin-right:55px;
	color:#000;
}
.notify{
	float:right;
	margin-top:-10px;
	font-size:14px;
	margin-left:5px;
}

ul {
  text-align: left;
  display: inline;
  margin: 0;
  padding: 15px 4px 17px 0;
  list-style: none;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
ul li {
  font: bold 12px/18px sans-serif;
  display: inline-block;
  margin-right: -4px;
  position: relative;
  padding: 15px 20px;
  background:#999;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -ms-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}
</style>
<title>Online Bazaar: National Head</title>
</head>
	<body onload="init();">		
			<?php include("include/header.php");?>	
	<div class="container">
		    	    <div class="img1" style="position:fixed; float:left">
						<h1 style="color:#F00; margin-top:5px;font-size:30px;  "> Online Bazaar </h1>
					</div>
   				<div style="width: 100%; height:140px;"> 
                
                  <ul>  <a  href="../../index.php/fetchtag/fetchreport" class="settings"> Report</a>
				  <?php if(!isset($data))  { ?>
                          <li class="x"> <?php  } 
                          else { ?>
						   <li class="x1">  <?php  } ?>
                           <span class="notify"> 
						   <?php  if(isset($data)) { $i=0;  foreach($data as $row)   {  $i++; } echo $i;}?>
                            </span>
                            Notifications  
                            <ul>  <?php     if(isset($data))   foreach($data as $row)   {    ?>
                                  <p
                                       &var2=<?php echo $seen=0;   ?>
                                       &var3=<?php // echo  $row['employee_id'];   ?>" style="color:#000;">
                                  <li>
                                <?php echo  $row['discount']; ?>%
								  Discount  requested by
                                <?php echo  $row['fname']. " ". $row['lname'];  ?>
                                 was approved.   
                                   </li>  </p>     <?php }
								   else { ?>
									<li>No Notification
                                   </li>   <?php } ?>
                            </ul>
                          
                          </li>
	   			</ul>       
                  					</div>
                <div class="innermain" style="width:880px;">
                             <div class="mainsection"> 
                              <p class="discussheader">
                              Allocate Customers to Different Sales Manager</p>
                            </div>
                 </div>
          
           <div >
           <table style="width:100%">
  
         <tr>
         <td><p class="query">PurchaseID </p></td> 
          <td><p class="query">Customer's Name</p></td>
        <td><p class="query">Sales Manager </p></td> 
  	      <td><p class="query">Allocate</p></td> 
       
  </tr>
      <?php $i=1; 
		if($data1==NULL) exit; foreach($data1 as $var) {  ?>
		
  <tr> 
       <td>
		<p class="query"><?php if(isset($var['purchase_id']))  echo $var['purchase_id']; ?></p>
      </td>
        
         <td>
		<p class="query"><?php if(isset($var['fname']))  echo $var['fname'] . $var['lname']; ?></p>
      </td>

          <td style="width:200px">
               <?php 
			     	         $this->load->library('Form_validation');
							echo validation_errors();
							echo form_open('http://localhost/onlinebazaar/index.php/fetchtag/assign_sm'); ?>
             <select name="sales_manager">
		    <?php		foreach($data2 as $var2) {  
			 if(isset($var2['fname'])) { ?>
             <p class="query">
			 <?php    echo "<option value=" .  $var2['sm_id'] . "<option>";   ?>    
             <?php    echo $var2['fname'] . " ". $var2['lname'];  }  }  ?>  </p> 
           </select>
             </td>
             
            <td> 
            <input type="hidden" name="customer_id" value="<?php echo $var['customer_id'];  ?>">
             <input type="hidden" name="discount" value="<?php echo $var['discount'];  ?>">
            <input type="hidden" name="purchase_id" value="<?php echo $var['purchase_id']; ?>">
            <input type="submit" value="Assign" />
            <?php    echo form_close();  ?>
            </td>

          </tr>
         
       </div>  <?php   $i++;    }  ?> </div>
       	 </table>
   <div style="height:200px">
   </div>

<?php include("include/footer.php");?>	       
</body>
</html>