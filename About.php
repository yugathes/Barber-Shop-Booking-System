<!DOCTYPE html>
<html lang="en">
<head>
	<title>IMAN.CO BARBERSHOP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>

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
.button5 {border-radius: 50%;}
/* Card Float four columns side by side */
	.column {
	  float: left;
	  width: 50%;
	  padding: 0;
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
	  padding: 0px;
	  background-color: white;
	  height: 300px;
	}
	.card p {
		font-size: 25;
		color: black;
	}
	.card img {
		width: 200px;
		height: 300px;
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
.about-section {
  padding: 50px;
  text-align: center;
  color: white;
  * {
  box-sizing: border-box;
}
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
.neww {
	font-family: Arial;
	max-width: 800px; /* Max width */
	padding: 20px;
    width: 80%;
    margin: auto;
    background: white;
    margin-top: 50px;
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
      <li class="active"><a href="About.php">About</a></li>
	  <li><a href="Gallery.html">Gallery</a></li>
	  <li><a href="Book.html">Book Online</a></li>
	  <li><a href="Contact.html">Contact</a></li>
	  <li><a href="Event.php">Events</a></li>
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
	<div class="about-section">
	  <h1>About Us</h1>
	  <p>Iman.co Barber Shop was established in 2016 and located in (Royal Town) Kuala Kangsar, Perak.</p>
	  <p>This is one of the most popular barbershop in Kuala Kangsar.</p> 
	  <p>The Iman.co Barber Shop is preferred by most people in Kuala Kangsar because they provide the best service.</p> 
	  <p>Every staff in Iman.co Barber Shop is certified and having a good experience.</p>
	  <p>The main core business of our barber shop is shave and haircut for men.</p>
	  <p>The Iman.co Barber Shop also does other business such as vape and pomade.</p>
	  <p>We sell vape, vape flavours, vape materials and quality pomades for our customers as a side business.</p>
	  <p>Resize the browser window to see that this page is responsive by the way.</p>
	</div>
	<div class="neww">
	<?php include'process.php';?>
	<div class="row container" style="width: auto;">
<div class="col-md-4" style="width: 100%;">
	<h3><b>Rating & Reviews</b></h3>
	<div class="row">
	
		<div class="col-md-6">
			<h3 align="center"><b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i></h3>
			<p><?=$Total;?> ratings and <?=$Total_review;?> reviews</p>
		</div>
		<div class="col-md-6">
			<?php
			while($db_rating= mysqli_fetch_array($rating)){
			?>
				<h4 align="center"><?=$db_rating['star'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> Total <?=$db_rating['Total'];?></h4>
			<?php	
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">	
		<?php
			while($db_review= mysqli_fetch_array($review)){
		?>
				<h4><?=$db_review['star'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> by <span style="font-size:14px;"><?=$db_review['username'];?></span></h4>
				<p><?=$db_review['comment'];?></p>
				<hr>
		<?php	
			}
		?>
		</div>
	</div>
</div>
</div><br>
</div>

<div class="footer">
  <p>Call us : 011-3225 4815<a href="tel:+601132254815"><img src="css/cl.png" style="width:50px;height:25px;"/></a></p>
  <p>Send email: imancobarbershop@gmail.com <a href="mailto:imancobarbershop@gmail.com"><img src="css/Mail.png" style="width:30px;height:25px;"/></a></p>
</div>
</body>
</html>
