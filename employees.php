<?php
include "helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $conn = connect();
    $rows = $conn ->query("SELECT * from Employees");
    disconnect($conn);
    $records = [];
    foreach ($rows as $row)
    {
        $records[] = [
            "eid" => $row["EID"],
            "fname" => $row["FirstName"],
            "lname" => $row["LastName"]
        ];
    }
    render("employees.php", ["title" => "Employees", "records" => $records]);
}

?>