<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT f.FName, f.FAddress, r.City, r.Province, r.PostalCode, f.Phone, f.Website, f.Type, f.Capacity, CONCAT(Employees.FirstName, ' ', Employees.LastName) AS GeneralManagerName,
    COUNT(Employed.EID) AS NumEmployees
    FROM Facilities f
    INNER JOIN Region r ON f.PostalCode = r.PostalCode
    LEFT JOIN Employed ON f.FID = Employed.FID
    LEFT JOIN Manager ON f.FID = Manager.FID
    LEFT JOIN Employees ON Manager.EID = Employees.EID
    GROUP BY f.FID
    ORDER BY r.Province, r.City, f.Type, NumEmployees ASC";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("6.php", ["title" => "6 - Detail of facilities", "records" => $records]);
}
?>