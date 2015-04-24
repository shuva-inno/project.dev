<?php 
	session_start();
	include("db.php");
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
				<a href="http://project.dev/">REGISTER</a>
			</div>
		</div>
		<?php
			$id= $_GET['ID'];
			if ($id == "") 
			{
				header('Location: logged_in.php');
			}
			else
			{
				$query="SELECT name, email, gender, ph_no FROM project WHERE id= '$id'";
	
				$result=mysqli_query($conn, $query);
		
				$count= mysqli_num_rows($result);

				if($count == 1)
				{
					while ($row= $result->fetch_assoc())
					{
						$name= $row["name"];
						$email= $row["email"];
						$gender= $row["gender"];
						$phone= $row["ph_no"];	
					}
				}
			}
			mysqli_close($conn);
		?>
		<div align="center" class="main_bod">
			<h1><?php echo $name ?></h1>
			<div align="center" class="dis_info">
				<div class="info_text">Email: <?php echo $email; ?></div>
				<div class="info_text">Gender: <?php echo $gender; ?></div>
				<div class="info_text">Phone no.: <?php echo $phone; ?></div>
			</div>
		</div>
	</body>
</html>
<?php 
	session_unset();
	session_destroy();
?>