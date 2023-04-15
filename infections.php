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
        $infection = $_POST['infection'];
        $date = $_POST['date'];

        $query = "insert into Infected(EID, InfectionDate, InfectionType) values(?,?,?)";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'iss', $eid, $date, $infection);
        
        // execute query
        $success = mysqli_stmt_execute($stmt);

        if($success) {
            $alert = "Added succesfully!";
        }
        else {
            $alert = "Unable to add. Error occured!";
        }
    }

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

    $eid = "select EID from Employees";
    $infections = "select InfectionType from Infections";

    // query result
    $result = mysqli_query($conn, "SELECT * from Infected"); 
    $e_result = mysqli_query($conn, $eid); 
    $i_result = mysqli_query($conn, $infections); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $e_choices = mysqli_fetch_all($e_result, MYSQLI_ASSOC);
    $i_choices = mysqli_fetch_all($i_result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("infections.php", ["title" => "Infections", "records" => $records, "e_choices" => $e_choices, "i_choices" => $i_choices, "alert" => $alert]);

?>