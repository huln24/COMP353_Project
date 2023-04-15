<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  
    
    $action = $_GET['action'] ?? "nothing";

    if ($action == 'delete') {
        $id = $_GET["id"];
        $query = "DELETE FROM Employees WHERE EID = $id";
        if (mysqli_execute_query($conn, $query)) {
            echo '<script>alert("Deleted succesfully!")</script>';
            redirect("employees.php");
        } 
        else {
            echo '<script>alert("Oops! Something went wrong.")</script>';
        }

    }
    // query result
    $result = mysqli_query($conn, "SELECT * from Employees f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("employees.php", ["title" => "Employees", "records" => $records]);
}
// else if ($_SERVER["REQUEST_METHOD"] == "POST")
// {

// }

?>