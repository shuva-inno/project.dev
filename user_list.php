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
		<div align="center" class="main_bod">
			<h1>User List</h1>
			<div align="left" class="user_list">
				<form method="post">
					<input type="text" name="uname" placeholder="Search by name">
					<input type="submit" value="Search" class="submit_list">
				</form>
				<?php 
					$name= $_POST["uname"];
					if($name == "")
					{
						$query= "SELECT id, name, email FROM project";
						$result= mysqli_query($conn, $query);
						$count1= mysqli_num_rows($result);
					}	
					else
					{
						$query= "SELECT id, name, email FROM project WHERE name= '$name'";
						$result= mysqli_query($conn, $query);
						$count1= mysqli_num_rows($result);
					}	
				?>
				<div class="user_list_box">
					<div class="list_left">Name
						<span class="list_center">Email</span>
					</div>
							<?php 
								if ($count1 >= 1)
									{
										while ($row= $result->fetch_assoc())
										{
											$id= $row["id"];
											$uname= $row["name"];
											$email= $row["email"];	
							?>
						<div class="list_right">
							<span class="disp_uname"><?php echo $uname; ?></span>
							<span class="disp_email"><?php echo $email; ?></span>
						</div>
						<div class="view">
							<?php 
								echo "<a href=user_info.php?ID=". $id . ">VIEW</a>"
							?>
						</div>
						<?php 	
							} 
							}
							else
							{
								header('location: user_list.php');
							} 
							mysqli_close($conn);
						?>
				</div>
			</div>
		</div>
	</body>
</html>