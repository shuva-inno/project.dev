<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>InnoTraining</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	</head>
	<body class="bod">
		<div class="maincol">
			<img src="images/img1">
			<div class="leftcol">Inno</div>
			<div class="midcol">Trainning</div>
			<div class="rightcol">
				<a href="http://project.dev/">LOGOUT</a>
			</div>
		</div>
		<div align="center" class="main_bod">
			Welcome<span class="disp_name"><?php echo $_SESSION["name"]; ?></span>
			<div align="center" class="dis_info">
				<div class="info_text">Email: <?php echo $_SESSION["email"]; ?></div>
				<div class="info_text">Gender: <?php echo $_SESSION["gender"]; ?></div>
				<div class="info_text">Phone no.: <?php echo $_SESSION["phone"]; ?></div>
			</div>
		</div>
	</body>
</html>
<?php
	session_unset();
	session_destroy();
?>