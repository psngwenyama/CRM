<?php
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

$sql = "SELECT * FROM tenders limit 5";
$result = $conn->query($sql);

$tenders = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tenders[] = $row;
    }
}

$conn->close();

echo json_encode($tenders);
?>
