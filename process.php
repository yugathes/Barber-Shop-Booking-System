<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "barber";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
	die('Could not Connect My Sql:' .mysql_error());
}
$query = mysqli_query($conn,"SELECT AVG(star) as AVGRATE from feedback");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRATE'];
$query = mysqli_query($conn,"SELECT count(star) as Total from feedback");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($conn,"SELECT count(comment) as Totalreview from feedback");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($conn,"SELECT comment,star,username from feedback where main=1 order by id desc limit 3 ");
$rating = mysqli_query($conn,"SELECT count(*) as Total,star from feedback group by star order by star desc");
?>