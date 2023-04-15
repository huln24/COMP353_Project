<?php
include "utilities/helpers.php";

$conn = connect();  

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $action = $_POST['action'] ?? "nothing";

    if ($action == "delete") {
        // get values
        $eid = $_POST['eid'];
        
        // prepare query
        $stmt = mysqli_prepare($conn, "DELETE FROM Employees Where EID = ?;");
        
        mysqli_stmt_bind_param($stmt, 's', $eid);

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
    $result = mysqli_query($conn, "SELECT * from Employees f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("employees.php", ["title" => "Employees", "records" => $records, "alert" => $alert]);
?>