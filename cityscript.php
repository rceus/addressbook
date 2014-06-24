<?php
	$city=trim($_POST["city"]);
	$conn=mysqli_connect("localhost","root","root","addressbook");
	$city=ucfirst(strtoupper($city));
	$query="insert into city (cityname) values('{$city}')";

	if (mysqli_query($conn, $query))
	{
   		header('Location: http://localhost:8888/city.php');
	}
	else
	{
		echo "Transaction failed</br>";
		echo mysqli_error($conn)." : ". mysqli_errno($conn);
	}

?>