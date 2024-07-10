<?php

session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rrr";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Validate the input
    if (empty($input_username) || empty($input_password)) {
        die('Username and password are required!');
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('s', $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die('Invalid username or password!');
    } else {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($input_password, $user['password_hash'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo 'Login successful!';
            // Redirect to a protected page
            header('Location: Sales-Dash.html');
            exit;
        } else {
            die('Invalid username or password!');
        }
    }
}

$conn->close();
?>






