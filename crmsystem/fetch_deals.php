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

    $sql = "SELECT * FROM deals ORDER BY deal_date desc";
    $result = $conn->query($sql);

    $deals = array();
    while ($row = $result->fetch_assoc()) {
        $deals[] = $row;
    }

    $conn->close();

    echo json_encode($deals);
    
?>
