<?php
include "utilities/helpers.php";

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
    else if ($action == "delete") {
        // get values
        $eid = $_POST['eid'];
        
        // prepare query
        $stmt = mysqli_prepare($conn, "DELETE FROM Employees Where EID = ?;");
        
        mysqli_stmt_bind_param($stmt, 's', $eid);

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
        $eid = $_POST['eid'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postal = $_POST['postal'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $citizen = $_POST['citizen'];

        $query1 = "insert into Region(PostalCode, City, Province) VALUES(?,?,?) on duplicate key update PostalCode = ?, City = ?, Province = ?";
        $query2 = "update Employees set Address = ?, PostalCode = ?, Phone = ?, Email = ?, Citizenship = ? where EID = ?";

        // prepare query
        $stmt1 = mysqli_prepare($conn, $query1); 
        $stmt2 = mysqli_prepare($conn, $query2); 

        // bind query with chosen facility id
        mysqli_stmt_bind_param($stmt1, 'ssssss', $postal, $city, $province, $postal, $city, $province);
        mysqli_stmt_bind_param($stmt2, 'sssssi', $address, $postal, $phone, $email, $citizen, $eid);
        
        // execute query
        $success1 = mysqli_stmt_execute($stmt1);
        $success2 = mysqli_stmt_execute($stmt2);

        if($success1 and $success2 ) {
            $alert = "Update succesfully!";
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

    // query result
    $result = mysqli_query($conn, "SELECT * from Employees f JOIN Region r ON r.PostalCode = f.PostalCode"); 

    // result to array
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // disconnect from server
    disconnect($conn);  

    render("employees.php", ["title" => "Employees", "records" => $records, "alert" => $alert]);
?>