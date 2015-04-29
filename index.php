<!DOCTYPE HTML>
<html>
	<head>
		<title>InnoTraining</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
		<script type="text/javascript">
			function registeruser()
			{
				var x= document.forms["register"]["name"].value;
				var y= document.forms["register"]["email"].value;
				var z= document.forms["register"]["pwd"].value;
				var pattern= "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
				if (x == null || x == "" || y == null || y == "" || z == null || z == "") {
					alert("Please fill the necessary details");
					return false;
				};
				if (fieldLength != 10) {
					alert("Please check your entered phone number");
					return false;
				};
			}
		</script>
	</head>
	<?php
		session_start(); 
		if(isset($_SESSION["id"]))
		{
			session_destroy();
			session_unset();
			header('location: index.php');
		}
		else
		{
	?>
	<body class="bod">
		<div class="maincol">
			<img src="images/img1">
			<div class="leftcol">Inno</div>
			<div class="midcol">Trainning</div>
			<div class="rightcol">
				<a href="http://project.dev/login.php">LOGIN</a>
			</div>
		</div>
		<div align="center" class="main_bod">
			<h1>Register Here</h1>
			<form name="register" onsubmit="return registeruser()" method="post" action="register.php">
				<input type="text" name="name" placeholder="Enter your name"><br><br>
				<input type="email" name="email" placeholder="Enter your email" required><br><br>
				Gender: <input type="radio" name="sex" value="male">Male
				<input type="radio" name="sex" value="female">Female<br><br>
				<input type="number" name="num" id="no" placeholder="Enter your phone.no."><br><br>
				<input type="password" name="pwd" placeholder="Create a password"><br><br>
				<input type="submit" name="register" value="Complete Sign-Up" class="submit">
			</form>
		</div>
	</body>
	<?php } ?>
</html>