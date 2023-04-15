<?php
include "utilities/helpers.php";


if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    // initialize variables
    $alert = "";
    $action = $_GET['action'] ?? "nothing";

    // perform delete
    if ($action == 'delete') {
        $id = $_GET["id"];
        $query = "DELETE FROM Manager WHERE EID = $id";
        if (mysqli_execute_query($conn, $query)) {
            $alert = "Deleted succesfully!";
        }
        else {
            $alert = "Oops! Something went wrong.";
        }
    }

    // Retrieve table data
    $result = mysqli_query($conn, "SELECT * from Manager"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("test.php", ["title" => "Test", "records" => $records, "alert" => $alert]);
    redirect('test.php');
} 
elseif ($_SERVER["REQUEST_METHOD" == "POST"])
{
    // connect to server
    $conn = connect(); 
    echo $_POST['eid'];
    $alert = "";

    // if (isset($_POST['eid']) && isset($_POST['fid']) && !empty($_POST['eid']) && !empty($_POST['fid'])) {
    //     $eid = $_POST['eid'];
    //     $fid = $_POST['fid'];
    //     echo $eid;
    //     // $query = "INSERT INTO Manager VALUES($eid, $fid)";
    //     // if (mysqli_execute_query($conn, $query)) {
    //     //     $alert = "Inserted succesfully!";
    //     // }
    //     // else {
    //     //     $alert = "Oops! Something went wrong.";
    //     // }
    // }
    // else {
    //     $alert = "Missing field!";
    // }
    // disconnect from server
    disconnect($conn);  

    render("test.php", ["title" => "Test", "records" => $records, "alert" => $alert]);
}

?>