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
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $medicare = $_POST['medicare'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postal = $_POST['postal'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $citizen = $_POST['citizen'];

        $query1 = "insert into Region(PostalCode, City, Province) values(?,?,?)";
        $query2 = "insert into Employees(FirstName, LastName, Medicare, DoB, Address, PostalCode, Phone, Email, Citizenship) values(?,?,?,?,?,?,?,?,?)";


        // prepare query
        $stmt1 = mysqli_prepare($conn, $query1); 
        $stmt2 = mysqli_prepare($conn, $query2); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt1, 'sss', $postal, $city, $province);
        mysqli_stmt_bind_param($stmt2, 'ssissssss', $fname, $lname, $medicare, $dob, $address, $postal, $phone, $email, $citizen);
        
        // execute query
        $success1 = mysqli_stmt_execute($stmt1);
        $success2 = mysqli_stmt_execute($stmt2);

        if($success1 and $success2 ) {
            $alert = "Added succesfully!";
        }
        else {
            $alert = "Unable to add. Error occured!";
        }
    }
}

    // query result
    $result = mysqli_query($conn, "SELECT * from Employees f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("employees.php", ["title" => "Employees", "records" => $records, "alert" => $alert]);
?>