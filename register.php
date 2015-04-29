<?php
	include("db.php");
	session_start();
	if(isset($_POST['register'])) {
		$name= $_POST['name'];
		$mail= $_POST['email'];
		$sex= $_POST['sex'];
		$phone= $_POST['num'];
		$pwd= $_POST['pwd'];
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Check your code please!!!")';
		echo '</script>';
	}

	$query1="SELECT name FROM project WHERE name= '$name'";
	$result=mysqli_query($conn, $query1);
	$count= mysqli_num_rows($result);

	$fname=$name;
	$first_name = $name;
	$i = 0;
	if($count == 1)
	{
		while($name == $first_name)
		{
			$i++;
			$name= $first_name . $i;
			$query2="SELECT name FROM project WHERE name= '$name'";
			$result1=mysqli_query($conn, $query2);
			$count1= mysqli_num_rows($result1);
			if($count1 == 1)
			{
				$i++;
				$name= $first_name . $i;
				$first_name = $name;
			}
		}
	}
		
		$name = mysqli_real_escape_string($conn, $name);
		$pwd = mysqli_real_escape_string($conn, $pwd);
		$pwd = md5($pwd);
		$_SESSION["name"]= $name;
		$_SESSION["email"]= $mail;
		$_SESSION["gender"]= $sex;
		$_SESSION["phone"]= $phone;
		$query= "INSERT INTO project (name, fname, email, gender, ph_no, pwd) VALUES('$name', '$fname', '$mail', '$sex', '$phone', '$pwd')";
		if (mysqli_query($conn, $query)){
			header('Location: logged_in.php');
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Sorry!!! Registration failed")';
			echo '</script>';
		}
		mysqli_close($conn);
?>