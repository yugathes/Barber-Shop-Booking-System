<?php
$username = $_GET['id'];
include "../Auth/connection.php";
	$queryGet = "select * from users where username='".$username."' ";
	$resultGet = mysqli_query($link,$queryGet);
	if(!$resultGet)
	{
		die ("Invalid Query - get Items List: ". mysqli_error($link));
	}
	else
	{
		while($row= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
		{
			$name = $row['cName'];
			$hp =  $row['Hp'];
		}
		$contact = "Contact ".$name." : +6".$hp."";
		echo '<script type="text/javascript">
				window.onload = function () 
				{ 
				alert("'.$contact.'");
				open("Menu.php","_top");
				}
				</script>';
	}

?>