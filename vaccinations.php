<?php
include "helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    // query result
    $result = mysqli_query($conn, "SELECT * from Injections"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("vaccinations.php", ["title" => "Vaccination Record", "records" => $records]);
}
// else if ($_SERVER["REQUEST_METHOD" = "POST"])
// {

// }

?>