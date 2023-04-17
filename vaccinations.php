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

        // bind query 
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
    else if ($action == "delete") {
        // get values
        $key_arr = preg_split ("/\,/", $_POST['key']);
        
        // prepare query
        $stmt = mysqli_prepare($conn, "DELETE FROM Injections Where EID = ? AND VaccineType = ? AND DoseNumber = ?;");
        
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
    else if ($action == "update") {
        // get values
        $eid = $_POST['employee'];
        $vaccine = $_POST['vaccine'];
        $dose = $_POST['dose'];
        $date = $_POST['date'];
        $fid = $_POST['facility'];

        $query = "update Injections set Date = ?, FID = ? where EID = ?, VaccineType = ?, DoseNumber = ?";

        // prepare query
        $stmt = mysqli_prepare($conn, $query); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt, 'siisi', $date, $fid, $eid, $vaccine, $dose);
        
        // execute query
        $success = mysqli_stmt_execute($stmt);

        if($success) {
            $alert = "Updated succesfully!";
        }
        else {
            $alert = "Unable to update. Error occured!";
        }

        // send alert to javascript as json
        $data = [
            "alert" => $alert
        ];
        echo json_encode($data);
        exit;
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