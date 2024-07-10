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


    if (isset($_GET["deal_id"])) {
        $deal_id = $_GET["deal_id"];

        $sql = "SELECT * FROM deals WHERE deal_id='$deal_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $deal = $result->fetch_assoc();
            echo json_encode($deal);
        } else {
            echo json_encode(array("error" => "Deal not found"));
        }

        $conn->close();
    }
?>
