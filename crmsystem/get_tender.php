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

$tender_id = $_GET['id'];
$sql = "SELECT * FROM tenders WHERE tender_id = $tender_id";
$result = $conn->query($sql);

$tender = array();

if ($result->num_rows > 0) {
    $tender = $result->fetch_assoc();
}

$conn->close();

echo json_encode($tender);
?>
