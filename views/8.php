<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
</head>

<body>
    <h2>Schedule Details: <?= $fname ?> <?= $lname ?></h2>
    <form action="8.php" method="POST">
        <label for="employees">Employee:</label>
        <select id="employees" name="employee">
            <?php foreach ($choices as $choice): ?>
            <option value="<?= $choice['EID'] ?>|<?= $choice['FirstName'] ?>|<?= $choice['LastName']?>">
                <?= $choice['EID'] ?> <?= $choice['FirstName'] ?> <?= $choice['LastName']?></option>
            <?php endforeach; ?>
        </select>
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
        <input type="submit" value="Search">
    </form>
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