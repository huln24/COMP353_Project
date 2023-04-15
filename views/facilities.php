<h2>Facilities</h2>
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
                <th>FID</th>
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
            <tr>
                <form action="facilities.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <td>
                        <input type="text" id="fname" name="fname" required>
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
                        <input type="text" id="type" name="type" required>
                    </td>
                    <td>
                        <input type="number" id="capacity" name="capacity" required>
                    </td>
                    <td>
                        <input type="text" id="phone" name="phone" required>
                    </td>
                    <td>
                        <input type="text" id="website" name="website" required>
                    </td>
                    <td>
                        <button type="submit" class="button create-button">Add</button>
                    </td>
                </form>
            </tr>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $fid = $record["FID"] ?></td>
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
                    <form action="facilities.php" method="PATCH">
                        <button class="button edit-button">Edit</button>
                    </form>
                    <form action="facilities.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="fid" value="<?= $fid?>">
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