<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>

<body>
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