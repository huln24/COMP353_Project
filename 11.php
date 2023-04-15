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

    render("11.php", ["title" => "11 - Doctors and Nurses", "choices" => $choices, "fname" => $fname]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = "";
    
    // connect to server
    $conn = connect();  
    
    $option = explode('|', $_POST['facility']) ?? "nothing";

    if ($option != "nothing") {

        $id = $option[0];

        $query = "SELECT FirstName, LastName, Role
        FROM WorkSchedule w
        JOIN Employed e ON w.FID = e.FID AND w.EID = e.EID
        JOIN Employees ON w.EID = Employees.EID
        WHERE Role in ('doctor', 'nurse') AND StartDateTime BETWEEN DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND CURDATE() AND w.FID = ?
        ORDER BY Role ASC, FirstName ASC";

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

    render("11.php", ["title" => "11 - Doctors and Nurses", "records" => $records, "choices" => $choices, "fname" => $fname]);
}

?>