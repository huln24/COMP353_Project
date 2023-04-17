<?php
include 'utilities/helpers.php';

$conn = connect();

// send schedule emails if not sent already for that week
if (date("l") == "Monday" ) {

    $today = date('Y-m-d');

    $del_today_email = mysqli_prepare($conn, "DELETE FROM EmailLogs WHERE Date = \"$today\"");
    mysqli_stmt_execute($del_today_email);

    $week_begin = "\"".date('Y-m-d', strtotime('+1 day'))."\"";
    $week_end = "\"".date('Y-m-d', strtotime('+7 day'))."\"";
    $week_begin_str = date('l jS F Y', strtotime('+1 day'));
    $week_end_str = date('l jS F Y', strtotime('+7 day'));

    $f_query = mysqli_query($conn, "SELECT DISTINCT f.FID, f.FName, f.FAddress FROM Employees e INNER JOIN Employed em ON e.EID = em.EID INNER JOIN Facilities f ON em.FID = f.FID");
    $f_arr = mysqli_fetch_all($f_query, MYSQLI_ASSOC);

    for( $i = 0; $i<count($f_arr); $i++ ) {

        $fid = $f_arr[$i]["FID"];
        $fname = $f_arr[$i]["FName"];
        $faddress = $f_arr[$i]["FAddress"];

        $e_query = mysqli_query($conn, "SELECT e.EID, e.FirstName, e.LastName, e.Email FROM Employees e INNER JOIN Employed em ON e.EID = em.EID WHERE em.FID = $fid AND em.EndDate IS NULL");
        $e_arr = mysqli_fetch_all($e_query, MYSQLI_ASSOC);

        for( $j = 0; $j<count($e_arr); $j++ ) {

            $schedule = "";

            $email_subject = ($fname." Schedule for ".$week_begin_str." to ".$week_end_str);

            $eid = $e_arr[$j]["EID"];
            $firstname = $e_arr[$j]["FirstName"];
            $lastname = $e_arr[$j]["LastName"];
            $email = $e_arr[$j]["Email"];

            $ws_query = mysqli_query($conn, "SELECT StartDateTime, EndDateTime FROM WorkSchedule WHERE EID = $eid AND FID = $fid AND StartDateTime >= $week_begin AND EndDateTime <= $week_end");
            $ws_arr = mysqli_fetch_all($ws_query, MYSQLI_ASSOC);

            if (count($ws_arr) == 0) {
                $schedule = "No Assignment, ";
            }
            else {

                for( $k = 0; $k<count($ws_arr); $k++ ) {

                    $start = $ws_arr[$k]["StartDateTime"];
                    $end = $ws_arr[$k]["EndDateTime"];
                    $schedule = $schedule.$start." to ".$end.", ";
                };
            }

            $email_body = ($schedule.$firstname." ".$lastname.", ".$email.", ".$fname.", ".$faddress);
            $email_body = substr($email_body,0,80);

            $email_logs_insert = "INSERT INTO EmailLogs(Date, FID, EID, Subject, Body) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $email_logs_insert);

            mysqli_stmt_bind_param($stmt, 'sssss', $today, $fid, $eid, $email_subject, $email_body);

            // execute query
            mysqli_stmt_execute($stmt);
        };
    };
}

// Renders header.php - index.php - footer.php
render('index_body.php', ['title' => "Welcome to HFESTS!"]);

// disconnect from server
disconnect($conn);
?>