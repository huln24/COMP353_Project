<!DOCTYPE html>
<html>
<head>
	<title>Doctor List</title>
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
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<h1>Doctor List</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>City of Residence</th>
				<th>Total Number of Facilities</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Establish database connection
				$servername = "localhost";
				$username = "username";
				$password = "password";
				$dbname = "database_name";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Query to retrieve doctor list
				$sql = "SELECT d.FirstName, d.LastName, d.CityOfResidence, COUNT(*) AS TotalNumFacilities FROM Doctors d INNER JOIN Assignments a ON d.DoctorID = a.DoctorID INNER JOIN Facilities f ON a.FacilityID = f.FacilityID WHERE f.Province = 'Québec' GROUP BY d.DoctorID ORDER BY d.CityOfResidence ASC, TotalNumFacilities DESC";

				// Execute query and process results
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$row["FirstName"]."</td>";
						echo "<td>".$row["LastName"]."</td>";
						echo "<td>".$row["CityOfResidence"]."</td>";
						echo "<td>".$row["TotalNumFacilities"]."</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='4'>No results found</td></tr>";
				}

				// Close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
