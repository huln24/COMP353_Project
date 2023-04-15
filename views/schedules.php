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
        <tr>
            <form action="schedules.php" method="POST">
                <input type="hidden" name="action" value="add">
                <td>
                    <select id="employees" name="employee" required>
                        <?php foreach ($e_choices as $choice): ?>
                        <option value="<?= $choice['EID'] ?>"><?= $choice['EID'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select id="facilities" name="facility" required>
                        <?php foreach ($f_choices as $choice): ?>
                        <option value="<?= $choice['FID'] ?>"><?= $choice['FID'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="datetime-local" id="start" name="start" required>
                </td>
                <td>
                    <input type="datetime-local" id="end" name="end" required>
                </td>

                <td>
                    <button type="submit" class="button create-button">Add</button>
                </td>
            </form>
        </tr>

        <?php foreach ($records as $record): ?>
            <tr class="table">
                <td class="cell"><?= $eid = $record["EID"] ?></td>
                <td class="cell"><?= $fid = $record["FID"] ?></td>
                <td class="cell"><?= $startdatetime = $record["StartDateTime"] ?></td>
                <td class="cell"><?= $record["EndDateTime"] ?></td>
                <td colspan="3">
                        <form action="schedules.php" method="PATCH">
                            <button class="button edit-button">Edit</button>
                        </form>
                        <form action="schedules.php" method="POST">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="key" value="<?= $eid?>,<?= $fid?>,<?= $startdatetime?>">
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