<h2>Vaccinations</h2>
	<table>
		<thead>
			<tr>
				<th>EID</th>
				<th>Vaccine Type</th>
				<th>Dose Number</th>
				<th>Date</th>
				<th>FID</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>

		<td>
            <button class="button create-button">Add</button>
        </td>

		<?php foreach ($records as $record): ?>

		<tr class="table">
			<td class="cell"><?= $record["EID"] ?></td>
			<td class="cell"><?= $record["VaccineType"] ?></td>
			<td class="cell"><?= $record["DoseNumber"] ?></td>
			<td class="cell"><?= $record["Date"] ?></td>
			<td class="cell"><?= $record["FID"] ?></td>
			<td colspan="3">
					<button class="button edit-button">Edit</button>
					<button class="button delete-button">Delete</button>
			</td>
		</tr>

		<?php endforeach ?>
    </tbody>
</table>