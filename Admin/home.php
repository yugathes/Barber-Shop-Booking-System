<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{	include "Header.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	* {
	  box-sizing: border-box;
	}

	body {
	  font-family: Arial, Helvetica, sans-serif;
	}

	/* Float four columns side by side */
	.column {
	  float: left;
	  width: 25%;
	  padding: 0 10px;
	}

	/* Remove extra left and right margins, due to padding */
	.row {margin: 0 20px;color: black;}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Responsive columns */
	@media screen and (max-width: 600px) {
	  .column {
		width: 100%;
		display: block;
		margin-bottom: 20px;
	  }
	}

	/* Style the counter cards */
	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  padding: 16px;
	  text-align: center;
	  background-color: #1d96d1;
	}
	.card p {
		font-size: 25;
	}
</style>
</head>
<body>
<?php

	$staffQ = "select * from users where type_user='Staff'";	
	$staffR = mysqli_query($link,$staffQ);
	$staff = mysqli_num_rows($staffR);
	$customerQ = "select * from users where type_user='Customer'";	
	$customerR = mysqli_query($link,$customerQ);
	$customers = mysqli_num_rows($customerR);
	$bookingQ = "select * from booking where approve='1'";	
	$bookingR = mysqli_query($link,$bookingQ);
	$booking = mysqli_num_rows($bookingR);
	$countQ = "SELECT
    SUM(service like 'adult') AS adult,
    SUM(service like 'kids') AS kids,
    SUM(service like 'hairshave') AS hairshave,
    SUM(service like 'hairtrim') AS hairtrim,
    SUM(service like 'trim') AS trim,
    SUM(service like 'shave') AS shave,
    SUM(service like 'school') AS school
	FROM `booking` WHERE approve = '1'";
	$countR = mysqli_query($link,$countQ);
	$Crow= mysqli_fetch_array($countR, MYSQLI_BOTH);
	$earnings = ($Crow['adult'] * 10) + ($Crow['kids'] * 8) + ($Crow['hairshave'] * 20)
			+ ($Crow['hairtrim'] * 15) + ($Crow['trim'] * 8) + ($Crow['shave'] * 10) + ($Crow['school'] * 10);
	?>
	<h1 align="center"> Statistics </h1>
	<div class="row">
		<div class="column">
			<div class="card">
				<h3>Total Earnings</h3>
				<p>RM<?php echo $earnings;?>.00</p>
			</div>
		</div>
		<div class="column">
			<div class="card">
				<h3>Total Booking</h3>
				<p><?php echo $booking;?></p>
			</div>
		</div>
  
		<div class="column">
			<div class="card">
				<h3>Total Staffs</h3>
				<p><?php echo $staff;?></p>
			</div>
		</div>
  
		<div class="column">
			<div class="card">
				<h3>Total Customers</h3>
				<p><?php echo $customers;?></p>
			</div>
		</div>
</div>
	<!--<table id="table" border="1" align="center">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th>Event</th>
			<th>Action</th>
		</tr>	 
		<form>
<?php	$no=1;
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{
			
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row['username']?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['Hp']; ?></td>
				<td><?php echo $row['event']; ?></td>
				<td><a href="ParticipantEdit.php?id=<?php echo $row['username'];?>">
					<img border="0" alt="editB" src="../CSS/btn/editB.png" width="25" height="25"></a>
					<a href="ParticipantDelete.php?id=<?php echo $row['username'];?>" onclick="return confirm('Are you sure?')">
					<img border="0" alt="editB" src="../CSS/btn/delB.png" width="25" height="25"></a></a>
				</td>
			</tr>
<?php	$no++;}?>
		</form>	
	</table>-->
<?php
	}
	
else	{
	echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 5 seconds";
	header('Refresh: 5; ../Auth/Login.php');
}
?>
</body>
</html>
