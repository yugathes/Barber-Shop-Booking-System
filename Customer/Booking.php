<?php
include "../Auth/connection.php";
$ID = "";
$customer = "";
$staff = "";
$service = "";
$date = "";
$time = "";
date_default_timezone_set('Asia/Kuala_Lumpur');
$datetime = date('Y-m-d G:i:s ', time());
$cunt = new DateTime($datetime);
$review = "";
$approve = "";
$errors = array(); 
    
if (isset($_POST['book'])) {
// receive all input values from the form
	$customer = mysqli_real_escape_string($link, $_POST['username']);
	$service = mysqli_real_escape_string($link, $_POST['service']);
	$date = mysqli_real_escape_string($link, $_POST['date']);
	$staff = mysqli_real_escape_string($link, $_POST['barber']);
	$time = mysqli_real_escape_string($link, $_POST['time']);
	if (empty($service)) { array_push($errors, "Service is required"); }
	if (empty($date)) { array_push($errors, "Date is required"); }
	if (empty($time)) { array_push($errors, "Time is required"); }
	if (empty($staff)) { array_push($errors, "Barber is required"); }
	
	if (count($errors) == 0) 
	{
		$check = "SELECT * FROM timeslot WHERE time = '".$time."' AND date = '".$date."' AND staff = '".$staff."'";
		$checkresult= mysqli_query($link, $check);
		$checkNo = mysqli_fetch_assoc($checkresult);
		if ($checkNo)
		{
			$fail = "This time slot already been booked with other customer.";
			echo "<script type='text/javascript'>alert('$fail');
			document.location='Menu.php';
			</script>"; 
		}
		else
		{
			$Cquery = "INSERT INTO booking (id, cusID, staffID, service, date, time, logDT, review, approve) 
			VALUES (NULL, '$customer', '$staff', '$service', '$date', '$time', '$datetime','$review', '0')";
			$result= mysqli_query($link, $Cquery);
			if (!$result)
			{
				die("Error:".mysqli_error($link));
				$fail = "Please Check Booking Detail.";
				echo "<script type='text/javascript'>alert('$fail');
				document.location='Menu.php';
				</script>"; 
			}
			else
			{
				$timeslotQ = "INSERT INTO timeslot (id, time, date, staff) VALUES (NULL, '$time', '$date', '$staff')";
				$timeslotR= mysqli_query($link, $timeslotQ);
				if (!$result)
				{
					die("Error:".mysqli_error($link));
					$fail = "Please Detail.";
					echo "<script type='text/javascript'>alert('$fail');
					document.location='Menu.php';
					</script>"; 
				}
				else
				{
				$sucess = "Booking Added Sucessful.";
				echo "<script type='text/javascript'>alert('$sucess');
				document.location='Menu.php';
				</script>";
				}
			}
		}
    }  
	else
	{   
		$fail = "Please Check Cuti Detaile.";
		echo "<script type='text/javascript'>alert('$fail');
		document.location='status.php';
		</script>"; 
	}
}
?>