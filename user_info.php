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
		include("db.php");
		if(isset($_SESSION["id"]))
		{
			session_destroy();
			session_unset();
			echo "Access Denied";
		}
		else
		{
			if(isset($_SESSION["name"]))
			{
	?>
	<body class="bod">
		<div class="maincol">
			<img src="images/img1">
			<div class="leftcol">Inno</div>
			<div class="midcol">Trainning</div>
			<div class="rightcol">
				<a href="logout1.php">REGISTER</a>
			</div>
		</div>
		<?php
			$id= $_GET['ID'];
			if ($id == "") 
			{
				header('Location: login.php');
			}
			else
			{
				$query="SELECT name, fname, email, gender, ph_no FROM project WHERE id= '$id'";
	
				$result=mysqli_query($conn, $query);
		
				$count= mysqli_num_rows($result);

				if($count == 1)
				{
					while ($row= $result->fetch_assoc())
					{	$_SESSION["name"]= $row["name"];
						$_SESSION["fname"]= $row["fname"];
						$_SESSION["email"]= $row["email"];
						$_SESSION["gender"]= $row["gender"];
						$_SESSION["phone"]= $row["ph_no"];
					}
				}
			}
			mysqli_close($conn);	
		?>
		<div align="center" class="main_bod">
			<h1><?php echo $_SESSION["fname"]; ?></h1>
			<div align="center" class="dis_info">
				<div class="info_text">Email: <?php echo $_SESSION["email"]; ?></div>
				<div class="info_text">Gender: <?php echo $_SESSION["gender"]; ?></div>
				<div class="info_text">Phone no.: <?php echo $_SESSION["phone"]; ?></div>
			</div>
		</div>
	</body>
	<?php
							
		}
		else
		{
			echo "Access Denied";
		}
	}
	?>
</html>