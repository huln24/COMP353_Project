<!DOCTYPE html>
<html>
<head>
	<title>Nurse Details</title>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
	</style>
</head>
<body>
	<h1>Nurse Details</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>First Day of Work</th>
				<th>Date of Birth</th>
				<th>Email Address</th>
				<th>Total Hours Scheduled</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Replace this with your code to retrieve nurse details from the database
				$nurseDetails = array(
					array('John', 'Doe', '2010-01-01', '1980-01-01', 'john.doe@example.com', 100),
					array('Jane', 'Doe', '2012-01-01', '1982-01-01', 'jane.doe@example.com', 120),
					array('Bob', 'Smith', '2014-01-01', '1984-01-01', 'bob.smith@example.com', 80),
				);

				// Find the nurse(s) with the highest number of scheduled hours
				$maxHours = 0;
				foreach ($nurseDetails as $nurse) {
					if ($nurse[5] > $maxHours) {
						$maxHours = $nurse[5];
					}
				}

				// Display the details of the nurse(s) with the highest number of scheduled hours
				foreach ($nurseDetails as $nurse) {
					if ($nurse[5] == $maxHours) {
						echo "<tr>";
						echo "<td>" . $nurse[0] . "</td>";
						echo "<td>" . $nurse[1] . "</td>";
						echo "<td>" . $nurse[2] . "</td>";
						echo "<td>" . $nurse[3] . "</td>";
						echo "<td>" . $nurse[4] . "</td>";
						echo "<td>" . $nurse[5] . "</td>";
						echo "</tr>";
					}
				}
			?>
		</tbody>
	</table>
</body>
</html>
