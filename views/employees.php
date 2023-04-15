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


<h2>Employees</h2>
<table>
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Medicare No.</th>
            <th>Date of birth</th>
            <th>Address</th>
            <th>City</th>
            <th>Province</th>
            <th>Postal Code</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Citizenship</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <td>
            <button class="button create-button">Add</button>
        </td>

        <?php foreach ($records as $record): ?>

        <tr class="table">
            <td class="cell"><?= $record["EID"] ?></td>
            <td class="cell"><?= $record["FirstName"] ?></td>
            <td class="cell"><?= $record["LastName"] ?></td>
            <td class="cell"><?= $record["Medicare"] ?></td>
            <td class="cell"><?= $record["DoB"] ?></td>
            <td class="cell"><?= $record["Address"] ?></td>
            <td class="cell"><?= $record["City"] ?></td>
            <td class="cell"><?= $record["Province"] ?></td>
            <td class="cell"><?= $record["PostalCode"] ?></td>
            <td class="cell"><?= $record["Phone"] ?></td>
            <td class="cell"><?= $record["Email"] ?></td>
            <td class="cell"><?= $record["Citizenship"] ?></td>
            <td colspan="2">
                <button class="button edit-button">Edit</button>
                <button class="button delete-button">Delete</button>
            </td>
        </tr>

        <?php endforeach ?>
    </tbody>
</table>