<h1>Hours Scheduled for Roles in Facility</h1>
<p>Select "Vancouver General Hospital" for 5 tuples.</p>        
        <form action="12.php" method="POST">
            <label for="facilities">Choose a Facility:</label>
            <select id="facilities" name="facility">
                <?php foreach ($choices as $choice): ?>
                <option value="<?= $choice['FID'] ?>|<?= $choice['FName'] ?>"><?= $choice['FName'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="GO" value="Go" />
        </form>
                </br>
    <table>
        <thead>
            <tr>
                <th>Role</th>
                <th>Total Scheduled Hours</th>
            </tr>
        </thead>
            <?php 
			$chosen = isset($records);
			if ($chosen):?>
        <tbody>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["Role"] ?></td>
                <td class="cell"><?= $record["TotalScheduledHours"] ?></td>
            </tr>

            <?php endforeach ?>
            </tbody>
            <?php endif; ?>
        </table>