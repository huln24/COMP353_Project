<h1>Facilities with Employees Infected During Last 2 Weeks</h1>
    <table>
        <thead>
            <tr>
                <th>Province</th>
                <th>Facility Name</th>
				<th>Capacity</th>
                <th>Total Employees Infected</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["Province"] ?></td>
                <td class="cell"><?= $record["FName"] ?></td>
				<td class="cell"><?= $record["Capacity"] ?></td>
                <td class="cell"><?= $record["TotalInfected"] ?></td>

            </tr>
            <?php endforeach ?>
		</tbody>
	</table>