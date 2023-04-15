<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT DISTINCT FirstName, LastName, DoB, Email, Role,
            (SELECT MIN(StartDate) FROM Employed WHERE e.EID = EID AND (Role = \"Nurse\" OR Role = \"Doctor\")) AS FirstDayAsNurseOrDoctor,
	        (SELECT SUM(TIMESTAMPDIFF(Hour, StartDateTime, EndDateTime)) FROM WorkSchedule WHERE e.EID = EID) AS TotalHoursScheduled
            FROM Employees e
            INNER JOIN Employed em ON e.EID = em.EID
            WHERE (Role = \"Nurse\" OR Role = \"Doctor\") AND EndDate IS NULL AND e.EID IN (SELECT EID FROM Infected GROUP BY EID HAVING COUNT(*) >= 3)
            ORDER BY Role, FirstName, LastName";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("16.php", ["title" => "16 - Working Nurse(s) or Doctor(s) Infected At Least 3 Times", "records" => $records]);
}
?>