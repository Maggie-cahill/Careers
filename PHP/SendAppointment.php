<?php


session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/PHPMailer/PHPMailer.php';
require '../src/PHPMailer/SMTP.php';
require '../src/PHPMailer/Exception.php';



$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_info = "SELECT * from Student_Profiles sp JOIN Users u ON sp.user_id = u.user_id where sp.user_id = " . $_SESSION['user_id'] . ";";
$user_info_result = $conn->query($user_info);

while($row = mysqli_fetch_array($user_info_result)) { 
    $email = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}

$name = $first_name . " " . $last_name;

$conn->close();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requested_date = isset($_POST["date-picker"]) ? htmlspecialchars($_POST["date-picker"]) : "No date selected!";
    $appointment_type = isset($_POST["appointment-type"]) ? htmlspecialchars($_POST["appointment-type"]) : "Not selected";
    $requested_time = htmlspecialchars($_POST["time"]);
    $description = htmlspecialchars($_POST["describe"]);

    if (empty($requested_date) || empty($requested_time) || empty($description)) {
        echo "All fields are required!";
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '2236maggie@gmail.com'; 
        $mail->Password = 'nwka npgf jcsf kleb'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('2236maggie@gmail.com');
        $mail->isHTML(true); 

            $mail->Subject = " $appointment_type Appointment Request for $name (ATU Career Path)"; // Emoji for visual appeal
            $mail->Body = "
                <div style='font-family: \"Arial\", sans-serif; padding: 20px;'>
                    <div style = 'width: 90%; padding: 20px; background-color: rgb(87, 127, 245);'>
                        <h1 style='color: white; font-size: 3.2em;'>ATU Career Path Appointment Request</h2>
                    </div>
                    <div style = 'border: 7px solid rgb(87, 127, 245); padding: 20px; padding-right:18px; width: 89%;'>
                        <h1 style='color:rgb(16, 52, 119);'>$name</h1>
                        <h3><strong>Recipient Email</strong> $email</h3>
                        <h3><strong>Recipient Appointment Type:</strong> $appointment_type</h3>
                        <table style = 'font-size: 1.5em;'>
                            <tr>
                                <th style = 'padding: 15px; padding-left: 0px;'>Requested Date</th>
                                <th style = 'padding: 15px;'>Requested Time</th>
                            </tr>
                            <tr>
                                <td style = 'padding: 15px; padding-top:0px;  padding-left: 0px;'>$requested_date</td>
                                <td style = 'padding: 15px; padding-top:0px;'>$requested_time</td>
                            </tr>
                        </table>
                        <h3><strong>Reason for booking:</strong></h3>
                    

                        <blockquote style='background-color: #f9f9f9; padding: 10px; border-left: 4px solid rgb(0, 23, 92);'>$description</blockquote>
                    
                   
                    </div>
                    <hr>
                    <p style='color: #888;'>Sent via <strong>Query Contact Form (ATU Career Path)</strong></p>
                </div>
            ";

            // file attackment
            if (isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0) {
                $uploadFile = $_FILES["filename"]["tmp_name"];
                $filename = $_FILES["filename"]["name"];
            
                if (!file_exists($uploadFile)) {
                    echo "Error: File not found!";
                    exit();
                }
            
                $mail->addAttachment($uploadFile, $filename);
            }
            
            


        if ($mail->send()) {
            header("Location: SuccessfulAppointment.php");
            if(isset($_SESSION['error_appointment_message'])){
                unset($_SESSION["error_appointment_message"]); 
                }
            exit();
        } else {
            echo "Failed to send message: {$mail->ErrorInfo}";
        }
        
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send message: {$mail->ErrorInfo}";
    }
}
?>
