<!DOCTYPE html>
<html>
<head>
<title>Working Nurse(s) with Highest Hours Worked</title>
</head>
<body>
	<h1>Nurse Details</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date of Birth</th>
				<th>Email Address</th>
				<th>First Day of Work As Nurse</th>
				<th>Total Hours Scheduled As Nurse</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($records as $record): ?>

			<tr class="table">
			<td class="cell"><?= $record["FirstName"] ?></td>
			<td class="cell"><?= $record["LastName"] ?></td>
			<td class="cell"><?= $record["DoB"] ?></td>
			<td class="cell"><?= $record["Email"] ?></td>
			<td class="cell"><?= $record["FirstDayAsNurse"] ?></td>
			<td class="cell"><?= $record["TotalHoursScheduledAsNurse"] ?></td>
			</tr>

			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
