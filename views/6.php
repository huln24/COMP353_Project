<!DOCTYPE html>
<html>

<head>
<title>Facilities Details</title>
</head>

<body>
	<h1>Facilities Details</h1>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Province</th>
				<th>Postal Code</th>
				<th>Phone Number</th>
				<th>Web Address</th>
				<th>Type</th>
				<th>Capacity</th>
				<th>General Manager</th>
				<th>Employees</th>
			</tr>
		</thead>
		<tbody>
			<!-- PHP code to fetch and display facility details -->
			<!-- <?php
				// Fetch facility details and sort them
				// ...

				// Display the sorted facility details in the table
				foreach ($facilities as $facility) {
					echo "<tr>";
					echo "<td>" . $facility['name'] . "</td>";
					echo "<td>" . $facility['address'] . "</td>";
					echo "<td>" . $facility['city'] . "</td>";
					echo "<td>" . $facility['province'] . "</td>";
					echo "<td>" . $facility['postal_code'] . "</td>";
					echo "<td>" . $facility['phone_number'] . "</td>";
					echo "<td>" . $facility['web_address'] . "</td>";
					echo "<td>" . $facility['type'] . "</td>";
					echo "<td>" . $facility['capacity'] . "</td>";
					echo "<td>" . $facility['general_manager'] . "</td>";
					echo "<td>" . $facility['employees'] . "</td>";
					echo "</tr>";
				}
			?> -->


			<!-- Revised PHP code
			<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute the MySQL query to fetch the facility details
$sql = "SELECT Facility.FName, Facility.FAddress, CONCAT(FirstName, ' ', LastName) AS GeneralManagerName, COUNT(EmployeeFacility.EID) AS NumEmployees
        FROM Facilities F
        INNER JOIN FacilityEmployee ON F.FID = FacilityEmployee.FID
        INNER JOIN Employee ON FacilityEmployee.EID = Employee.EID
        LEFT JOIN EmployeeFacility ON F.FID = EmployeeFacility.FID
        GROUP BY F.FID, FName, FAddress, GeneralManagerName
        ORDER BY Province, City, FType, NumEmployees ASC";
$result = mysqli_query($conn, $sql);

// Display the sorted facility details in the table
if (mysqli_num_rows($result) > 0) {
    while ($facility = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $facility['FName'] . "</td>";
        echo "<td>" . $facility['FAddress'] . "</td>";
        echo "<td>" . $facility['GeneralManagerName'] . "</td>";
        echo "<td>" . $facility['NumEmployees'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
-->
		</tbody>
	</table>
</body>

</html>