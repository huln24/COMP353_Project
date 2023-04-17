<h1>List of Doctors and Nurses on Schedule on the last 2 weeks</h1>
    <h2><?= $fname ?></h2>
    <form action="11.php" method="POST">
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <?php 
			$chosen = isset($records);
			if ($chosen):?>
        <tbody>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["FirstName"] ?></td>
                <td class="cell"><?= $record["LastName"] ?></td>
                <td class="cell"><?= $record["Role"] ?></td>
            </tr>

            <?php endforeach ?>
        </tbody>
        <?php endif; ?>
    </table>