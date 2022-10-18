<!DOCTYPE html>
<html lang="en">
<head>
	<title>IMAN.CO BARBERSHOP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
/* Style the content */
.content {
  padding: 10px;
  height: 80%; 
  overflow: auto;
}
.content button {
  background-color: #8a8080;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 15px 2px;
}
.button5 {border-uradius: 50%;}
/* Card Float four columns side by side */
	.column {
	  float: left;
	  width: 50%;  
	}
	
	.column input{
		width: 300px;
		height: 30px;
		margin-bottom: 10px;
		border: 1;
		
	}
	

	/* Remove extra left and right margins, due to padding */
	.row {
		margin: 0 20px;
		color: black;
		margin-top: 20px;
		margin-bottom: 40px;
	}

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
	  padding: 16px;
	  text-align: left;
	  height: 300px;
	  background-color: white;
	}
	.card p {
		font-size: 25;
		color: black;
	}
	.card img {
		width: 100%;
		height: 100%;
	}

body, html {
	height: 100%;
	font-family: "Inconsolata", sans-serif;
	background-position: center;
	background-size: cover;
	background-image:url(css/bc.webp);
	min-height: 75%;
	background-attachment:fixed;
	overflow: hidden;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 12%;
  background: #222222;
  color: white;
  text-align: center;
  padding-top: 10px;
}
</style>
<body>

<nav class="navbar navbar-inverse" style="min-height: 8%;margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">IMAN.CO BARBERSHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="About.php">About</a></li>
	  <li><a href="Gallery.html">Gallery</a></li>
	  <li><a href="Book.html">Book Online</a></li>
	  <li><a href="Contact.html">Contact</a></li>
	  <li class="active"><a href="Event.php">Events</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="Auth/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="Auth/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="content">
	<center style="color:white">
		<h1>IMAN.CO BARBERSHOP</h1>
		<h1>KUALA KANGSAR</h1>
		<h3>Barber Supply Shop in Royal town</h3>
		<h3>Open today until midnight</h3>
	</center>
<?php
	include "Auth/connection.php";
	$queryGet = "select * from event";	
	$resultGet = mysqli_query($link,$queryGet);
	if(!$resultGet)
	{
		die ("Invalid Query - get Items List: ". mysqli_error($link));
	}
	else
	{
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{?>
	<div class="row">
		<div class="column">
			<div class="card">
				<img src="Admin/eventImg/<?php echo $row['picture'];?>" alt="Avatar" style="float:left;">
			</div>
		</div>
		<div class="column">
			<div class="card">
				<h2><?php echo $row['name'];?></h2><br>
				<p><?php echo $row['description'];?></p>
			</div>
		</div>
	</div>
	<?php	}	}?>
</div>

<div class="footer">
  <p>Call us : 011-3225 4815<a href="tel:+601132254815"><img src="css/cl.png" style="width:50px;height:25px;"/></a></p>
  <p>Send email: imancobarbershop@gmail.com <a href="mailto:imancobarbershop@gmail.com"><img src="css/Mail.png" style="width:30px;height:25px;"/></a></p>
</div>
</body>
</html>
