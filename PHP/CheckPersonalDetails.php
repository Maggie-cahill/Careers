<?php
session_start();

$conn = new mysqli("maggieproject", "root", "root", "careers_db");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// get email value from form
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["error" => "Invalid email format!"]);
    exit();
}

// check if email already exists in the database
$query = "SELECT COUNT(*) AS count FROM Users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result["count"] > 0) {
    echo json_encode(["exists" => true, "error" => "Email already exists!"]);
} else {
    echo json_encode(["exists" => false]);
}


$stmt->close();
$conn->close();
?>
