<!DOCTYPE html>
<html>
<head>
	<title>Infection Types</title>
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
	<h1>Infection Types</h1>
	<table>
		<thead>
			<tr>
				<th>Infection Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<!-- PHP code to fetch and display infection types -->
			<!-- <?php
				$servername = "localhost";
				$username = "username";
				$password = "password";
				$dbname = "database_name";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				// Check connection
				if (!$conn) {
				  die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT InfectionType FROM Infection";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['InfectionType'] . "</td>";
						echo "<td>";
                            echo "<button class='button edit-button' onclick=\"editInfectionType('" . $row['InfectionType'] . "')\">Edit</button>";
                            echo "<button class='button delete-button' onclick=\"deleteInfectionType('" . $row['InfectionType'] . "')\">Delete</button>";
                            
						echo "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='2'>No infection types found</td></tr>";
				}

				mysqli_close($conn);
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
</body>
</html>
