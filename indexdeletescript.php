<?php
	$value=trim($_GET["id"]);

	$conn=mysqli_connect("localhost","root","root","addressbook");

	$query="DELETE FROM contacts WHERE contacts.empid=$value";
	
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
