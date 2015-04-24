<?php
	include("db.php");
	session_start();
	if(isset($_POST['login_form'])) {
		$name= $_POST['uname'];
		$pwd= $_POST['pwd'];
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Check your code please!!!")';
		echo '</script>';
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pwd = mysqli_real_escape_string($conn, $pwd);
	$pwd = md5($pwd);

	$query="SELECT user_type, id, email, gender, ph_no FROM project WHERE name= '$name' and pwd= '$pwd'";
	
	$result=mysqli_query($conn, $query);
	
	$count= mysqli_num_rows($result);

		if($count == 1){
				while ($row= $result->fetch_assoc())
				{
					$user_type= $row["user_type"];
					$id= $row["id"];
					$_SESSION["email"]= $row["email"];
					$_SESSION["gender"]= $row["gender"];
					$_SESSION["phone"]= $row["ph_no"];	
				}

				$_SESSION["name"]= $name;
				$_SESSION["pwd"]= $pwd;

			if($user_type == 'admin')
			{
				header("Location: user_list.php?ID=". $id);
			}
			else
			{
				header("Location: logged_in.php?ID=". $id);
			}
		}
	else{
		$_SESSION['errMsg'] = "Invalid username or password";
		header('Location: login.php');
	}
	mysqli_close($conn);
?>