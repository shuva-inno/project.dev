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
	$name = mysqli_real_escape_string($conn, $name);
	$pwd = mysqli_real_escape_string($conn, $pwd);
	$pwd = md5($pwd);
	$_SESSION["name"]= $name;
	$_SESSION["email"]= $mail;
	$_SESSION["gender"]= $sex;
	$_SESSION["phone"]= $phone;
	$query= "INSERT INTO project (name, email, gender, ph_no, pwd) VALUES('$name', '$mail', '$sex', '$phone', '$pwd')";
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