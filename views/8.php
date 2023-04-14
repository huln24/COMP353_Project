<!DOCTYPE html>
<html>
<head>
	<title>Schedule Details</title>
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

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h2>Schedule Details</h2>
	<form action="schedule-details.php" method="POST">
		<label for="employee">Employee:</label>
		<input type="text" id="employee" name="employee" required><br><br>
		<label for="start_date">Start Date:</label>
		<input type="date" id="start_date" name="start_date" required>
		<label for="end_date">End Date:</label>
		<input type="date" id="end_date" name="end_date" required><br><br>
		<input type="submit" value="Search">
	</form>
	<br>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$employee = $_POST['employee'];
			$start_date = $_POST['start_date'];
			$end_date = $_POST['end_date'];

			// TODO: query the database to get the schedule details

			// example data
			$data = array(
				array('Facility A', '2023-04-10', '08:00:00', '16:00:00'),
				array('Facility A', '2023-04-11', '09:00:00', '17:00:00'),
				array('Facility B', '2023-04-11', '12:00:00', '20:00:00'),
				array('Facility C', '2023-04-12', '10:00:00', '18:00:00'),
				array('Facility C', '2023-04-13', '08:00:00', '16:00:00'),
			);

			if (count($data) > 0) {
				// sort the data by facility name, day of the year, and start time
				usort($data, function($a, $b) {
					if ($a[0] == $b[0]) {
						if ($a[1] == $b[1]) {
							return strcmp($a[2], $b[2]);
						}
						return strcmp($a[1], $b[1]);
					}
					return strcmp($a[0], $b[0]);
				});

				// display the data in a table
				echo "<table>";
				echo "<tr><th>Facility</th><th>Day of the Year</th><th>Start Time</th><th>End Time</th></tr>";
				foreach ($data as $row) {
					echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td></tr
				}
				echo "</table>";
			} else {
				echo "No schedule details found.";
			}
		}
	?>
</body>
</html>

