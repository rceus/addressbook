<?php
	$country=trim($_POST["country"]);
	$conn=mysqli_connect("localhost","root","root","addressbook");
	$country=ucfirst(strtoupper($country));
	$query="insert into country (countryname) values('{$country}')";
	
	if (mysqli_query($conn, $query))
	{
   		header('Location: http://localhost:8888/country.php');
	}
	else
	{
		echo "Transaction failed</br>";
		echo mysqli_error($conn)." : ". mysqli_errno($conn);
	}

/*
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
*/
?>