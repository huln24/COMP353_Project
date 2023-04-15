<?php
include "utilities/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // connect to server
    $conn = connect();  

    // query result
    $result = mysqli_query($conn, "SELECT * from Facilities f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  
    
    render("facilities.php", ["title" => "Facilities", "records" => $records]);
}
// else if ($_SERVER["REQUEST_METHOD" = "POST"])
// {

// }

?>