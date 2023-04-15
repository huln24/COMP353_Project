<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $result = mysqli_query($conn, "SELECT FID, FName FROM Facilities"); 

    // query result
    $choices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("12.php", ["title" => "12 - Hours Scheduled For Roles in Facility", "choices" => $choices]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    // connect to server
    $conn = connect();  
    
    $option = explode('|', $_POST['facility']) ?? "nothing";

    if ($option != "nothing") {

        $id = $option[0];

        $query = "SELECT Role, SUM(TIMESTAMPDIFF(HOUR, w.StartDateTime, w.EndDateTime)) AS TotalScheduledHours
                FROM WorkSchedule w
                JOIN Employed e ON w.FID = e.FID
                WHERE w.StartDateTime BETWEEN '2000-01-01' AND '2023-04-14'
                    AND e.EID = w.EID
                    AND e.FID = ?
                GROUP BY Role
                ORDER BY Role ASC;
                ";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'i', $id);

        // execute query
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        // dump($result);

        // result to array
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $fname = $option[1];
    }

        // query result
        $result = mysqli_query($conn, "SELECT FID, FName FROM Facilities"); 

        // result to array
        $choices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("12.php", ["title" => "12 - Hours Scheduled For Roles in Facility", "records" => $records, "choices" => $choices, "fname" => $fname]);
}
?>