<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT FirstName, LastName, R.City, COUNT(Em.FID) AS TotalWorkingFacilities
            FROM Employees E
            JOIN Employed Em ON E.EID = Em.EID
            JOIN Facilities F ON F.FID = Em.FID
            JOIN Region R ON R.PostalCode = F.PostalCode
            WHERE R.Province = \"QC\" AND Em.EndDate IS NULL AND Role = \"Doctor\"
            GROUP BY E.EID
            ORDER BY R.City ASC, TotalWorkingFacilities DESC;";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("14.php", ["title" => "14 - Working Doctor(s) in Quebec", "records" => $records]);
}
?>