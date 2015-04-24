<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>InnoTraining</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
		<script type="text/javascript">
		function valid_login(){
			var x= document.forms["login_form"]["uname"].value;
			var y= document.forms["login_form"]["pwd"].value;
			if (x == null || x == "" || y == null || y == "") {
				alert("Fields are blank");
				return false;
			};
		}
		</script>
	</head>
	<body class="bod">
		<div class="maincol">
			<img src="images/img1">
			<div class="leftcol">Inno</div>
			<div class="midcol">Trainning</div>
			<div class="rightcol">
				<a href="http://project.dev/">REGISTER</a>
			</div>
		</div>
		<div align="center" class="main_bod" id="errMsg">
			<h1>Login</h1>
			<?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
			<form onsubmit=" return valid_login()" name="login_form" action="loginuser.php" method="post">		
				<input type="text" name="uname" placeholder="Type in your username"><br><br>
				<input type="password" name="pwd" placeholder="Type in your password"><br><br>
				<input type="submit" value="Login" class="submit" name="login_form">
			</form>
		</div>
	</body>
</html>