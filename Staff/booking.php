<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{	include "Header.php";?>
<!DOCTYPE html>
<html>
<body>
	<h1 align="center"> Bookings</h1>
<?php
	$staff = $_SESSION["username"];
	$queryResult = mysqli_query($link, "SELECT name FROM users WHERE username = '$staff'");
	$row= mysqli_fetch_array($queryResult, MYSQLI_BOTH);
	$user = $row['name'];
	$queryGet = "select * from booking WHERE staffID = '".$user."' ORDER BY date ASC, time ASC";
	$resultGet = mysqli_query($link,$queryGet);
	if(!$resultGet)
	{
		die ("Invalid Query - get Items List: ". mysqli_error($link));
	}
	else
	{?>
	<table id="table" border="1" align="center">
		<tr>
			<th>No</th>
			<th colspan="2">Booked On</th>
			<th>Service</th>
			<th>Date</th>
			<th>Time</th>
			<th>Barber</th>
			<th>Status</th>
			<th>Requirement</th>
		</tr>	 
		<form>
<?php	$no=1;
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{	
			$tmp = $row['logDT'];
            $Dtime = new DateTime($tmp);
			$date = $Dtime->format('d/m/Y');
			$time = $Dtime->format('g:i A');
		?>
		<tr>
			<form action="List.php" method="POST">
			<td><?php echo $no;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $time;?></td>
			<td><?php 
				if($row['service']=="adult")	echo "Adult Cuts";
				if($row['service']=="school")	echo "School Haircut";
				if($row['service']=="kids")	echo "Kids Cuts";
				if($row['service']=="hairshave")	echo "Haircut + Beard Shave";
				if($row['service']=="hairtrim")	echo "Haircut + Beard Trim";
				if($row['service']=="shave")	echo "Shave";
				if($row['service']=="trim")	echo "Trim";
			?></td>
			<td><?php 
				$rDate = new DateTime($row['date']);
				echo $rDate->format('d/m/Y');?>
			</td>
			<td><?php 
				$rTime = new DateTime($row['time']);
				echo $rTime->format('g:i A');?>
			</td>
			<td><?php echo $row['staffID']; ?></td>
			<td><?php	
			if($row['approve']=="0")	echo "<p style='color: #ff8d00;'>Pending</p>"; 
			else if($row['approve']=="2")	echo "<p style='color: red;'>Declined</p>"; 
			else	echo "<p style='color: green;'>Approved</p>"?></td>
			<td><?php echo $row['review'];?></td>
			</form>	
			</tr>
			<?php	$no++;	}?>
	</table>
<?php
		
	}
}
else	{
	echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Auth/Login.php');
}
?>
</body>
</html>
