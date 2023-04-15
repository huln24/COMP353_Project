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
        $stmt = mysqli_prepare($conn, "DELETE FROM Infected Where EID = ? AND InfectionDate = ?;");
        
        mysqli_stmt_bind_param($stmt, 'ss', $key_arr[0], $key_arr[1]);

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

    // query result
    $result = mysqli_query($conn, "SELECT * from Infected"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("infections.php", ["title" => "Infections", "records" => $records, "alert" => $alert]);

?>