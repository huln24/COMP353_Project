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
            <td class="cell"><?= $eid = $record["EID"] ?></td>
            <td class="cell"><?= $infection_date = $record["InfectionDate"] ?></td>
            <td class="cell"><?= $record["InfectionType"] ?></td>
            <td colspan="2">
                <form action="infections.php" method="PATCH">
                    <button class="button edit-button">Edit</button>
                </form>
                <form action="infections.php" method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="key" value="<?= $eid?>,<?= $infection_date?>">
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