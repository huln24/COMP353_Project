<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $fname = "";

    // connect to server
    $conn = connect();  

    // query result
    $result = mysqli_query($conn, "SELECT FID, FName FROM Facilities"); 

    // result to array
    $choices = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //dump($choices);

    // disconnect from server
    disconnect($conn);  

    render("10.php", ["title" => "10 - Facility Email Log", "choices" => $choices, "fname" => $fname]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = "";
    
    // connect to server
    $conn = connect();  
    
    $option = explode('|', $_POST['facility']) ?? "nothing";

    if ($option != "nothing") {

        $id = $option[0];

        $query = "SELECT Date, Subject, Body
        FROM EmailLogs
        WHERE FID = ?
        ORDER BY Date ASC;";

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

    render("10.php", ["title" => "10 - Facility Email Log", "records" => $records, "choices" => $choices, "fname" => $fname]);
}

?>