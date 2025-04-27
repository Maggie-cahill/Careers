<!DOCTYPE html>
<html>

<head>
    <title>Insert Users </title>
</head>

<body>

<?php
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Users(password_hash, email,user_type) VALUES 

('\$2y\$10\$w83U47wqZefKqKcF5vRgAuFqHtFOfHT5XI2pWyF3wIjKpF6Xh7Q6O', 'G00123456@atu.ie', 'Student'),
('\$2y\$10\$LzX71K9W8Vt9P8Rv3N6v1eDpJCR3k92vUqDAdC9FPf0g5QFvZl2Cm', 'G00567890@atu.ie', 'Student'),
('\$2y\$10\$Tx93LPQKJm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4O', 'G00987456@atu.ie', 'Student'),
('\$2y\$10\$Ko71MNdT8Xp93NQW9Lf7V2P3KJm2RD6NzX9V3QfU5W7AqF8XOPRKv', 'G00321456@atu.ie', 'Student'),
('\$2y\$10\$UvX93NP71MdT8Ko7LQW9Lf7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRK', 'G00654321@atu.ie', 'Student'),
('\$2y\$10\$QW9Lf7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm', 'G00011122@atu.ie', 'Student'),
('\$2y\$10\$7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9', 'G00234567@atu.ie', 'Student'),
('\$2y\$10\$X9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6', 'G00765432@atu.ie', 'Student'),
('\$2y\$10\$3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V', 'G00456789@atu.ie', 'Student'),
('\$2y\$10\$RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3J', 'G00876543@atu.ie', 'Student'),
('\$2y\$10\$NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2R', 'G00345678@atu.ie', 'Student'),
('\$2y\$10\$9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6N', 'G00901234@atu.ie', 'Student'),
('\$2y\$10\$3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6NzX', 'G00543210@atu.ie', 'Student'),
('\$2y\$10\$U5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6NzX9V3', 'G00789012@atu.ie', 'Student'),
('\$2y\$10\$W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6NzX9V3Qf', 'G00678901@atu.ie', 'Student'),

('\$2y\$10\$Lm4OQW9Lf7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5', 'michael.clark@example.com', 'Employer'),
('\$2y\$10\$2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf', 'sarah.adams@example.com', 'Employer'),
('\$2y\$10\$XOPRKv7MLgU3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6NzX9V3QfU5W7Aq', 'dylan.reid@example.com', 'Employer'),
('\$2y\$10\$U3pZwD5Y9Lm4OQW9Lf7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7M', 'lisa.walsh@example.com', 'Employer'),
('\$2y\$10\$Lm4OQW9Lf7V2P3Jm2RD6NzX9V3QfU5W7AqF8XOPRKv7MLgU3pZwD5', 'kevin.brennan@example.com', 'Employer'),
('\$2y\$10\$N3XdP8QWvT92L9MzX7KJmRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4O', 'emma.obrien@healthtech.com', 'Employer'),
('\$2y\$10\$R9MzX7KJmRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V', 'sean.gallagher@renewenergy.com', 'Employer'),
('\$2y\$10\$RpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V9MzX7KJmN', 'laura.fitzgerald@atlasconsulting.com', 'Employer'),
('\$2y\$10\$L8QW3XdP9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92', 'mark.nolan@cybersecure.ie', 'Employer'),
('\$2y\$10\$OBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V9MzX7KJmNRpX5AqF8X', 'rebecca.dunne@retailleaders.ie', 'Employer'),
('\$2y\$10\$T92L8QW3XdP9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4O', 'ryan.mcgrath@edtech.com', 'Employer'),
('\$2y\$10\$9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP', 'jennifer.kennedy@archvision.com', 'Employer'),
('\$2y\$10\$JmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V9MzX7K', 'connor.hayes@nextgenai.com', 'Employer'),
('\$2y\$10\$Lm4OT92L8QW3XdP9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9', 'lisa.byrne@legalsolutions.ie', 'Employer'),
('\$2y\$10\$X5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V9MzX7KJmNRp', 'tom.murphy@startupinc.ie', 'Employer'),
('\$2y\$10\$QW3XdP9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8', 'carla.fenton@medtechinnovators.com', 'Employer'),
('\$2y\$10\$XdP9V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3', 'nathan.powers@greenenergyworld.com', 'Employer'),
('\$2y\$10\$V9MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9', 'amelia.watson@globalfintech.com', 'Employer'),
('\$2y\$10\$MzX7KJmNRpX5AqF8XOBRLv7MLgU3pZwD5Y9Lm4OT92L8QW3XdP9V9', 'henry.collins@designcreators.com', 'Employer'),

('\$2y\$10\$83oDghUx1zKx3Whs1kcPout1AI5wNBQP3foGeAj6VnJ55QYyvY3Y2', 'G00423830@atu.ie', 'Student');
";


if ($conn->query($sql) === TRUE) {
    echo "User row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




