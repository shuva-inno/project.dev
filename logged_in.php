<!DOCTYPE HTML>
<html>
	<head>
		<title>InnoTraining</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	</head>
	<?php
		session_start(); 
		if(isset($_SESSION["id"]))
		{
			session_destroy();
			session_unset();
			echo "Access Denied";
		}
		else
		{
			include("db.php");
			$name= $_SESSION["name"];
			$query="SELECT id FROM project WHERE name= '$name'";
	
			$result=mysqli_query($conn, $query);
			
			$count= mysqli_num_rows($result);

		if($count == 1)
		{
			while ($row= $result->fetch_assoc()) 
			{
				$_SESSION["id"]= $row["id"];
				
			}
		}	
	?>
	<body class="bod">
		<div class="maincol">
			<img src="images/img1">
			<div class="leftcol">Inno</div>
			<div class="midcol">Trainning</div>
			<div class="rightcol">
				<a href="logout.php">LOGOUT</a>
			</div>
		</div>
		<div align="center" class="main_bod">
			Welcome<span class="disp_name"><?php echo $_SESSION["fname"]; ?></span>
			<div align="center" class="dis_info">
				<div class="info_text">Email: <?php echo $_SESSION["email"]; ?></div>
				<div class="info_text">Gender: <?php echo $_SESSION["gender"]; ?></div>
				<div class="info_text">Phone no.: <?php echo $_SESSION["phone"]; ?></div>
			</div>
		</div>
	</body>
	<?php } ?>
</html>
