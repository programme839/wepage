<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];

$stmt = $conn->prepare("INSERT INTO contacts (name, email, phonenumber) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phonenumber);

if ($stmt->execute()) {
    echo "Thank you! Your contact details have been submitted.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
