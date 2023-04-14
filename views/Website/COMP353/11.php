<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List of Doctors and Nurses on Schedule</title>
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

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<h1>List of Doctors and Nurses on Schedule</h1>
	<?php
		// Replace with your database connection information
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "database_name";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Replace with the facility ID you want to display the list for
		$facility_id = 1;

		// Query to get the list of doctors and nurses who have been on schedule to work in the last two weeks for the given facility
		$sql = "SELECT users.first_name, users.last_name, users.role
				FROM schedules
				INNER JOIN users ON schedules.user_id = users.id
				WHERE schedules.facility_id = $facility_id
				AND schedules.date >= DATE_SUB(CURRENT_DATE, INTERVAL 2 WEEK)
				ORDER BY users.role ASC, users.first_name ASC";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table>";
			echo "<tr><th>First Name</th><th>Last Name</th><th>Role</th></tr>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["role"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "No results found.";
		}

		$conn->close();
	?>
</body>
</html>
