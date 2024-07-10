<?php
 // Assuming your database credentials
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
$sql = "SELECT * FROM tenders WHERE tender_id='$tender_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([]);
}

$conn->close();
?>
