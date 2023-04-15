    <h2>Facilities</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>PostalCode</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>Phone Number</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <button class="button create-button">Add</button>
            </td>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["FName"] ?></td>
                <td class="cell"><?= $record["FAddress"] ?></td>
                <td class="cell"><?= $record["City"] ?></td>
                <td class="cell"><?= $record["Province"] ?></td>
                <td class="cell"><?= $record["PostalCode"] ?></td>
                <td class="cell"><?= $record["Type"] ?></td>
                <td class="cell"><?= $record["Capacity"] ?></td>
                <td class="cell"><?= $record["Phone"] ?></td>
                <td class="cell"><?= $record["Website"] ?></td>
                <td colspan="3">
                    <button class="button edit-button">Edit</button>
                    <button class="button delete-button">Delete</button>
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>