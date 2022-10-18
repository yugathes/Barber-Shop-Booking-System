<?php
	include "../Auth/connection.php";
//Customer
if(isset($_POST["customer"])){
	$email = $_POST["email"];
	$Hp = $_POST["Hp"];
	$address = $_POST["address"];
	$uID = $_POST["username"];
		
	$queryInsert = "UPDATE users SET
		email = '".$email."',
		address = '".$address."',
		Hp = '".$Hp."'
		WHERE username = '$uID'";

	$resultInsert = mysqli_query($link,$queryInsert);
	if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo '<script type="text/javascript">
			window.onload = function () 
			{ 
			alert("Customer Profile been Updated...");
			open("customer.php","_top");
			}
			</script>';

	}
}
//Staff
if(isset($_POST["staffAdm"])){
	$email = $_POST["email"];
	$name =$_POST["name"];
	$Hp = $_POST["Hp"];
	$address = $_POST["address"];
	$uID = $_POST["username"];
		
	$queryInsert = "UPDATE users SET
		name = '".$name."',
		email = '".$email."',
		address = '".$address."',
		Hp = '".$Hp."'
		WHERE username = '$uID'";

	$resultInsert = mysqli_query($link,$queryInsert);
	if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo '<script type="text/javascript">
			window.onload = function () 
			{ 
			alert("Staff Profile been Updated...");
			open("staff.php","_top");
			}
			</script>';

	}
}
//Staff
if(isset($_POST["staff"])){
	$email = $_POST["email"];
	$name =$_POST["name"];
	$Hp = $_POST["Hp"];
	$address = $_POST["address"];
	$uID = $_POST["username"];
		
	$queryInsert = "UPDATE users SET
		name = '".$name."',
		email = '".$email."',
		address = '".$address."',
		Hp = '".$Hp."'
		WHERE username = '$uID'";

	$resultInsert = mysqli_query($link,$queryInsert);
	if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo '<script type="text/javascript">
			window.onload = function () 
			{ 
			alert("Staff Profile been Updated...");
			open("../Staff/home.php","_top");
			}
			</script>';

	}
}
?>