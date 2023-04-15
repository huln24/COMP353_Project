<h1>Working Nurse(s) or Doctor(s) - Infected At Least 3 Times</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date of Birth</th>
				<th>Email Address</th>
				<th>Role</th>
				<th>First Day of Work As Nurse or Doctor</th>
				<th>Total Hours Scheduled</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($records as $record): ?>

			<tr class="table">
			<td class="cell"><?= $record["FirstName"] ?></td>
			<td class="cell"><?= $record["LastName"] ?></td>
			<td class="cell"><?= $record["DoB"] ?></td>
			<td class="cell"><?= $record["Email"] ?></td>
			<td class="cell"><?= $record["Role"] ?></td>
			<td class="cell"><?= $record["FirstDayAsNurseOrDoctor"] ?></td>
			<td class="cell"><?= $record["TotalHoursScheduled"] ?></td>
			</tr>

			<?php endforeach ?>
		</tbody>
	</table>
