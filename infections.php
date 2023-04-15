<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    // query result
    $result = mysqli_query($conn, "SELECT * from Infected"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("infections.php", ["title" => "Infections", "records" => $records]);
}
// else if ($_SERVER["REQUEST_METHOD" = "POST"])
// {

// }

?>