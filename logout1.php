<?php
	session_start();
	include("db.php");
	$name= $_SESSION['name'];
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
			header('Location: index.php');
?>