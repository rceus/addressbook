<html>
<head>
	<title>Enter City</title>
</head>
<body>
	Enter city if already not in table:
	<br><br>
	<form action="cityscript.php", method="post">
		City: <input type="text", name="city">
					<input type="submit" value="Submit">
	</form>
	<br><br><br><br>
	<?php
		$con=mysqli_connect("localhost","root","root","addressbook");

		$result = mysqli_query($con,"SELECT city.idcity, city.cityname FROM city GROUP BY cityname");

		echo "<table border='1'>
		<tr>
		<th>City ID</th>
		<th>City Name</th>
		<th>Delete</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) 
		{
  			echo "<tr>";
  			echo "<td>" . $row['idcity'] . "</td>";
  			echo "<td>" . $row['cityname'] . "</td>";
  			$cityid = $row['idcity'];
  			echo"<td><a href='citydeletescript.php?id=$cityid'>Delete</a></td>";
  			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
	
	?>
</body>
</html>