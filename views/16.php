<!DOCTYPE html>
<html>
<head>
	<title>Infected Doctors and Nurses</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Infected Doctors and Nurses</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>First Day of Work</th>
				<th>Role</th>
				<th>Date of Birth</th>
				<th>Email Address</th>
				<th>Total Hours Scheduled</th>
				<th>Number of Infections</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Perform query to retrieve data from database
				$sql = "SELECT 
							first_name,
							last_name,
							first_day_of_work,
							role,
							date_of_birth,
							email,
							SUM(hours_scheduled) AS total_hours_scheduled,
							COUNT(*) AS num_infections
						FROM 
							schedule
							JOIN employee ON schedule.employee_id = employee.employee_id
							JOIN (
								SELECT 
									employee_id,
									COUNT(*) AS num_infections
								FROM 
									infection
								WHERE 
									infection_date >= DATE_SUB(NOW(), INTERVAL 2 WEEK)
								GROUP BY 
									employee_id
							) AS infections ON schedule.employee_id = infections.employee_id
						WHERE 
							(role = 'nurse' OR role = 'doctor') AND
							(infections.num_infections >= 3)
						GROUP BY 
							schedule.employee_id
						ORDER BY 
							role ASC, 
							first_name ASC, 
							last_name ASC";
				$result = mysqli_query($conn, $sql);

				// Check if query returned any results
				if (mysqli_num_rows($result) > 0) {
					// Output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row["first_name"] . "</td>";
						echo "<td>" . $row["last_name"] . "</td>";
						echo "<td>" . $row["first_day_of_work"] . "</td>";
						echo "<td>" . $row["role"] . "</td>";
						echo "<td>" . $row["date_of_birth"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "<td>" . $row["total_hours_scheduled"] . "</td>";
						echo "<td>" . $row["num_infections"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "0 results";
				}

				// Close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>


<!-- Note that this code assumes that you have already established a connection to your database using PHP's mysqli extension, 
    and that your database schema and data are already set up according to the query. 
    Also, be sure to properly sanitize and validate user input to prevent SQL injection attacks. 
-->