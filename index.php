<!--
	Sort all the countries and Similar Names to be deleted
	Take care about email and street strings length
-->




<html>
<head>
<title>Address Book</title>
<script>
	function myfunction()
	{
			var x = document.forms["myform"]["empid"].value;
			if(x == null || x == "")
			{
				alert("Please enter a valid Employee ID");
				return false;
			}
			if(isNaN(x))
			{
				alert("Employee ID should be a number");
				return false;
			}

			var fname = document.forms["myform"]["firstname"].value;
			fname = fname.trim();
			if(fname == null || fname == "")
			{
				alert("Please enter a valid First Name");
				return false;
			}
			if(!(/^[a-z]+$/i.test(fname)))
			{
				alert("First Name should only contain alphabets");
				return false;
			}

			var lname = document.forms["myform"]["lastname"].value;
			lname = lname.trim();
			if(lname == null || lname == "")
			{
				alert("Please enter a valid Last Name");
				return false;
			}
			if(!(/^[a-z]+$/i.test(lname)))
			{
				alert("Last Name should only contain alphabets");
				return false;
			}
		}
	</script>
</head>

<body>

	<form name="myform", action="indexscript.php", method="post", onsubmit= "return myfunction()">

		<table>
			<tr>
				<td>Employee ID</td>
				<td><input type="text" name="empid" id="empid"></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="firstname"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lastname"></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone"></td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Street Address</td>
				<td><input type="text" name="street"></td>
			</tr>

			<?php

				$conn=mysqli_connect("localhost", "root", "root", "addressbook");
				$query="select idcity, cityname from city group by cityname order by cityname";
				$result=mysqli_query($conn, $query);

				echo "<tr>";
				echo "<td>City</td>";
				echo "<td>";
				echo "<select id='idcity' name='idcity'>";
				echo "<option>Select City</option>";

				while ($row=mysqli_fetch_array($result)) {
					echo "<option value=$row[0]> $row[1] </option>";
				}
				echo "</select>";
				echo "</td>";
				echo "</tr>";

			?>

			<?php

				$conn=mysqli_connect("localhost","root","root","addressbook");

				$query="select idcountry, countryname from country group by countryname order by countryname";
				$result=mysqli_query($conn, $query);

				echo "<tr>";
				echo "<td>Country</td>";
				echo "<td>";
				echo "<select id='idcountry' name='idcountry'>";
				echo "<option>Select Country</option>";
				while($row=mysqli_fetch_array($result)){
  					echo "<option value=$row[0]>$row[1]</option>";
				
				}
				echo "</select>";
				echo "</td>";
				echo "</tr>";
			?>

		</table>	
		<br>
				<input type="submit" value="Submit">
	</form>	
	<br>
	<br>
	

	<?php
		$con=mysqli_connect("localhost","root","root","addressbook");

		$result = mysqli_query($con,"SELECT contacts.empid, contacts.firstname, contacts.lastname, 
			contacts.phone, contacts.email, contacts.street, city.cityname, country.countryname FROM contacts 	
			LEFT OUTER JOIN city ON contacts.idcity = city.idcity 
			LEFT OUTER JOIN country ON contacts.idcountry = country.idcountry");

		echo "<table border='1'>
		<tr>
		<th>Employee ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone</th>	
		<th>E-mail</th>
		<th>Street Address</th>
		<th>City</th>
		<th>Country</th>
		<th>Delete</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) 
		{
  			echo "<tr>";
  			echo "<td>" . $row['empid'] . "</td>";
  			echo "<td>" . $row['firstname'] . "</td>";
  			echo "<td>" . $row['lastname'] . "</td>";
  			echo "<td>" . $row['phone'] . "</td>";
  			echo "<td>" . $row['email'] . "</td>";
  			echo "<td>" . $row['street'] . "</td>";
  			echo "<td>" . $row['cityname'] . "</td>";
  			echo "<td>" . $row['countryname'] . "</td>";
  			$emp = $row['empid'];
  			echo"<td><a href='indexdeletescript.php?id=$emp'>Delete</a></td>";
  			
  			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
	
	?>
	<br>
	<br>

<!-- Table Finishes -->


</body>
</html>