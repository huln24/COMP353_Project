<h2>Work Schedules</h2>
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