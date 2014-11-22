<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/mystyles.css"  type="text/css" >
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/styles.css"  type="text/css" >
<script type="text/javascript" src="js/validate.js"></script>
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

</style>
<title>Online Bazaar: Products</title>
</head>
	<body onload="init();">		
			<?php include("include/header.php");?>	
	<div class="container">
		    	    <div class="img1" style="position:fixed; float:left">
						<h1 style="color:#F00; margin-top:5px;font-size:30px;  "> Online Bazaar </h1>
					</div>
   				<div style="width: 100%; height:140px;"> 
                  					</div>
                <div class="innermain" style="width:880px;"> 
                <p style="font-size:24px;"> Your Request for Discount have
                 <?php // if(isset($data22['discount'])) {?>
                 
				 <?php  //echo $data22['discount']; } ?>
               been send to the particular authority. </p>
                <p style="font-size:24px;"> Please look out for more products for more discounts. </p>
                             <div class="mainsection"> 
                              <p class="discussheader">
                              Products</p>
                            </div>
                 </div>
          
           <div >
           <table style="width:100%">
  
         <tr>
         <td><p class="query">Image </p></td> 
        <td><p class="query">Item </p></td> 
  	      <td><p class="query">Description</p></td> 
           <td><p class="query">Markets</p></td> 
       
  </tr>
      <?php $i=1; 
		if($data1==NULL) exit; foreach($data1 as $var) {  ?>
		
  <tr> 
       <td>
		<?php if(isset($var['topic']))  ?>
      			  <p class="query">
		<?php 
				   $x=$var['productid'];
 		    	  $_SESSION['productid']=$x; 
		 		  $_SESSION['productid']; 
				  ?>
				  <class="query">
				   <img style="width:120px; height:120px" 
				  src="../../image/<?=$var['image']?>" />
        </td>
           <td>
		<?php if(isset($var['productname'])) ?><p class="query"><?php  echo $var['productname']; ?>        </p>  </td>
  	        <td style="width:200px">
		  <?php if(isset($var['productdetail'])) ?> <p class="query" style=""><?php echo $var['productdetail']; ?>         </p>  </td>
            	        <td style="width:200px">
                        <?php  
							$this->load->library('Form_validation');
							echo validation_errors();
							echo form_open('http://localhost/onlinebazaar/index.php/fetchtag/fetch');  ?> 
                         <select name="market">
                          <option value="karnataka">Karnataka</option>
                          <option value="delhi">Delhi</option>
                          <option value="gujarat">Gujarat</option>
                        </select>
                        <input type="hidden" name="prodid" value="<?php echo $var['productid']; ?>">
                        <input type="submit" value="Go">
                         <?php    echo form_close();  ?>	
		            </td>

  	        <td style="width:200px">
		   </td>

          </tr>
         
       </div>  <?php   $i++;    }  ?> </div>	 </table>
   

<?php include("include/footer.php");?>	       
</body>
</html>