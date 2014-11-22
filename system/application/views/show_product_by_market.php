<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/mystyles.css"  type="text/css" >
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/styles.css"  type="text/css" >
<script type="text/javascript" src="js/analogCanvasClock.js"></script>
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

.query {
	font-size:20px;
	font-family:Tahoma, Geneva, sans-serif;	
	/*float:left;*/
}
td {
	text-align:center;
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
                             <div class="mainsection"> 
                              <p class="discussheader">
                              Products </p>
                            </div>
                 </div>
          
           <div >
           <table style="width:100%">
  
         <tr>
         <td><p class="query">Image </p></td> 
        <td><p class="query">Item </p></td> 
  	      <td><p class="query">Description</p></td> 
           <td><p class="query">Markets</p></td> 
            <td><p class="query">Price</p></td> 
             <td><p class="query">Desired Discount </p></td> 
       
  </tr>
      <?php  
		if($data==NULL) exit;   ?>
		
  <tr> 
      
		<?php if(isset($data['topic']))   ?>
		<?php 
				   $x=$data['productid'];
 		    	  $_SESSION['productid']=$x; 
				  ?> 
				 <td style="width:300px;">  <class="query">
				   <img style="width:300px; height:300px" 
				  src="../../image/<?=$data['image']?>" />
        </td>
           <td>
		<?php if(isset($data['productname'])) ?><p class="query"><?php  echo $data['productname']; ?>        </p>  </td>
  	        <td style="width:200px">
		  <?php if(isset($data['productdetail'])) ?> <p class="query" style=""><?php echo $data['productdetail']; ?> </p>  
          </td>
          
              <td>
		<?php if(isset($data1['marketname'])) ?><p class="query"><?php echo $data1['marketname']; ?> </p> 
         </td>
         
            <td>
		<?php if(isset($data1['price'])) ?><p class="query"><?php echo $data1['price']; ?> </p> 
         </td>
 			
            <td>
             <?php  
						$this->load->library('Form_validation');
						echo validation_errors();
						echo form_open('http://localhost/onlinebazaar/index.php/fetchtag/fetch_discount');  ?> 
                         <input type="text" maxlength="5" size="4" name="discount1" placeholder="Discount" >
                          <input type="hidden" name="prodid" value="<?php echo $data['productid']; ?>"> 
      				      <input type="submit" value="Send">
                         <?php    echo form_close();  ?>	
         </td>
          </tr>
         
       </div>  </div>	 </table>
 <div style="height:100px">
 </div>
<?php include("include/footer.php");?>	
</body>
</html>