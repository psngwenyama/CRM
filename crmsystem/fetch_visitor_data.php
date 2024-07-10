<?php
// Assuming your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rrr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch visitor data
$sql = "SELECT browser_name, type, os, added_on FROM visitor ORDER BY added_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the latest visitor (assuming only one row is fetched)
    $row = $result->fetch_assoc();
    $browser_name = $row["browser_name"];
    $type = $row["type"];
    $os = $row["os"];
    $added_on = $row["added_on"];

    // Close connection
    $conn->close();
} else {
    echo "No visitor data found.";
    $conn->close();
}
?>
