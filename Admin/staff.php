<?php
//call this function to check if session exists or not
session_start();

//if session exists
if(isset ($_SESSION["username"])) //session userid gets value from text field named userid, shown in user.php
{	include "Header.php";
	$errors = array(); 
	?>
<!DOCTYPE html>
<html>
<head>
<style>
.mid{
	margin: auto;
	width: 50%;
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
.input-group2 {
  margin: 10px 0px 10px 0px;
}
.input-group2 label {
	display: inline-flex;  
    margin-bottom: 10px;
	text-align: left;
	margin: 3px;
}
.input-group2 input {
	display: inline;
	float: right;
	height: 30px;
	width: 50%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.input-group2 textarea {
	display: inline;
	float: right;
	width: 50%;
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
</head>
<body>
	<h1 align="center"> Staff List </h1>
<?php

	$queryGet = "select * from users where type_user='Staff'";	
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
			<th>Username</th>
			<th>Name</th>
			<th>Email</th>
			<th>Contact Number</th>
			<th>Address</th>
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
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['Hp']; ?></td>
				<td class="address"><?php echo $row['address']; ?></td>
				<td><a href="staffEdit.php?id=<?php echo $row['username'];?>">
					<img border="0" alt="editB" src="../CSS/btn/editB.png" width="25" height="25"></a>
					<a href="Delete.php?sid=<?php echo $row['username'];?>" onclick="return confirm('Are you sure?')">
					<img border="0" alt="editB" src="../CSS/btn/delB.png" width="25" height="25"></a></a>
				</td>
			</tr>
<?php	$no++;}?>
		</form>	
	</table>
	<div class="mid">
			<form class="content2" action="staff.php" method="POST">
				<h1 class="header">Staff Registration</h1>
					<div class="input-group2">
						<?php include('Errors.php');?><br>
						<label>Username</label>
						<input type="text" name="username"><br><br>
						<label>Full Name</label>
						<input type="text" name="name"><br><br>
						<label>Email</label>
						<input type="email" name="email"><br><br>
						<label>Password</label>
						<input type="password" name="password"><br><br>
						<label>Contact Number</label>
						<input type="text" name="Hp" placeholder="0123456789"><br><br>
						<label>Address</label>
						<textarea rows="3" cols="30" name="address"></textarea>
					</div> 	
					<br><br>
					<button type="submit" class="btn" style="margin-top: 25px;" name="register">Register</button>	
			</form>
	</div>
	<br><br><br><br>
<?php
	}
	if(isset($_POST["register"])){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$type_user = "Staff";
		$Hp = $_POST['Hp'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }
		if (empty($Hp)) { array_push($errors, "Contact Number is required"); }
		
		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($link, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) { // if user exists
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			}

			if ($user['email'] === $email) {
			  array_push($errors, "email already exists");
			}
		}
		if (count($errors) == 0) {
			//encrypt the password before saving in the database$password = md5($password)
			$query = "INSERT INTO users (username, password, name, email,  Hp, address, type_user) 
				  VALUES('$username', '$password', '$name', '$email', '$Hp', '$address', '$type_user')";
			$resultInsert = mysqli_query($link, $query);
			if (!$resultInsert)
			{
				die ("Error: ".mysqli_error($link));
			}		
			else {
				echo '<script type="text/javascript">
					window.onload = function () 
					{ 
					alert("Staff Profile been Registered...");
					open("staff.php","_top");
					}
					</script>';
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
