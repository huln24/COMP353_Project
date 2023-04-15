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
        $vaccine = $_POST['vaccine'];
        $dose = $_POST['dose'];
        $date = $_POST['date'];
        $fid = $_POST['facility'];

        $query = "insert into Injections(EID, VaccineType, DoseNumber, Date, FID) values(?,?,?,?,?)";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'isisi', $eid, $vaccine, $dose, $date, $fid);
        
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