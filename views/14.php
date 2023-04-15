<h1>Working Doctor(s) in Quebec</h1>
	<table>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>City</th>
				<th>Total Facilities Working For</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($records as $record): ?>

			<tr class="table">
			<td class="cell"><?= $record["FirstName"] ?></td>
			<td class="cell"><?= $record["LastName"] ?></td>
			<td class="cell"><?= $record["City"] ?></td>
			<td class="cell"><?= $record["TotalWorkingFacilities"] ?></td>
			</tr>

			<?php endforeach ?>
		</tbody>
	</table>
