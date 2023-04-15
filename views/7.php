<h2>Employees Working in <?= $fname ?></h2>
        <form action="7.php" method="POST">
            <label for="facilities">Choose a Facility:</label>
            <select id="facilities" name="facility">
                <?php foreach ($choices as $choice): ?>
                <option value="<?= $choice['FID'] ?>|<?= $choice['FName'] ?>"><?= $choice['FName'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="GO" value="Go" />
        </form>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Start Date of Work</th>
                    <th>Date of Birth</th>
                    <th>Medicare Card Number</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Citizenship</th>
                    <th>Email Address</th>
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
                    <td class="cell"><?= $record["StartDate"] ?></td>
                    <td class="cell"><?= $record["DoB"] ?></td>
                    <td class="cell"><?= $record["Medicare"] ?></td>
                    <td class="cell"><?= $record["Phone"] ?></td>
                    <td class="cell"><?= $record["Address"] ?></td>
                    <td class="cell"><?= $record["City"] ?></td>
                    <td class="cell"><?= $record["Province"] ?></td>
                    <td class="cell"><?= $record["PostalCode"] ?></td>
                    <td class="cell"><?= $record["Citizenship"] ?></td>
                    <td class="cell"><?= $record["Email"] ?></td>
                    <td class="cell"><?= $record["Role"] ?></td>
                </tr>

                <?php endforeach ?>
            </tbody>
            <?php endif; ?>
        </table>