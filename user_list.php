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
			<div align="center" class="main_bod">
				<h1>User List</h1>
				<div align="left" class="user_list">
					<form method="post">
						<input type="text" name="uname" placeholder="Search by name">
						<input type="submit" value="Search" class="submit_list">
					</form>
					<?php 
						$name= $_POST["uname"];
						$query= "SELECT name FROM project WHERE name= '$name'";
						$result= mysqli_query($conn, $query);
						$count= mysqli_num_rows($result);


						if($name == "")
						{
							$query= "SELECT id, name, email FROM project";
							$result= mysqli_query($conn, $query);
							$count1= mysqli_num_rows($result);
						}	
						else
						{
							if ($count == 0) {
							$_SESSION['errMsg1'] = "No such record exists";
							header('Location: user_list.php');
							}
							else
							{
								$query= "SELECT id, name, email FROM project WHERE name= '$name'";
								$result= mysqli_query($conn, $query);
								$count1= mysqli_num_rows($result);
								unset($_SESSION['errMsg1']);
							}
						}	
					?>
					<div class="user_list_box">
						<div class="list_left">Name
							<span class="list_center">Email</span>
						</div>
						<span class="error_disp1"><?php if(!empty($_SESSION['errMsg1'])) { echo $_SESSION['errMsg1']; } ?></span>
						<?php 
							if ($count1 >= 1)
							{
								while ($row= $result->fetch_assoc())
								{
									$id= $row["id"];
									$_SESSION["name"]= $row["name"];
									$_SESSION["email"]= $row["email"];
						?>
						<div class="list_right">
							<span class="disp_uname"><?php echo $_SESSION["name"]; ?></span>
							<span class="disp_email"><?php echo $_SESSION["email"]; ?></span>
							<span class="view">
							<?php 
								echo "<a href=user_info.php?ID=". $id . ">VIEW</a>"
							?>
							</span>
						</div>

						<?php 	
							} 
							}
							mysqli_close($conn);
						?>
				</div>
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