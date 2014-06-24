<?php
	$empid=trim($_POST["empid"]);
	$firstname=trim($_POST["firstname"]);
	$lastname=trim($_POST["lastname"]);
	$phone=trim($_POST["phone"]);
	$email=trim($_POST["email"]);
	$street=trim($_POST["street"]);
	$city=trim($_POST["idcity"]);
	$country=trim($_POST["idcountry"]);

	$firstname=ucfirst(strtolower($firstname));
	$lastname=ucfirst(strtolower($lastname));

	$conn=mysqli_connect("localhost","root","root","addressbook");

	$query="insert into contacts (empid, firstname, lastname, phone, email, street, idcity, idcountry) values ('{$empid}', '{$firstname}', '{$lastname}', '{$phone}', '{$email}', '{$street}', '{$city}', '{$country}')";
	
	if(mysqli_query($conn, $query))
	{
   		header('Location: http://localhost:8888/index.php');
		//echo "Successful </br>";
	}
	else
	{
		echo "Transaction Failed! </br>";
		echo mysqli_error($conn)." : ". mysqli_errno($conn);

	}
?>
