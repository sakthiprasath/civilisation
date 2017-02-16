<?php

include "connect.php";
session_start();
if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$password=$_POST['password'];
		
		$_SESSION['name']=$name;
		$q=mysqli_query($con,"select password from students where user_id= '$name' ")or die(mysqli_error($con));
		while(mysql_fetch_assoc($q))
		{
			$tablepass=$row['password'];
			$tablepass=md5($tablepass);
			if($password=$tablepass)  	
			{
				
				echo "logged in";
			}
			if(!$q)
			{	
			die(header("location:index.php"));
			}
		else
		{
			header("location:loginform.html");
		}
	}
?>
