<!DOCTYPE html>
<html>
<head>
	<title>Infected Doctors</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Infected Doctors</h1>
	<table>
		<thead>
			<tr>
				<th>Facility</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date of Infection</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Retrieve data from database
			$conn = new mysqli("localhost", "username", "password", "database_name");
			$sql = "SELECT doctors.first_name, doctors.last_name, doctors.date_of_infection, facilities.facility_name
					FROM doctors
					INNER JOIN facilities ON doctors.facility_id = facilities.facility_id
					WHERE doctors.date_of_infection BETWEEN DATE_SUB(NOW(), INTERVAL 2 WEEK) AND NOW()
					ORDER BY facilities.facility_name ASC, doctors.first_name ASC";
			$result = $conn->query($sql);

			// Display data in table
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["facility_name"] . "</td>";
					echo "<td>" . $row["first_name"] . "</td>";
					echo "<td>" . $row["last_name"] . "</td>";
					echo "<td>" . $row["date_of_infection"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='4'>No infected doctors found in the past two weeks.</td></tr>";
			}

			$conn->close();
			?>
		</tbody>
	</table>
</body>
</html>
