<?php
include "utilities/helpers.php";

// connect to server
$conn = connect();  

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'] ?? "nothing";

    if ($action == 'add') {
        // get values
        $eid = $_POST['employee'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $fid = $_POST['facility'];

        $query = "insert into WorkSchedule(EID, FID, StartDateTime, EndDateTime) values(?,?,?,?)";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'iiss', $eid, $fid, $start, $end);
        
        // execute query
        $success = mysqli_stmt_execute($stmt);

        if($success) {
            $alert = "Added succesfully!";
        }
        else {
            $alert = "Unable to add. Error occured!";
        }
    }
}

    // "SELECT i.EID, FirstName, LastName, VaccineType, DoseNumber, Date, FName from Injections i JOIN Employees e ON e.EID = i.EID JOIN Facilities f ON f.FID = i.FID"
    $eid = "select EID from Employees";
    $fid = "select FID from Facilities";

    // get query result
    $result = mysqli_query($conn, "SELECT * from WorkSchedule"); 
    $e_result = mysqli_query($conn, $eid); 
    $f_result = mysqli_query($conn, $fid); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $e_choices = mysqli_fetch_all($e_result, MYSQLI_ASSOC);
    $f_choices = mysqli_fetch_all($f_result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("schedules.php", ["title" => "Work Schedules", "records" => $records, "e_choices" => $e_choices, "f_choices" => $f_choices, "alert" => $alert]);


?>