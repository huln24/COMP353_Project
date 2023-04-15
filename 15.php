<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    $query = "SELECT DISTINCT *
            FROM Query15Helper
            WHERE TotalHoursScheduledAsNurse = (SELECT MAX(TotalHoursScheduledAsNurse) FROM Query15Helper)";

    // query result
    $result = mysqli_query($conn, $query); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("15.php", ["title" => "15 - Working Nurse(s) with Highest Total Hours Scheduled", "records" => $records]);
}
?>