<!DOCTYPE html>
<html>
<head>
	<title>Employees Not Infected by COVID-19</title>
</head>
<body>
	<h1>Employees Not Infected by COVID-19</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Role</th>
				<th>First Day of Work</th>
				<th>Date of Birth</th>
				<th>Email</th>
				<th>Total Hours Scheduled</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Retrieve data from database and store in $result variable
			// Sort results by role, then by first name, then by last name in ascending order
			$query = "SELECT FirstName, LastName, Role, FirstDayOfWork, DateOfBirth, Email, SUM(HoursScheduled) as TotalHoursScheduled FROM Employees 
					  WHERE Infected = 'No'
					  GROUP BY EmployeeID
					  ORDER BY Role ASC, FirstName ASC, LastName ASC";
			$result = mysqli_query($connection, $query);

			// Loop through each row in the $result variable and display data in HTML table
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Role'] . "</td>";
				echo "<td>" . $row['FirstDayOfWork'] . "</td>";
				echo "<td>" . $row['DateOfBirth'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['TotalHoursScheduled'] . "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>
