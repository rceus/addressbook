<?php
	$value=trim($_GET["id"]);
	$conn=mysqli_connect("localhost","root","root","addressbook");
	$query="DELETE FROM country WHERE country.idcountry=$value";
	
	if(mysqli_query($conn, $query))
	{
   		header('Location: http://localhost:8888/country.php');
		//echo "Successful </br>";
	}
	else
	{
		echo "Transaction Failed! </br>";
		echo mysqli_error($conn)." : ". mysqli_errno($conn);

	}
?>
