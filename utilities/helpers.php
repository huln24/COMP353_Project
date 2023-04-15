<?php
    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // create session cookie
    session_start();

    // connect to db
    function connect() {
        // get db connection info
        try {
            include_once('config.php');
            $conn = mysqli_connect($host, $username, $pass, $db, $port);
        }
        catch(Exception $e) {
            echo "Connection failed: ", $e -> getMessage(), "\n";
        }
        return $conn;
    }

    // disconnect from db
    function disconnect($conn) {
        try {
            mysqli_close($conn);
        }
        catch(Exception $e) {
            echo "Unable to disconnect: ", $e -> getMessage(), "\n";
        }
    }

    // for debugging, print variable contents 
    // usage: dump($a, $b)
    function dump()
    {
        $arguments = func_get_args();
        require("views/dump.php");
        exit;
    }

    // usage: redirect("index.php")
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }


    // usage: render("index.php", ["abc" => $value])
    // 
    function render($view, $values = [])
    {
        if (file_exists("views/{$view}"))
        {
            extract($values);
            require("views/header.php");
            require("views/{$view}");
            require("views/footer.php");
            exit;
        }
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

    function get_query($id)
    {
        switch ($id) {
            case 6:
                return "SELECT f.FName, f.FAddress, r.City, r.Province, r.PostalCode, f.Phone, f.Website, f.Type, f.Capacity, CONCAT(Employees.FirstName, ' ', Employees.LastName) AS GeneralManagerName,
                COUNT(Employed.EID) AS NumEmployees
                FROM Facilities f
                INNER JOIN Region r ON f.PostalCode = r.PostalCode
                LEFT JOIN Employed ON f.FID = Employed.FID
                LEFT JOIN Manager ON f.FID = Manager.FID
                LEFT JOIN Employees ON Manager.EID = Employees.EID
                GROUP BY f.FID
                ORDER BY r.Province, r.City, f.Type, NumEmployees ASC;
                ";
            case 7:
                return "SELECT Employees.FirstName, Employees.LastName, Employed.StartDate, Employees.DoB, Employees.Medicare, Employees.Phone, Employees.Address, Region.City, Region.Province, Region.PostalCode, Employees.Citizenship, Employees.Email
                FROM Employees
                INNER JOIN Employed ON Employees.EID = Employed.EID
                INNER JOIN Facilities ON Employed.FID = Facilities.FID
                INNER JOIN Region ON Facilities.PostalCode = Region.PostalCode
                WHERE Facilities.FID = [specific facility ID]
                ORDER BY Employed.Role ASC, Employees.FirstName ASC, Employees.LastName ASC;
                ";
            case 8:
                return "SELECT Facilities.FName, DAYOFYEAR(WorkSchedule.StartDateTime) AS DayOfYear, WorkSchedule.StartDateTime, WorkSchedule.EndDateTime
                FROM WorkSchedule
                JOIN Employees ON WorkSchedule.EID = Employees.EID
                JOIN Facilities ON WorkSchedule.FID = Facilities.FID
                WHERE Employees.EID = ?
                AND WorkSchedule.StartDateTime BETWEEN '2020-01-01' AND '2023-09-09'
                ORDER BY Facilities.FName ASC, DayOfYear ASC, WorkSchedule.StartDateTime ASC;
                ";
            case 9:
                return "SELECT FirstName, LastName, InfectionDate, FName
                FROM Employees e
                JOIN Employed w ON w.EID = e.EID
                JOIN Infected i ON w.EID = i.EID AND i.EID = e.EID
                JOIN Facilities f ON w.FID = f.FID
                WHERE
                    Role = 'doctor' AND
                    InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND
                    w.EID = e.EID AND EndDate IS NULL
                ORDER BY FName ASC, FirstName ASC;
                ";
            case 10:
                return "SELECT Date, Subject, Body
                FROM EmailLogs
                WHERE FID = [facility ID]
                ORDER BY Date ASC;
                ";
            case 11:
                return "SELECT FirstName, LastName, Role
                FROM WorkSchedule w
                JOIN Employed e ON w.FID = e.FID AND w.EID = e.EID
                JOIN Employees ON w.EID = Employees.EID
                WHERE StartDateTime BETWEEN DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND CURDATE() AND w.FID = ?
                ORDER BY Role ASC, FirstName ASC;
                ";
            case 12:
                return "SELECT Role, SUM(TIMESTAMPDIFF(HOUR, w.StartDateTime, w.EndDateTime)) AS TotalScheduledHours
                FROM WorkSchedule w
                JOIN Employed e ON w.FID = e.FID
                WHERE w.StartDateTime BETWEEN '2000-01-01' AND '2023-04-14'
                    AND e.EID = w.EID
                    AND e.FID = ?
                GROUP BY Role
                ORDER BY Role ASC;
                ";
            case 13:
                return "SELECT Province, FName, Capacity, COUNT(E.EID) AS TotalInfected
                FROM Facilities F
                JOIN Employed E ON F.FID = E.FID
                JOIN Infected I ON E.EID = I.EID
                JOIN Region r ON r.PostalCode = F.PostalCode
                WHERE InfectionDate >= DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND E.EndDate IS NULL
                GROUP BY F.FID
                ORDER BY Province, TotalInfected;
                ";
            case 14:
                return "SELECT FirstName, LastName, R.City, COUNT(Em.FID) AS TotalWorkingFacilities
                FROM Employees E
                JOIN Employed Em ON E.EID = Em.EID
                JOIN Facilities F ON F.FID = Em.FID
                JOIN Region R ON R.PostalCode = F.PostalCode
                WHERE R.Province = \"QC\" AND Em.EndDate IS NULL AND Role = 'doctor'
                GROUP BY E.EID
                ORDER BY R.City ASC, TotalWorkingFacilities DESC;
                ";
            case 15:
                return "SELECT DISTINCT *
                FROM Query15Helper
                WHERE TotalHoursScheduledAsNurse = (SELECT MAX(TotalHoursScheduledAsNurse) FROM Query15Helper)
                ";
            case 16:
                return "SELECT DISTINCT FirstName, LastName, DoB, Email, Role,
                (SELECT MIN(StartDate) FROM Employed WHERE e.EID = EID AND (Role = \"Nurse\" OR Role = \"Doctor\")) AS FirstDayAsNurseOrDoctor,
                (SELECT SUM(TIMEDIFF(EndDateTime, StartDateTime)) FROM WorkSchedule WHERE e.EID = EID) AS TotalHoursScheduled
                FROM Employees e
                INNER JOIN Employed em ON e.EID = em.EID
                WHERE (Role = \"Nurse\" OR Role = \"Doctor\") AND EndDate IS NULL AND e.EID IN (SELECT EID FROM Infected GROUP BY EID HAVING COUNT(*) >= 3)
                ORDER BY Role, FirstName, LastName
                ";
            case 17:
                return "SELECT DISTINCT FirstName, LastName, DoB, Email, Role,
                (SELECT MIN(StartDate) FROM Employed WHERE e.EID = EID AND (Role = \"Nurse\" OR Role = \"Doctor\")) AS FirstDayAsNurseOrDoctor,
                (SELECT SUM(TIMEDIFF(EndDateTime, StartDateTime)) FROM WorkSchedule WHERE e.EID = EID) AS TotalHoursScheduled
                FROM Employees e
                INNER JOIN Employed em ON e.EID = em.EID
                WHERE (Role = \"Nurse\" OR Role = \"Doctor\") AND EndDate IS NULL AND e.EID NOT IN (SELECT EID FROM Infected)
                ORDER BY Role, FirstName, LastName
                ";
        }
    } 

?>