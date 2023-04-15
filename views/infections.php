<h1>Infection Types</h1>
<table>
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Infection Date</th>
            <th>Infection Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <td>
            <button class="button create-button">Add</button>
        </td>

        <?php foreach ($records as $record): ?>

        <tr class="table">
            <td class="cell"><?= $record["EID"] ?></td>
            <td class="cell"><?= $record["InfectionDate"] ?></td>
            <td class="cell"><?= $record["InfectionType"] ?></td>
            <td colspan="2">
                <button class="button edit-button">Edit</button>
                <button class="button delete-button">Delete</button>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>
</table>