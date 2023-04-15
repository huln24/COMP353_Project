<?php
include "utilities/helpers.php";

// connect to server
$conn = connect();

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'] ?? "nothing";

    if ($action == "delete") {
        // get values
        $key_arr = preg_split ("/\,/", $_POST['key']);
        
        // prepare query
        $stmt = mysqli_prepare($conn, "DELETE FROM WorkSchedule Where EID = ? AND FID = ? AND StartDateTime = ?;");
        
        mysqli_stmt_bind_param($stmt, 'sss', $key_arr[0], $key_arr[1], $key_arr[2]);

        // execute query
        $success = mysqli_stmt_execute($stmt);

        if($success) {
            $alert = "Deleted succesfully!";
        }
        else {
            $alert = "Unable to delete. Error occured!";
        }
    }
}

    // get query result
    $result = mysqli_query($conn, "SELECT * from WorkSchedule"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("schedules.php", ["title" => "Work Schedules", "records" => $records, "alert" => $alert]);

?>