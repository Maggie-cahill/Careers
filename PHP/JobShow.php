<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/General_Styles.css">
    <link rel="stylesheet" href="../CSS/Jobs.css">

    <title>Filtered Jobs</title>
</head>
<body>
    
<?php

session_start();
$job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;




$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    if(isset($_SESSION['user_id'])){
        $saved_jobs = "SELECT job_id from Saved_Jobs where user_id = " . $_SESSION['user_id'] . ";";
        $saved_jobs_result = $conn->query($saved_jobs);
    }
       
    if ($job_id){
        $sql = "SELECT *, DATEDIFF(j.closing_date, CURRENT_DATE) AS days_remaining, DATE_FORMAT(j.closing_date, '%M %d, %Y') as date_formatted, DATE_FORMAT(j.start_date, '%M %d, %Y') as start_date_formatted, DATE_FORMAT(j.end_date, '%M %d, %Y') as end_date_formatted FROM Jobs j JOIN Employer_Profiles ep ON j.profile_id = ep.profile_id WHERE j.job_id = $job_id;";
        $jobs_result = $conn->query($sql);

        if ($jobs_result ->num_rows == 0) {
            echo "<p>No job found for ID $job_id.</p>";
        }

        $sql2 = "SELECT * from Job_Skills WHERE job_id = $job_id;";
        $job_skills_result = $conn->query($sql2);



        $conn->close();




    
    


       
        while($row = mysqli_fetch_array($jobs_result)) {
   
            echo "<div class='company-header'>";
                echo "<img src='../Images/" . $row['profile_picture'] . "' alt='Company Logo'>";
                echo "<h1>" . $row['organization_name'] . "</h1>";
            echo "</div>";           
          
            echo "<div class='position-info'>";
                echo "<h1> " . $row['position_title'] . "</h1>";
                echo "<h3><button>" . $row['days_remaining'] . " Days to Apply</button>  &nbsp; Closing Date: " . $row['date_formatted'] . "</h3>";
            echo "</div>";
            
            echo "<div class='general-details'>";
                echo "<h3>General Details</h3>";
                echo "<button><i class='fa-solid fa-location-dot'></i>" . $row['location'] . "</button>";
                echo "<button><i class='fa-solid fa-suitcase'></i>" . $row['job_form'] . "</button>";
                echo "<button><i class='fa-solid fa-house'></i>" . $row['work_environment'] . "</button>";
                echo "<button><i class='fa-solid fa-coins'></i>€" . $row['salary'] . "</button>";
            echo "</div>";
            
            echo "<div class='options'>";

            
            if(isset($_SESSION['user_id'])){
                echo "<a target='_blank' rel='relation_name' href='" . $row['website_link'] . "'><button class = 'apply-button'><i class='fa-solid fa-arrow-up-right-from-square'></i>Apply</button></a>";
            } else {
                echo "<a rel='relation_name' href='Choose.php'><button class = 'apply-button'><i class='fa-solid fa-arrow-up-right-from-square'></i>Apply</button></a>";
            }
                        
            
            if(isset($_SESSION['user_id'])){

            // Reset saved job pointer
            mysqli_data_seek($saved_jobs_result, 0); 

            $class_name = "save_button";
            $button_content = "Save";
            while($row_saved_job = mysqli_fetch_array($saved_jobs_result)) { 
                if ($row_saved_job['job_id'] == $row['job_id']) { // if its saved
                    $class_name = "unsave_button";
                    $button_content = "Unsave";
                    break;
                } 
            }
                echo "<button id = 'top_save' class = '" . $class_name . "'  data-job-id='" . $row['job_id'] . "' onclick = 'saveJobs(event, " . $row['job_id']. ")'><i class='fa-solid fa-bookmark'></i>" . $button_content . "</button>";
            } else {
                echo "<button id = 'top_save' class = 'save_button'  data-job-id='" . $row['job_id'] . "' onclick = 'window.location.href=\"Choose.php\"'><i class='fa-solid fa-bookmark'></i>Save</button>";

            }
            echo "</div>";
            
            echo "<div class='job-body-content'>";
                echo "<div class='job-description'>";   
                    echo "<h3>Job Description</h3>";
                    echo "<p> " . $row['biography'] . " </p>";
                echo "</div>";

                echo "<div class='job-requirements'>";
                    echo "<h3>Requirements</h3>";
                    echo "<p> " . $row['requirements'] . " </p>";
                echo "</div>";
            
                echo "<div class='job-skills'>";
                    echo "<h3>Important Skills</h3>";
                    echo "<ul class = 'listed-skills'>";    
                        while($row2 = mysqli_fetch_array($job_skills_result)) {
                            echo "<li>" . $row2['skill_name'] . "</li>";
                        }
                    echo "</ul>";
                echo "</div>";

                echo "<div class='job-dates'>";
                    echo "<h3>Critical Dates</h3><br>";
                    echo "<h3><b>Intended Start Date:</b> " . $row['start_date_formatted'] . "</h3>";
                    if (!empty($row['end_date'])) {
                        echo "<h3><b>End Date:</b> " . $row['end_date_formatted'] . "</h3>";
                    }
    
                echo "</div>";
                echo "<br>";

                echo "<div class='options'>";
                    echo "<a target='_blank' rel='relation_name' href='" . $row['website_link'] . "'><button class = 'apply-button'><i class='fa-solid fa-arrow-up-right-from-square'></i>Apply</button></a>";
                    
                     

                if(isset($_SESSION['user_id'])){

                    // Reset saved job pointer
                    mysqli_data_seek($saved_jobs_result, 0); 

                    $class_name = "save_button";
                    $button_content = "Save";
                    while($row_saved_job = mysqli_fetch_array($saved_jobs_result)) { 
                        if ($row_saved_job['job_id'] == $row['job_id']) { // if its saved
                            $class_name = "unsave_button";
                            $button_content = "Unsave";
                            break;
                        } 
                    }
                    echo "<button id = 'top_save' class = '" . $class_name . "'  data-job-id='" . $row['job_id'] . "' onclick = 'saveJobs(event, " . $row['job_id']. ")'><i class='fa-solid fa-bookmark'></i>" . $button_content . "</button>";
                } else {
                    echo "<button id = 'top_save' class = 'save_button'  data-job-id='" . $row['job_id'] . "' onclick = 'saveJobs(event, " . $row['job_id']. ")'><i class='fa-solid fa-bookmark'></i>" . $button_content . "</button>";

                }

                echo "</div>";
            echo "</div>";
            
        }

        
        
    }
       

        


?>

</body>
</html>




