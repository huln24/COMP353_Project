<?php
include "utilities/helpers.php";

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "PUT")
{
    // connect to server
    $conn = connect();
    echo "hello";
    // get values
    $eid = $_PUT['employee'];
    $vaccine = $_PUT['vaccine'];
    $dose = $_PUT['dose'];
    $date = $_PUT['date'];
    $fid = $_PUT['fid'];

    $query = "insert into Injections(EID, VaccineType, DoseNumber, Date, FID) values(?,?,?,?,?)";

    // prepare query
    $stmt = mysqli_prepare($conn, $query); 

    // bind query with chosen facility id
    mysqli_stmt_bind_param($stmt, 'isisi', $eid, $vaccine, $dose, $date, $fid);
    
    // execute query
    $succes = mysqli_stmt_execute($stmt);

    if($success) {
        $alert = "Added succesfully!";
    }
    else {
        $alert = "Unable to add. Error occured!";
    }
}
// else if ($_SERVER["REQUEST_METHOD"] == "DELETE")
// {
    
// }
// else if ($_SERVER["REQUEST_METHOD"] == "PATCH")
// {
    
// }

    // connect to server
    $conn = connect();  

    // "SELECT i.EID, FirstName, LastName, VaccineType, DoseNumber, Date, FName from Injections i JOIN Employees e ON e.EID = i.EID JOIN Facilities f ON f.FID = i.FID"
    $eid = "select EID from Employees";
    $vaccines = "select VaccineType from Vaccine";
    $fid = "select FID from Facilities";

    // query result
    $result = mysqli_query($conn, "SELECT * from Injections"); 
    $e_result = mysqli_query($conn, $eid); 
    $v_result = mysqli_query($conn, $vaccines); 
    $f_result = mysqli_query($conn, $fid); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $e_choices = mysqli_fetch_all($e_result, MYSQLI_ASSOC);
    $v_choices = mysqli_fetch_all($v_result, MYSQLI_ASSOC);
    $f_choices = mysqli_fetch_all($f_result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);
    
    render("vaccinations.php", ["title" => "Vaccination Record", "records" => $records, "e_choices" => $e_choices, "v_choices" => $v_choices, "f_choices" => $f_choices, "alert" => $alert]);

?>