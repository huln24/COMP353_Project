<h2>Employees</h2>
<table class="table">
    
    <tr>
        <td class="cell_top">Employee ID</td>
        <td class="cell_top">First Name</td>
        <td class="cell_top">Last Name</td>
    </tr>
    <?php foreach ($records as $record): ?>
    
    <tr class="table">
        <td class="cell"><?= $record["eid"] ?></td>
        <td class="cell"><?= $record["fname"] ?></td>
        <td class="cell"><?= $record["lname"] ?></td>

    </tr>
    
    <?php endforeach ?>
    
</table>