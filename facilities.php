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
        $fid = $_POST['fid'];
        
        // prepare query
        $stmt = mysqli_prepare($conn, "DELETE FROM Facilities Where FID = ?;");
        
        mysqli_stmt_bind_param($stmt, 's', $fid);

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
    $result = mysqli_query($conn, "SELECT * from Facilities f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);
    
    render("facilities.php", ["title" => "Facilities", "records" => $records, "alert" => $alert]);

?>