<?php
include "helpers.php";


if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    // get query result
    $result = mysqli_query($conn, "SELECT * from WorkSchedule"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("schedules.php", ["title" => "Work Schedules", "records" => $records]);
}
// else if ($_SERVER["REQUEST_METHOD" = "POST"])
// {

// }

?>