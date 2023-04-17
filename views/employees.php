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
        <tr>
            <form action="employees.php" method="POST">
                <input type="hidden" name="action" value="add">
                <td>
                    <input type="hidden" required>
                </td>
                <td>
                    <input type="text" id="fname" name="fname" required>
                </td>
                <td>
                    <input type="text" id="lname" name="lname" required>
                </td>
                <td>
                    <input type="text" id="medicare" name="medicare" required>
                </td>
                <td>
                    <input type="date" id="dob" name="dob" required>
                </td>
                <td>
                    <input type="text" id="address" name="address" required>
                </td>
                <td>
                    <input type="text" id="city" name="city" required>
                </td>
                <td>
                    <input type="text" id="province" name="province" required>
                </td>
                <td>
                    <input type="text" id="postal" name="postal" required>
                </td>
                <td>
                    <input type="text" id="phone" name="phone" required>
                </td>
                <td>
                    <input type="text" id="email" name="email" required>
                </td>
                <td>
                    <input type="text" id="citizen" name="citizen" required>
                </td>
                <td>
                    <button type="submit" class="button create-button">Add</button>
                </td>
            </form>
        </tr>

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

<?php if (!empty($alert)): ?>
<div>
    <script>
        alert('<?= $alert ?>')
    </script>
</div>
<?php endif; ?>