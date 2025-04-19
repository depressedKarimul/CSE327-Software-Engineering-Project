<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "skillprodb";

// Create connection
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    // Check the connection
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    echo "You are connected to the database successfully!";
} catch (Exception $e) {
    echo "Could not connect to the database: " . $e->getMessage();
}

?>
