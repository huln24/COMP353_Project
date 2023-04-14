<!DOCTYPE html>

<html>
 <head> 
      <title>Employees Table</title>
 <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  tr:hover {background-color: #f5f5f5;}

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
      <th>EID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Medicare</th>
      <th>DoB</th>
      <th>Address</th>
      <th>Postal Code</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Citizenship</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tr>
    <td class="cell_top">Employee ID</td>
    <td class="cell_top">First Name</td>
    <td class="cell_top">Last Name</td>
</tr>

<?php foreach ($records as $record): ?>

<tr class="table">
    <td class="cell"><?= $record["EID"] ?></td>
    <td class="cell"><?= $record["FirstName"] ?></td>
    <td class="cell"><?= $record["LastName"] ?></td>

</tr>

<?php endforeach ?>

  <tbody>
   
    <!-- <?php
    Replace the following with your own code to retrieve data from the database
    $employees = [
      [
        'EID' => 1,
        'FirstName' => 'John',
        'LastName' => 'Doe',
        'Medicare' => '123456789',
        'DoB' => '1990-01-01',
        'Address' => '123 Main St',
        'PostalCode' => 'A1A 1A1',
        'Phone' => '555-555-5555',
        'Email' => 'johndoe@example.com',
        'Citizenship' => 'Canada'
      ],
      [
        'EID' => 2,
        'FirstName' => 'Jane',
        'LastName' => 'Smith',
        'Medicare' => '987654321',
        'DoB' => '1995-02-15',
        'Address' => '456 Oak St',
        'PostalCode' => 'B2B 2B2',
        'Phone' => '555-123-4567',
        'Email' => 'janesmith@example.com',
        'Citizenship' => 'USA'
      ]
    ];
    
    foreach ($employees as $employee) {
      echo '<tr>';
      echo '<td>' . $employee['EID'] . '</td>';
      echo '<td>' . $employee['FirstName'] . '</td>';
      echo '<td>' . $employee['LastName'] . '</td>';
      echo '<td>' . $employee['Medicare'] . '</td>';
      echo '<td>' . $employee['DoB'] . '</td>';
      echo '<td>' . $employee['Address'] . '</td>';
      echo '<td>' . $employee['PostalCode'] . '</td>';
      echo '<td>' . $employee['Phone'] . '</td>';
      echo '<td>' . $employee['Email'] . '</td>';
      echo '<td>' . $employee['Citizenship'] . '</td>';
      echo '<td>
              <a href="#">Edit</a>
              <a href="#">Delete</a>
              <a href="#">View</a>
            </td>';
      echo '</tr>';
    }
    ?> -->
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">
      <button class="button create-button">Add</button>
      <button class="button edit-button">Edit</button>
      <button class="button delete-button">Delete</button>
      </td>
    </tr>
    </tfoot>
</table>

</html>
