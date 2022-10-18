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

	$queryGet = "select * from booking";
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
			<th>Action</th>
		</tr>	
<?php	$no=1;
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{	
			$tmp = $row['logDT'];
            $Dtime = new DateTime($tmp);
			$date = $Dtime->format('d/m/Y');
			$time = $Dtime->format('g:i A');
		?>
		<tr>
			<form action="Approve.php" method="POST">
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
			else if($row['approve']=="2")  echo "<p style='color: red;'>Decline</p>"; 
			else	echo "<p style='color: green;'>Approved</p>"?></td>
			<td><?php echo $row['review'];?></td>
			<input type="hidden" name="id" value="<?php echo $row['id'];?>">
			<td><button type="submit" name="approve" value="1"<?php	
			if($row['approve']=="0"){  echo "style='background:green;color:white;margin-right: 5px;'><span>&#10004;</span></button>";
				echo "<button type='submit' name='approve' value='2' style='background:red;color:white;'><span>&#10006;</span></button>";
			}else	echo "disabled>-</button>"?></td>
				
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
