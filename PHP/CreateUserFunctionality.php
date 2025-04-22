<?php
ob_end_clean(); // clear whitespace
header('Content-Type: application/json; charset=UTF-8');
ob_start(); // prevent whitespace


// get form ALL form data
$firstName = isset($_POST['hidden_first_name']) ? htmlspecialchars($_POST['hidden_first_name']) : "";
$lastName = isset($_POST['hidden_last_name']) ? htmlspecialchars($_POST['hidden_last_name']) : "";
$jobTitle = isset($_POST['hidden_job_title']) ? htmlspecialchars($_POST['hidden_job_title']) : NULL;
$title = isset($_POST['hidden_title']) ? htmlspecialchars($_POST['hidden_title']) : NULL;
$email = isset($_POST['hidden_email']) ? htmlspecialchars($_POST['hidden_email']) : "";
$password = isset($_POST['hidden_password']) ? htmlspecialchars($_POST['hidden_password']) : "";
$phoneNumber = isset($_POST['hidden_phone']) ? htmlspecialchars($_POST['hidden_phone']) : "";
$numberType = isset($_POST['hidden_number_type']) ? htmlspecialchars($_POST['hidden_number_type']) : "";
$contactType = isset($_POST['hidden_contact_type']) ? htmlspecialchars($_POST['hidden_contact_type']) : "";
$organizationName = isset($_POST['hidden_organization_name']) ? htmlspecialchars($_POST['hidden_organization_name']) : "";
$address = isset($_POST['hidden_address']) ? htmlspecialchars($_POST['hidden_address']) : "";
$eircode = isset($_POST['hidden_eircode']) ? htmlspecialchars($_POST['hidden_eircode']) : "";
$city = isset($_POST['hidden_city']) ? htmlspecialchars($_POST['hidden_city']) : "";
$country = isset($_POST['hidden_country']) ? htmlspecialchars($_POST['hidden_country']) : "";
$agency = isset($_POST['hidden_agency']) ? intval($_POST['hidden_agency']) : 0;
$biography = isset($_POST['hidden_description']) ? htmlspecialchars($_POST['hidden_description']) : "";
$website = isset($_POST['hidden_website']) ? htmlspecialchars($_POST['hidden_website']) : NULL;
$businessArea = isset($_POST['hidden_business_area']) ? htmlspecialchars($_POST['hidden_business_area']) : "";
$employees = isset($_POST['hidden_employees']) ? htmlspecialchars($_POST['hidden_employees']) : "";



$servername = "maggieproject";
$username = "root";
$dbpassword = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed!", "error" => $conn->connect_error]);
    exit();
}


// hash password before inserting
$create_password_hash = password_hash($password, PASSWORD_DEFAULT);
$user_type = "Employer";

// Insert into Users table
$stmt = $conn->prepare("INSERT INTO Users (email, password_hash, user_type) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $create_password_hash, $user_type);

if($stmt->execute()) {
    $user_id = $conn->insert_id; // get most recent user_id

       // execute Employer Profiles insert
        $stmt->close();
        $stmt2 = $conn->prepare("INSERT INTO Employer_Profiles (user_id, first_name, last_name, title, job_title, phone_number, phone_type, type_of_contact, organization_name, biography, address, city, eircode, country, recruitment_agency, website_link, business_area, number_of_employees) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("isssssssssssssisss", $user_id, $firstName, $lastName, $title, $jobTitle, $phoneNumber, $numberType, $contactType, $organizationName, $biography, $address, $city, $eircode, $country, $agency, $website, $businessArea, $employees);

        if($stmt2->execute()) {
            echo json_encode(["status" => "success", "message" => "Employer profile created successfully!"]);
            exit();
        }
  
    } else {

        echo json_encode(["status" => "error", "message" => "Failed to insert employer profile!", "error" => $stmt->error]);
        exit();
    }



?>
