<h2>Employees</h2>
<?php if (!empty($alert)): ?>
<div>
    <script>
    alert('<?= $alert ?>')
    </script>
</div>
<?php endif; 
?>
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
            <td class="cell"><?= $eid = $record["EID"] ?></td>
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
                    <form action="employees.php" method="PATCH">
                        <button class="button edit-button">Edit</button>
                    </form>
                    <form action="employees.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="eid" value="<?= $eid?>">
                        <button type="submit" class="button delete-button">Delete</button>
                    </form>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>
</table>