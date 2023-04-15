<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $fname = "";
    $lname = "";

    // connect to server
    $conn = connect();  

    // query result
    $result = mysqli_query($conn, "SELECT EID, FirstName, LastName FROM Employees"); 

    // result to array
    $choices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("8.php", ["title" => "8 - Employee Schedule", "choices" => $choices, "fname" => $fname, "lname" => $lname]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = "";
    $lname = "";
    // connect to server
    $conn = connect();  
    
    $option = explode('|', $_POST['employee']) ?? "nothing";

    if ($option != "nothing") {

        $id = $option[0];
        $start = $_POST['start_date'];
        $end = $_POST['end_date'];

        $query = "SELECT Facilities.FName, DAYOFYEAR(WorkSchedule.StartDateTime) AS DayOfYear, WorkSchedule.StartDateTime, WorkSchedule.EndDateTime
        FROM WorkSchedule
        JOIN Employees ON WorkSchedule.EID = Employees.EID
        JOIN Facilities ON WorkSchedule.FID = Facilities.FID
        WHERE Employees.EID = ?
        AND WorkSchedule.StartDateTime BETWEEN ? AND ?
        ORDER BY Facilities.FName ASC, DayOfYear ASC, WorkSchedule.StartDateTime ASC;";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'iss', $id, $start, $end);

        // execute query
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        // result to array
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $fname = $option[1];
        $lname = $option[2];
    }

    // query result
    $result = mysqli_query($conn, "SELECT EID, FirstName, LastName FROM Employees"); 

    // result to array
    $choices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("8.php", ["title" => "8 - Employee Schedule", "choices" => $choices, "records" => $records,"fname" => $fname, "lname" => $lname]);
}

?>