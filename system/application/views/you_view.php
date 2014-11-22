<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/mystyles.css"  type="text/css" >
<link rel="stylesheet" href="css/styles.css"  type="text/css" >
<script type="text/javascript" src="js/validate.js"></script>
<title> Online Bazaar : Login</title>
<style>
label{width:100px;float:left; margin-top:4px;}
		.main{width:658px; height:auto; margin:auto;}

		</style>      
</head>
	<body onload="init();">
		<div id="template">
			<?php include("include/header.php");?>	
				<div class="container">
					<div style="width: 100%; height: 217px;">
						<div class="img1" style="position:fixed;">
						<h1 style="color:#F00; margin-top:5px;font-size:30px;  "> Online Bazaar </h1>
						</div>	
					<!--	<div style="float:right; width:146px; margin-top: 60px;">
							<canvas id="canvas">The canvas is not supported by your browser</canvas>
						</div> -->
					</div>
					<div class="innermain">		
						<form id="jform" action="index.php/Logedin/validate_in_db" method="post" >
							<h1> Log In Details:</h1>				
							<fieldset>
								<div class="input_box">
									<label><span style="color:red">*</span>Login Id</label>
									<input type="text" name="empid" size="45" id="fullname" tabindex='1'/></br>
								</div>
								<div class="input_box">
									<label><span style="color:red">*</span>PassCode</label>
									<input type="password" name="pass" size="45" id="company" tabindex='2'/></br>
								</div>
							</fieldset>		
							<input type="submit" name="Submit" value="Sign In" id="submit" tabindex='12'/>
							<!--<p>forgot password <a href="" >click here</a>-->
						</form>
					</div>
				</div>
			<?php include("include/footer.php");?>	
			</div>
	</body>
</html>
