<!DOCTYPE html>
<html>
<head>
	<title>Vaccine Table</title>
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
<h2>Vaccinations</h2>
<body>
	<table>
		<thead>
			<tr>
				<th>Vaccine Type</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<!-- Table rows for data entries will be added here -->
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
			<!-- <?php
				// Connect to database and retrieve vaccine data
				$connection = mysqli_connect('localhost', 'username', 'password', 'database_name');
				$query = "SELECT VaccineType FROM Vaccine";
				$result = mysqli_query($connection, $query);

				// Display vaccine data in HTML table
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['VaccineType'] . "</td>";
						echo "<td>";
						echo "<a href='display_vaccine.php?vaccineType=" . $row['VaccineType'] . "'><button>Display</button></a>";
						echo "<a href='edit_vaccine.php?vaccineType=" . $row['VaccineType'] . "'><button>Edit</button></a>";
						echo "<button onclick=\"deleteVaccine('" . $row['VaccineType'] . "')\">Delete</button>";
						echo "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='2'>No vaccines found</td></tr>";
				}

				mysqli_close($connection);
			?> -->
	
	<script>
		function deleteVaccine(vaccineType) {
			if (confirm("Are you sure you want to delete this vaccine?")) {
				window.location.href = "delete_vaccine.php?vaccineType=" + vaccineType;
			}
		}
	</script>
</body>
</html>
