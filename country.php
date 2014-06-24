<html>
<head>
	<title>Enter Country</title>
</head>
<body>

	Enter country if already not in table:
	<br><br>
	<form action="countryscript.php", method="post">
		Country: <input type="text", name="country">
					<input type="submit" value="Submit">

	</form>
	<br><br><br><br>
	<?php
		$con=mysqli_connect("localhost","root","root","addressbook");
		$result = mysqli_query($con,"SELECT country.idcountry, country.countryname FROM country GROUP BY countryname");
		echo "<table border='1'>
		<tr>
		<th>Country ID</th>
		<th>Country Name</th>
		<th>Delete</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) 
		{
  			echo "<tr>";
  			echo "<td>" . $row['idcountry'] . "</td>";
  			echo "<td>" . $row['countryname'] . "</td>";
  			$countryid = $row['idcountry'];
  			echo"<td><a href='countrydeletescript.php?id=$countryid'>Delete</a></td>";
  			echo "</tr>";
		}
		echo "</table>";
		mysqli_close($con);
	?>
</body>
</html>