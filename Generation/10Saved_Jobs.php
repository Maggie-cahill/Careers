<!DOCTYPE html>
<html>

<head>
    <title>Insert Job Skills </title>
</head>

<body>

<?php
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Saved_Jobs (user_id, job_id, saved_at) VALUES
(1, 1, NOW()),  
(2, 3, NOW()),  
(3, 6, NOW()),  
(4, 10, NOW()), 
(5, 15, NOW()), 
(6, 20, NOW()), 
(7, 25, NOW()), 
(8, 30, NOW()),
(9, 35, NOW()), 
(10, 40, NOW()), 
(11, 43, NOW()),
(35, 1,NOW()),
(35, 1,NOW()),
(35, 3,NOW()),
(35, 6,NOW()),
(35, 25,NOW());




";


if ($conn->query($sql) === TRUE) {
    echo "Saved jobs row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




