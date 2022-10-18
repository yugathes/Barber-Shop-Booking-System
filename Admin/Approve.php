<?php
include("../Auth/connection.php");
		$id = $_POST["id"];
		$appr = $_POST["approve"];
		
		$queryInsert = "UPDATE booking SET
		approve = '$appr'
		WHERE id = '$id'";

	$resultInsert = mysqli_query($link,$queryInsert);
	if (!$resultInsert)
	{
		die ("Error: ".mysqli_error($link));
	}		
	else {
		echo '<script type="text/javascript">
			window.onload = function () 
			{ 
			alert("Status been Updated...");
			open("booking.php","_top");
			}
			</script>';

	}
?>