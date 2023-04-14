<!DOCTYPE html>
<html>
<head>
	<title>Facility Schedule by Role</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}
		th {
			background-color: #F2F2F2;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<h1>Facility Schedule by Role</h1>
	<h2>Facility: [Facility Name]</h2>
	<h3>Period: [Start Date] - [End Date]</h3>
	<table>
		<thead>
			<tr>
				<th>Role</th>
				<th>Total Hours Scheduled</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Doctor</td>
				<td>[Total Doctor Hours]</td>
			</tr>
			<tr>
				<td>Nurse</td>
				<td>[Total Nurse Hours]</td>
			</tr>
			<tr>
				<td>Other</td>
				<td>[Total Other Hours]</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
