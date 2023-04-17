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
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            foreach ($output as $key => $value) {
                foreach ($value as $subkey => $subvalue) {
                echo "<script>console.log('Key: ".$key.", Subkey: ".$subkey.", Value: ". $subvalue. "');</script>";
            }
        }
    }

?>