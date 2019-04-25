<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$qry=mysqli_query($con,"update login set password='$pass' where username='$email'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==2)
	{
		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			header('location:index.php');
		}
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Log in Failed!";
	header("location:logout.php");
}
?>