<!DOCTYPE html>
<html>
<head>
	<title>Facilities Table</title>
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

		tr:hover {background-color: #f5f5f5;}

		.button {
		  background-color: #4CAF50;
		  border: none;
		  color: white;
		  padding: 8px 16px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 14px;
		  margin: 4px 2px;
		  cursor: pointer;
		}

		.create-button {
		  background-color: #008CBA;
		}

		.edit-button {
		  background-color: #f44336;
		}

		.delete-button {
		  background-color: #555555;
		}
	</style>
</head>
<body>

	<h2>Facilities</h2>

	<table>
		<thead>
			<tr>
				<th>FID</th>
				<th>FName</th>
				<th>FAddress</th>
				<th>City</th>
				<th>Province</th>
				<th>PostalCode</th>
				<th>Type</th>
				<th>Capacity</th>
				<th>Phone</th>
				<th>Website</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			
			<!-- <?php
				// Replace "your_database_name_here" and "your_username_here" with your actual database name and username
				$connection = mysqli_connect("localhost", "your_username_here", "", "your_database_name_here");
				if (!$connection) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM facilities";
				$result = mysqli_query($connection, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['FID'] . "</td>";
						echo "<td>" . $row['FName'] . "</td>";
						echo "<td>" . $row['FAddress'] . "</td>";
						echo "<td>" . $row['City'] . "</td>";
						echo "<td>" . $row['Province'] . "</td>";
						echo "<td>" . $row['PostalCode'] . "</td>";
						echo "<td>" . $row['Type'] . "</td>";
						echo "<td>" . $row['Capacity'] . "</td>";
						echo "<td>" . $row['Phone'] . "</td>";
						echo "<td>" . $row['Website'] . "</td>";
						echo "<td>";
						echo "<button onclick=\"displayFacility('" . $row['FID'] . "')\">Display</button>";
						echo "<button onclick=\"editFacility('" . $row['FID'] . "')\">Edit</button>";
						echo "<button onclick=\"deleteFacility('" . $row['FID'] . "')\">Delete</button>";
						echo "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='11'>No facilities found</td></tr>";
				}

				mysqli_close($connection);
			?> -->
	
		</tbody>
		<tfoot>
			<tr>
			  <td colspan="3">
				<button class="button create-button">Add</button>
				<button class="button edit-button">Edit</button>
				<button class="button delete-button">Delete</button>
			  </td>
			</tr>
		  </tfoot>
	</table>
	
	</html>