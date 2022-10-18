<?php
include "../Auth/connection.php";
$staff= $_GET['sid'];
$uID = $_GET['id']; //Customer
$feedback = $_GET['feedbackid'];
$event = $_GET['eventID'];
//$user = $_GET['usrID'];
//$prize = $_GET['przID'];

if(isset($uID)){
	$queryDelete = "DELETE FROM users WHERE username = '".$uID."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		header("Location: customer.php");
	}
}
if(isset($staff)){
	$queryDelete = "DELETE FROM users WHERE username = '".$staff."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		header("Location: staff.php");
	}
}
if(isset($feedback)){
	$queryDelete = "DELETE FROM feedback WHERE id = '".$feedback."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		header("Location: customer.php");
	}
}
if(isset($event)){
	$queryDelete = "DELETE FROM event WHERE id = '".$event."'";
	$resultDelete = mysqli_query($link,$queryDelete);
	if (!$resultDelete)
	{
		die ("Error: ".mysqli_error($link));
		}		
	else {
		header("Location: event.php");
	}
}

?>