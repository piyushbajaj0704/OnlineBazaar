<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/mystyles.css"  type="text/css" >
<link rel="stylesheet" href="http://localhost/onlinebazaar/css/styles.css"  type="text/css" >
<style>

td {
	text-align:center;
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
<title>Online Bazaar: National Head</title>
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
                              Report to the National Head</p>
                            </div>
                 </div>
          
           <div >
           <table style="width:100%">
  
         <tr>
         <td><p class="query">Report ID </p></td> 
          <td><p class="query">Authority ID</p></td>
          <td><p class="query">Customer ID</p></td>
        <td><p class="query">Product ID</p></td> 
  	      <td><p class="query">Discount Permitted</p></td> 
       
  </tr>
      <?php $i=1; 
		if($data==NULL) exit; foreach($data as $var) {  ?>
		
  <tr> 
       <td>
		<p class="query"><?php if(isset($var['r_id']))  echo $var['r_id']; ?></p>
      </td>
        
         <td>
		<p class="query"><?php if(isset($var['a_id']))  echo $var['a_id'] ;?></p>
      </td>
      <td>
		<p class="query"><?php if(isset($var['c_id']))  echo $var['c_id'] ;?></p>
      </td>
      <td>
		<p class="query"><?php if(isset($var['prod_id']))  echo $var['prod_id'] ;?></p>
      </td>
       <td>
		<p class="query"><?php if(isset($var['r_discount']))  echo $var['r_discount'] ;?></p>
      </td>
          </tr>
         
       </div>  <?php   $i++;    }  ?> </div>
       	 </table>
   <div style="height:200px">
   </div>

<?php include("include/footer.php");?>	       
</body>
</html>