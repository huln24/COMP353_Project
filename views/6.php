    <h1>Detail of Facilities</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>Web Address</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>General Manager</th>
                <th>Employees</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($records as $record): ?>

            <tr class="table">
                <td class="cell"><?= $record["FName"] ?></td>
                <td class="cell"><?= $record["FAddress"] ?></td>
                <td class="cell"><?= $record["City"] ?></td>
                <td class="cell"><?= $record["Province"] ?></td>
                <td class="cell"><?= $record["PostalCode"] ?></td>
                <td class="cell"><?= $record["Phone"] ?></td>
                <td class="cell"><?= $record["Website"] ?></td>
                <td class="cell"><?= $record["Type"] ?></td>
                <td class="cell"><?= $record["Capacity"] ?></td>
                <td class="cell"><?= $record["GeneralManagerName"] ?></td>
                <td class="cell"><?= $record["NumEmployees"] ?></td>
            </tr>

            <?php endforeach ?>
        </tbody>

    </table>