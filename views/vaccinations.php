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

th {
    background-color: #4CAF50;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

.create-button {
    background-color: #008CBA;
}

.edit-button {
    background-color: #f44336;
}

.delete-button {
    background-color: #555555;
}
</style>
</head>
<h2>Vaccinations</h2>
<?php if (!empty($alert)): ?>
<div>
    <script>
    alert('<?= $alert ?>')
    </script>
</div>
<?php endif; ?>

<body>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Vaccine Type</th>
                <th>Dose Number</th>
                <th>Date</th>
                <th>Facility ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="vaccinations.php" method="PUT">
                    <td>
                        <select id="employees" name="employee">
                            <?php foreach ($e_choices as $choice): ?>
                            <option value="<?= $choice['EID'] ?>"><?= $choice['EID'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select id="vaccines" name="vaccine">
                            <?php foreach ($v_choices as $choice): ?>
                            <option value="<?= $choice['VaccineType'] ?>"><?= $choice['VaccineType'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" id="dose" name="dose">
                    </td>
                    <td>
                        <input type="date" id="date" name="date">
                    </td>
                    <td>
                        <select id="facilities" name="facility">
                            <?php foreach ($f_choices as $choice): ?>
                            <option value="<?= $choice['FID'] ?>"><?= $choice['FID'] ?></option>
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
                <td class="cell"><?= $record["VaccineType"] ?></td>
                <td class="cell"><?= $record["DoseNumber"] ?></td>
                <td class="cell"><?= $record["Date"] ?></td>
                <td class="cell"><?= $record["FID"] ?></td>
                <td>
                    <form action="vaccinations.php" method="PATCH">
                        <button class="button edit-button">Edit</button>
                    </form>
                    <form action="vaccinations.php" method="DELETE">
                        <button class="button delete-button">Delete</button>
                    </form>
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>