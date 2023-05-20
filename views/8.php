<h2>Schedule Details: <?= $fname ?> <?= $lname ?></h2>
<?php if (!empty($start) and !empty($end)): ?>
<h3>Between: <?= $start ?> and <?= $end ?></h3>
<?php endif; ?>

<form action="8.php" method="POST">
    <label for="employees">Employee:</label>
    <select id="employees" name="employee">
        <?php foreach ($choices as $choice): ?>
        <option value="<?= $choice['EID'] ?>|<?= $choice['FirstName'] ?>|<?= $choice['LastName']?>">
            <?= $choice['EID'] ?> <?= $choice['FirstName'] ?> <?= $choice['LastName']?></option>
        <?php endforeach; ?>
    </select>
    <label for="start_date">From:</label>
    <input type="date" id="start_date" name="start_date" required>
    <label for="end_date">To:</label>
    <input type="date" id="end_date" name="end_date" required><br><br>
    <input type="submit" value="Search">
</form>
</br>
<table>
    <thead>
        <tr>
            <th>Facility</th>
            <th>Day of year</th>
            <th>Start Date Time</th>
            <th>End Date Time</th>
        </tr>
    </thead>
    <?php 
			$chosen = isset($records);
			if ($chosen):?>
    <tbody>
        <?php foreach ($records as $record): ?>

        <tr class="table">
            <td class="cell"><?= $record["FName"] ?></td>
            <td class="cell"><?= $record["DayOfYear"] ?></td>
            <td class="cell"><?= $record["StartDateTime"] ?></td>
            <td class="cell"><?= $record["EndDateTime"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <?php endif; ?>
</table>