
<?php
session_start();

// login form values
$login_email = isset($_POST['login_email']) ? htmlspecialchars($_POST['login_email']) : '';
$login_password = isset($_POST['login_password']) ? htmlspecialchars($_POST['login_password']) : '';



$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Users WHERE email = '$login_email'";
$result_login = $conn->query($sql);

if ($result_login->num_rows > 0) {
    $row = $result_login->fetch_assoc();
    $stored_hash = $row["password_hash"];

    // verify the password by comparing the password with the stored hash
    if (password_verify($login_password, $stored_hash)) { 
        $user_id = $row["user_id"];
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['email'] = $row["email"]; // Store the username as well


    // return success message with user_id
    $response = [
        'success' => true,
        'message' => "Login Successful",
        'user_id' => $row["user_id"]
    ];


    } else {
        // email not found
        $response = [
            'success' => false,
            'email_message' => "",
            'password_message' => "*Incorrect Password",
        ];
    }
} else {

    // return Failure response
    $response = [
        'success' => false,
        'email_message' => "*Incorrect email address",
        'password_message' => "",
        'user_id' => 0,
    ];
    
}


$conn->close();
header('Content-Type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
exit;




?>
