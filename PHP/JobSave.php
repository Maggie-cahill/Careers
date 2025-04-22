
<?php
session_start();

header('Content-Type: application/json'); 

$job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;
$response = ["status" => "error", "message" => "No action performed"]; 

$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

if ($job_id) {
    $sql = "SELECT job_id FROM Saved_Jobs WHERE user_id = ? AND job_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_SESSION['user_id'], $job_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        // job already saved, so remove it
        $sql = "DELETE FROM Saved_Jobs WHERE user_id = ? AND job_id = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $_SESSION['user_id'], $job_id);

        if ($stmt->execute()) {
            $response = [
                "status" => "success", 
                "type" => "remove",
                "message" => "Job removed from saved successfully"
            ];
        }
    } else {

        // job not saved, so add it
        $sql = "INSERT INTO Saved_Jobs (user_id, job_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $_SESSION['user_id'], $job_id);

        if ($stmt->execute()) {
            $response = [
                "status" => "success", 
                "type" => "save",
                "message" => "Job saved successfully"
            ];
        }
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response); 
?> 




