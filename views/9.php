<h1>Infected Doctors</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Infection</th>
                <th>Current Workplace</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["FirstName"] ?></td>
                <td class="cell"><?= $record["LastName"] ?></td>
                <td class="cell"><?= $record["InfectionDate"] ?></td>
                <td class="cell"><?= $record["FName"] ?></td>
            </tr>

            <?php endforeach ?>
        </tbody>

    </table>