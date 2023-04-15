<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT Province, FName, Capacity, COUNT(E.EID) AS TotalInfected
            FROM Facilities F
            JOIN Employed E ON F.FID = E.FID
            JOIN Infected I ON E.EID = I.EID
            JOIN Region r ON r.PostalCode = F.PostalCode
            WHERE InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND E.EndDate IS NULL
            GROUP BY F.FID
            ORDER BY Province, TotalInfected;
            ";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("13.php", ["title" => "13 - Facilities with Infected Employees During Last 2 Weeks", "records" => $records]);
}
?>