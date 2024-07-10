<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if (empty($input_username) || empty($input_password)) {
        die('Username and password are required!');
    }

    // Hash the password
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('ss', $input_username, $hashed_password);
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->close();
}

$conn->close();
?>
