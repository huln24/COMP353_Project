<h2>Manager</h2>
<?php if (!empty($alert)): ?>
<div><script>alert('<?= $alert ?>')</script></div>
<?php endif; ?>

<table class="table">
    
    <tr>
        <td class="cell_top">Employee ID</td>
        <td class="cell_top">Facility ID</td>
    </tr>
    <?php foreach ($records as $record): ?>
    
    <tr class="table">
        <td class="cell"><?= $record["EID"] ?></td>
        <td class="cell"><?= $record["FID"] ?></td>
        <td>
            <button><a href="">Update</a></button>
            <button><a href="test.php?action=delete&id=<?= $record["EID"]?>">Delete</a></button>
        </td>
    </tr>
    
    <?php endforeach ?>
    
</table>

<form action="test.php" method="post">
    <label for="eid">EID:</label>
    <input type="number" id="eid" name="eid" value>
    <label for="fid">FID:</label>
    <input type="number" id="fid" name="fid">
    <button type="submit">Add</button>
</form>