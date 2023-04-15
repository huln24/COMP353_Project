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
        <tr>
            <form action="infections.php" method="POST">
                <input type="hidden" name="action" value="add">
                <td>
                    <select id="employees" name="employee" required>
                        <?php foreach ($e_choices as $choice): ?>
                        <option value="<?= $choice['EID'] ?>"><?= $choice['EID'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="date" id="date" name="date" required>
                </td>
                <td>
                    <select id="infections" name="infection" required>
                        <?php foreach ($i_choices as $choice): ?>
                        <option value="<?= $choice['InfectionType'] ?>"><?= $choice['InfectionType'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <button type="submit" class="button create-button">Add</button>
                </td>
            </form>
        </tr>

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

<?php if (!empty($alert)): ?>
<div>
    <script>
    alert('<?= $alert ?>')
    </script>
</div>
<?php endif; ?>