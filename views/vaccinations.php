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
				<th>EID</th>
				<th>Vaccine Type</th>
				<th>Dose Number</th>
				<th>Date</th>
				<th>FID</th>
			</tr>
		</thead>
		<tbody>

		<?php foreach ($records as $record): ?>

		<tr class="table">
    	<td class="cell"><?= $record["EID"] ?></td>
    	<td class="cell"><?= $record["VaccineType"] ?></td>
    	<td class="cell"><?= $record["DoseNumber"] ?></td>
		<td class="cell"><?= $record["Date"] ?></td>
    	<td class="cell"><?= $record["FID"] ?></td>
		</tr>

		<?php endforeach ?>

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
