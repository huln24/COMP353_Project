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
                <form action="vaccinations.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <td>
                        <select id="employees" name="employee" required>
                            <?php foreach ($e_choices as $choice): ?>
                            <option value="<?= $choice['EID'] ?>"><?= $choice['EID'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select id="vaccines" name="vaccine" required>
                            <?php foreach ($v_choices as $choice): ?>
                            <option value="<?= $choice['VaccineType'] ?>"><?= $choice['VaccineType'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" id="dose" name="dose" required>
                    </td>
                    <td>
                        <input type="date" id="date" name="date" required>
                    </td>
                    <td>
                        <select id="facilities" name="facility" required>
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
                <td class="cell"><?= $eid = $record["EID"] ?></td>
                <td class="cell"><?= $vaccine_type = $record["VaccineType"] ?></td>
                <td class="cell"><?= $dose_no = $record["DoseNumber"] ?></td>
                <td class="cell"><?= $record["Date"] ?></td>
                <td class="cell"><?= $record["FID"] ?></td>
                <td>
                <form action="vaccinations.php" method="PATCH">
                    <button class="button edit-button">Edit</button>
                </form>
                <form action="vaccinations.php" method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="key" value="<?= $eid?>,<?= $vaccine_type?>, <?= $dose_no?>">
                    <button type="submit" class="button delete-button">Delete</button>
                </form>
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>