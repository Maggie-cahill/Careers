<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Styles.css">
    <title>Filtered Jobs</title>
</head>
<body>
    
<?php
session_start();

header('Content-Type: application/json');

$filters = json_decode(file_get_contents("php://input"), true) ?? $GET;

$search = isset($filters['search']) ? trim($filters['search']) : "";
$roleTypes = !empty($filters['roleType']) ? implode("','", $filters['roleType']) : "";
$environments = !empty($filters['environment']) ? implode("','", $filters['environment']) : "";
$hours = !empty($filters['hours']) ? implode("','", $filters['hours']) : "";
$jobFields = !empty($filters['jobField']) ? implode("','", $filters['jobField']) : "";
$locations = !empty($filters['location']) ? implode("','", $filters['location']) : "";


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


    $search_clause = "";
    $roleType_clause = "";
    $environment_clause = "";
    $hour_clause = "";
    $jobField_clause = "";
    $location_clause = "";
    $extra = " WHERE";

    
    if($roleTypes){
        $roleType_clause = "$extra j.job_type IN ('$roleTypes')";
         $extra = " AND";
    }

    if($environments){
        $environment_clause = "$extra j.work_environment IN ('$environments')";
         $extra = " AND";
    }

    if($hours){
        $hour_clause = "$extra j.job_form IN ('$hours')";
         $extra = " AND";
    }

    
    if($jobFields){
        $jobField_clause = "$extra ep.business_area IN ('$jobFields')";
         $extra = " AND";
    }

    
    if($locations){
        $location_clause = "$extra j.location IN ('$locations')";
         $extra = " AND";
    }

    if($search) {
        $search_clause = "$extra LOWER(j.position_title) LIKE '$search%'";
        $extra = " AND";

    }

    $page = isset($filters['page']) ? intval($filters['page']) : 1;
    $limit = 7; // Set jobs per page
    $offset = ($page - 1) * $limit;

    $saved_jobs = "SELECT job_id from Saved_Jobs where user_id = " . $_SESSION['user_id'] . ";";
    $saved_jobs_result = $conn->query($saved_jobs);


     $sql_statement = "SELECT *, DATEDIFF(j.closing_date, CURRENT_DATE) AS days_remaining FROM Jobs j 
        JOIN Employer_Profiles ep ON j.profile_id = ep.profile_id 
        $search_clause$roleType_clause$environment_clause$hour_clause$jobField_clause$location_clause
        ORDER BY j.job_id 
        LIMIT $limit OFFSET $offset";

    $count_statement = "SELECT COUNT(*) AS count FROM Jobs j 
        JOIN Employer_Profiles ep ON j.profile_id = ep.profile_id 
        $search_clause$roleType_clause$environment_clause$hour_clause$jobField_clause$location_clause";


    $job_result = $conn->query($sql_statement);
    $total_jobs = $conn->query($count_statement)->fetch_assoc()['count'];
    $total_pages = ceil($total_jobs / $limit);


    $every_job = "SELECT COUNT(*) as count FROM Jobs;";

    $every_job_result = $conn->query(  $every_job)->fetch_assoc()['count'];


    
    $conn->close();
 
    


        if ($total_jobs !=  $every_job_result) {
            echo "<p>" . $total_jobs. " Results</p><br>";
        }
        
        echo "<div id='job-list'>";
            while($row = mysqli_fetch_array($job_result)) { 
                echo " <div class='job-listing' job-id = '" . $row['job_id'] . "' onclick = showJob(" . $row['job_id'] . ")>"; 
                echo "<div class='company-title'>";
                    echo "<img src='../Images/" . $row['profile_picture'] . "' alt=''>";
                    echo " <h4>" . $row['organization_name'] . "</h4>";
                echo " </div>";
                echo "<h2> " . $row['position_title'] . "</h2>";
                echo "<p> " . $row['job_type'] . " | " . $row['location'] . " </p>";
                echo "<p>€" . $row['salary'] . "</p>";
                echo "<p> " . $row['days_remaining'] . " days to apply</p>";

                if(isset($_SESSION['user_id'])){

                    // Reset saved job pointer
                    mysqli_data_seek($saved_jobs_result, 0); 
   
                    $class_name = "save_button";
                    while($row_saved_job = mysqli_fetch_array($saved_jobs_result)) { 
                        if ($row_saved_job['job_id'] == $row['job_id']) { // if its saved
                            $class_name = "unsave_button";
                            break;
                        } 
                    }    
   
                 
                   echo "<button class = '" . $class_name . "'  data-job-id='" . $row['job_id'] . "' id = 'job_saving' onclick = 'saveJobs(event, " . $row['job_id'] . ")'><i class='fa-solid fa-bookmark'></i></button>";
                   
                } else {
                    echo "<button class = 'save_button'  data-job-id='" . $row['job_id'] . "' id = 'job_saving' onclick = 'window.location.href=\"Choose.php\"'><i class='fa-solid fa-bookmark'></i></button>";
                
                }

                echo "<br><br>";
                echo "</div>"; 
            } 

            
                echo "<br><br><br>";
                echo "<div class='bottom-blur'></div>";
        echo "</div>";

        echo "<div class='pagination'>";
            if ($page > 1) {
                echo "<button onclick='changePage(" . ($page - 1) . ")' class = 'page_buttons'><i class='fa-solid fa-angles-left'></i></button>";
            }
            echo "<span>Page $page of $total_pages</span>";
            if ($page < $total_pages) {
                echo "<button onclick='changePage(" . ($page + 1) . ")' class = 'page_buttons'><i class='fa-solid fa-angles-right'></i></button>";
            }
            echo "</div>";

     

?>

</body>

<script src = "../JS/Jobs.js"></script>
</html>




