<h2>Work Schedules</h2>
<table>
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Facility ID</th>
            <th>Start Date and Time</th>
            <th>End Date and Time</th>
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
            <td class="cell"><?= $record["FID"] ?></td>
            <td class="cell"><?= $record["StartDateTime"] ?></td>
            <td class="cell"><?= $record["EndDateTime"] ?></td>
            <td colspan="3">
                <button class="button edit-button">Edit</button>
                <button class="button delete-button">Delete</button>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>
</table>