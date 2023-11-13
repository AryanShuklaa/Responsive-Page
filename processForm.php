<?php

$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regNumber = $conn->real_escape_string($_POST['regNumber']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $name = $conn->real_escape_string($_POST['name']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO registrations (regNumber, email, phone, name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $regNumber, $email, $phone, $name);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No form data received";
}

$conn->close();
?>
