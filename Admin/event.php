<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{	include "Header.php";?>
<!DOCTYPE html>
<html>
<style>
.mid{
	margin: auto;
	width: 40%;
	padding: 10px;
	
}
.content2 {
	margin: auto;
	width: 100%;
	padding: 20px;
	border: 1px solid #483235;
	background: white;
	border-radius: 10px 10px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.input-group textarea {
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}

.content button{
	display: block;
	float: right;
	
}
</style>
<body>
	<h1 align="center"> Event & News</h1>
<?php

	$queryGet = "select * from event";	
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
			<th>Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Action</th>
		</tr>	 
		<form>
<?php	$no=1;
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{
			
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['description']?></td>
				<td><?php echo $row['picture'];?></td>
				<td>
					<a href="Delete.php?eventID=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?')">
					<img border="0" alt="editB" src="../CSS/btn/delB.png" width="25" height="25"></a></a>
				</td>
			</tr>
<?php	$no++;}?>
		</form>	
	</table>
<?php
	}?>
	<div class="mid">
			<form class="content2" action="event.php" method="POST" enctype="multipart/form-data">
				<h1 class="header">Add Event </h1>
					<div class="input-group">
						<label>Name</label>
						<input type="text" name="name"><br><br>
						<label>Description</label>
						<textarea rows="3" cols="30" name="description"></textarea><br><br>
						<label>Picture</label>
						<input type="file" name="file"><br><br>
					</div> 	
					<button type="submit" class="btn" style="margin-top: 25px;" name="event">Add</button>	
			</form>
	</div>
<?php	
    $eventID = "";
    $description = "";
    
    if (isset($_POST['event'])) {

  // receive all input values from the form
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$description = mysqli_real_escape_string($link, $_POST['description']);
    
	$event_check_query = "SELECT * FROM event WHERE name='$name' LIMIT 1";
    $result = mysqli_query($link, $event_check_query);
    $event = mysqli_fetch_assoc($result);
    if ($event) { // if user exists
    if ($event['name'] === $name) {
      array_push($errors, "Prize Name already exists");
      
    }}
    $filename = $_FILES['file']['name'];

    // destination of the file on the server
    $destination = 'eventImg/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['file']['name'];

    if (!in_array($extension, ['jpeg', 'jpg', 'png','PNG','JPG'])) {
        echo "You file extension must be a JPEG or PNG file.";
    }  else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {

  	$query = "INSERT INTO event(id, name, description, picture) 
  			  VALUES(NULL, '$name', '$description', '$filename' )";
  	$result= mysqli_query($link, $query);
  	if (!$result)
	{
	    die("Error:".mysqli_error($link));
	   $fail = "Please Check Event Detail.";
        echo "<script type='text/javascript'>alert('$fail');
	    document.location='event.php';
	    </script>"; 
	}
	else
	{
	    $sucess = "Event Added Sucessful.";
	    echo "<script type='text/javascript'>alert('$sucess');
	    document.location='event.php';
	    </script>";
	}
    }
  }
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
