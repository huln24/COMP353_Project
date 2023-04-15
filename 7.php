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

    render("7.php", ["title" => "7 - Facility Employees", "choices" => $choices, "fname" => $fname]);
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = "";
    
    // connect to server
    $conn = connect();  
    
    $option = explode('|', $_POST['facility']) ?? "nothing";

    if ($option != "nothing") {

        $id = $option[0];

        $query = "SELECT Employees.FirstName, Employees.LastName, Employed.StartDate, Employees.DoB, Employees.Medicare, Employees.Phone, Employees.Address, Region.City, Region.Province, Region.PostalCode, Employees.Citizenship, Employees.Email, Employed.Role
        FROM Employees
        INNER JOIN Employed ON Employees.EID = Employed.EID
        INNER JOIN Facilities ON Employed.FID = Facilities.FID
        INNER JOIN Region ON Facilities.PostalCode = Region.PostalCode
        WHERE Facilities.FID = ?
        ORDER BY Employed.Role ASC, Employees.FirstName ASC, Employees.LastName ASC
        ";

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

    render("7.php", ["title" => "Facility Empoyees", "records" => $records, "choices" => $choices, "fname" => $fname]);
}

?>