<?php
session_start();
//if session exists
if(isset ($_SESSION["username"])) //call this function to check if session exists or not
{
	include "Header.php";
	if(isset($_POST['feedback'])){
		$username = $_POST['user'];
		$star = $_POST['star'];
		$comment = $_POST['comment'];
		
		$query = "INSERT INTO feedback (id, username, star, comment, main) 
			  VALUES(NULL, '$username', '$star', '$comment', 0)";
		$resultInsert = mysqli_query($link, $query);
		if (!$resultInsert)
		{
			die ("Error: ".mysqli_error($link));
		}		
		else {
			echo '<script type="text/javascript">
				window.onload = function () 
				{ 
				alert("Your Feedback Submitted...");
				open("Menu.php","_top");
				}
				</script>';
		}	
	}
	?>
<!DOCTYPE html>
<html>
<head>
  <title>Iman.co Barber</title>
  <style>
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 0px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 30%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 70%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=date] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
	top: -70px;
    left: 150px;
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}
.tooltip .tooltiptext img{
	width: 120px;
	height:120px;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
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
	display: inline;  
    margin-bottom: 10px;
	text-align: left;
	margin: 3px;
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
.input-group2 select {
	display: inline;
	float: right;
	width: 50%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
	margin-bottom: 0px;
}
input[type=text] {
	margin-bottom: 0px;
}
.content button{
	display: block;
	float: right;	
}
.txt-center {
	text-align: center;
	display: inline;
    left: 50%;
    position: absolute;
}
.hide {
  display: none;
}

.clear {
  float: none;
  clear: both;
}

.rating {
    width: 90px;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    position: relative;
	float: right;
	display: inline;
}

.rating > label {
    float: right;
    display: inline;
    padding: 0;
    margin: 0;
    position: relative;
    width: 1.1em;
    cursor: pointer;
    color: #000;
}

.rating > label:hover,
.rating > label:hover ~ label,
.rating > input.radio-btn:checked ~ label {
    color: transparent;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating > input.radio-btn:checked ~ label:before,
.rating > input.radio-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 0;
    color: #FFD700;
}
</style>
</head>

<body>
<?php
$queryGet = "select * from users where type_user='Staff'";
$resultGet = mysqli_query($link,$queryGet);
if(!$resultGet)
{
	die ("Invalid Query - get Register List: ". mysqli_error($link));
}
else 
{?>
	<h2 style="text-align:center;color:white">Welcome To Iman.co Barber Booking Online</h2>
	<div class="row" style="margin-left: 0px;">
  <div class="col-75">
    <div class="container">
      <form action="Booking.php" method="POST">
		<center><h3>Booking</h3></center>
        <div class="row">
          <div class="col-50">
            
            <input type="hidden" id="username" name="username" value="<?php echo $_SESSION["username"];?>">
			<label for="city">Type of Service</label>
            <select id="service" name="service" required>
				<option value="" selected>Choose one</option>
				<option value="adult">Adult Cuts</option>
				<option value="school">School Haircut</option>
				<option value="kids">Kids Cuts</option>
				<option value="hairshave">Haircut + Beard Shave</option>
				<option value="hairtrim">Haircut + Beard Trim</option>
				<option value="shave">Shave</option>
				<option value="trim">Trim</option>
			</select>
            <label for="adr">Date</label>
            <input id="datefield" type='date' name="date" min='1999-01-01'>
          </div>
	
          <div class="col-50">
            <label for="cname">Barber</label>
			<select id="barber" name="barber" required>
				<option value="" selected>Choose one</option>
				<?php	while($baris= mysqli_fetch_array($resultGet, MYSQLI_BOTH))	{?>	
				<option value="<?php echo $baris['name'];?>" ><?php echo $baris['name'];?></option>
				<?php	}	}?>  
			</select>
          
            <label for="timeS">Time Slot</label>
            <select id="time" name="time" required>
				<option value="" selected>Choose one</option>
<?php	
	date_default_timezone_set('GMT');
	$begin = new DateTime("12:00");
	$end   = new DateTime("24:00");
	$interval = DateInterval::createFromDateString('30 min');
	$times    = new DatePeriod($begin, $interval, $end);

	foreach ($times as $time) {	?>
				<option value="<?php echo $time->format('H:i')?>"><?php echo $time->format('H:i') , "\n";?></option>
<?php	}?>
			</select>
          </div>

        </div>
        <input type="submit" value="Confirm Booking" name="book" class="btn">
      </form>
    </div>
  </div>

	<div class="col-25">
    <div class="container">
		<h4>Price Table
			<span class="price" style="color:black" >
			</span>
		</h4>
		<p>
			<div class="tooltip">Adult Cuts
				<span class="tooltiptext">
					<img src="../css/img/Customer/Adult.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 10</span>
		</p>
		
		<p>
			<div class="tooltip">School Haircut
				<span class="tooltiptext">
					<img src="../css/img/Customer/School.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 10</span>
		</p>
		
		<p>
			<div class="tooltip">Kids Cuts 
				<span class="tooltiptext">
					<img src="../css/img/Customer/Kids.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 8 &nbsp </span>
		</p>
		
		<p>
			<div class="tooltip">Haircut + Beard Shave 
				<span class="tooltiptext">
					<img src="../css/img/Customer/HaircutShave.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 20</span>
		</p>
		
		<p>
			<div class="tooltip">Haircut + Beard Trim  
				<span class="tooltiptext">
					<img src="../css/img/Customer/HaircutTrim.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 15</span>
		</p>
		
		<p>
			<div class="tooltip">Shave 
				<span class="tooltiptext">
					<img src="../css/img/Customer/Shave.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 10</span>
		</p>
		
		<p>
			<div class="tooltip">Trim 
				<span class="tooltiptext">
					<img src="../css/img/Customer/Trim.jpg" alt="" />
				</span>
			</div> 
			<span class="price">RM 8 &nbsp</span>
		</p>
    </div>
  </div>
	</div>
	<div class="row" style="margin-left: 0px;">
  <div class="col-75">
	<!--<div class="mid" style="width:70%;    padding: 5px 20px 15px 20px; float:left;">-->
			<form class="content2" style="background:#f2f2f2;width:70%;float:left;margin-top: 20px;margin-bottom: 20px; " action="Menu.php" method="POST">
				<h1 class="header" style="margin: auto; margin-bottom:50px; width:50%;">Customer Feedback</h1>
					<div class="input-group2">
						<input type="hidden" name="user" value="<?php echo $_SESSION["username"];?>">
						<label>Give Ratings</label>
						<div class="txt-center">
							<div class="rating">
								<input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
								<label for="star5" >☆</label>
								<input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
								<label for="star4" >☆</label>
								<input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
								<label for="star3" >☆</label>
								<input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
								<label for="star2" >☆</label>
								<input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
								<label for="star1" >☆</label>
								<div class="clear"></div>
							</div>
						</div>
						<br><br>
						<label>Comments</label>
						<textarea rows="3" cols="30" name="comment"></textarea>
					</div> 	
					<br><br>
					<button type="submit" class="btn" style="margin-top: 25px;" name="feedback" value="1">Submit</button>	
			</form>
	</div>
	</div>
<script>
$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    }

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);
</script>
	<?php	
	
}
else{
    echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 2 seconds";
	header('Refresh: 2; ../Auth/Login.php');
}				
?>
 
	 
</body>
</html>
