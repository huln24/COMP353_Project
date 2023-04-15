<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT FirstName, LastName, InfectionDate, FName
    FROM Employees e
    JOIN Employed w ON w.EID = e.EID
    JOIN Infected i ON w.EID = i.EID AND i.EID = e.EID
    JOIN Facilities f ON w.FID = f.FID
    WHERE
        Role = 'doctor' AND
        InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND
        w.EID = e.EID AND EndDate IS NULL
    ORDER BY FName ASC, FirstName ASC;
    ";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("9.php", ["title" => "9 - Doctors infected by COVID-19", "records" => $records]);
}
?>