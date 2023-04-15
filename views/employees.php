<h2>Employees</h2>
<table>
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Medicare No.</th>
            <th>Date of birth</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Postal Code</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Citizenship</th>
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
            <td class="cell"><?= $record["FirstName"] ?></td>
            <td class="cell"><?= $record["LastName"] ?></td>
            <td class="cell"><?= $record["Medicare"] ?></td>
            <td class="cell"><?= $record["DoB"] ?></td>
            <td class="cell"><?= $record["Address"] ?></td>
            <td class="cell"><?= $record["City"] ?></td>
            <td class="cell"><?= $record["Province"] ?></td>
            <td class="cell"><?= $record["PostalCode"] ?></td>
            <td class="cell"><?= $record["Phone"] ?></td>
            <td class="cell"><?= $record["Email"] ?></td>
            <td class="cell"><?= $record["Citizenship"] ?></td>
            <td colspan="2">
                <button class="button edit-button">Edit</button>
                <button class="button delete-button">Delete</button>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>
</table>