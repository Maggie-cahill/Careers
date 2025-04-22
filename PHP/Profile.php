<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Profile.css">





</head>

<?php 
session_start();
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$icon_style = "display: none";
$sign_in_button_style = "display: block";

$edit_button_style = "";

if(isset($_SESSION['user_id'])){
    $icon_style = "display: block";
    $sign_in_button_style = "display: none";

    $get_saved_jobs = "SELECT *, DATEDIFF(j.closing_date, CURRENT_DATE) AS days_remaining FROM Saved_Jobs sj JOIN Jobs j ON sj.job_id = j.job_id JOIN Employer_Profiles ep ON j.profile_id = ep.profile_id WHERE sj.user_id = " . $_SESSION['user_id'] . ";";
    $get_saved_jobs_result = $conn->query($get_saved_jobs);

    $check_user_type = "SELECT user_type from Users where user_id = " . $_SESSION['user_id'] . ";";
    $check_user_type_result = $conn->query($check_user_type);

    if ($check_user_type_result->num_rows > 0) {
        $row = $check_user_type_result->fetch_assoc(); 
        $user_type = $row['user_type']; // assign user_type value


        if($user_type == "Student") {
            $get_name = "SELECT first_name from Student_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);

            $get_profile = "SELECT *, DATE_FORMAT(date_of_birth, '%M %d, %Y') as birthday from Student_Profiles sp JOIN Users u ON sp.user_id = u.user_id where u.user_id = " . $_SESSION['user_id'] . ";";
            $get_profile_result = $conn->query($get_profile);

            $get_profile_id = "SELECT profile_id from Student_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_profile_id_result = $conn->query( $get_profile_id);

            if ($get_profile_id_result->num_rows > 0) {
                $row3 = $get_profile_id_result->fetch_assoc(); 
                $profile_id = $row3['profile_id']; // assign profile_id value
                $_SESSION['profile_id'] = $profile_id;
            } else {
                $profile_id = "";
                echo "No results found!";
            }

            $get_student_skills = "SELECT * from Skills where profile_id = " .  $_SESSION['profile_id']  . ";";
            $get_student_skills_result = $conn->query($get_student_skills);

            $get_student_interests = "SELECT * from Interests where profile_id = " .  $_SESSION['profile_id']  . ";";
            $get_student_interests_result = $conn->query($get_student_interests);

            $get_student_links = "SELECT * from Important_Links where profile_id = " .  $_SESSION['profile_id']  . ";";
            $get_student_links_result = $conn->query($get_student_links);

            $student_info_stmt = "SELECT date_of_birth, major, university, degree, cv_file, graduation_year FROM Student_Profiles WHERE user_id = ?";
            $stmt = $conn->prepare( $student_info_stmt);
            $user_id = $_SESSION['user_id'];
            $stmt->execute([$user_id]);
            $studentData = $stmt->fetch();

            $edit_button_style = "disabled";
            
        } else {
            $get_name = "SELECT first_name from Employer_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);

            $get_profile = "SELECT * from Employer_Profiles ep JOIN Users u ON ep.user_id = u.user_id where ep.user_id = " . $_SESSION['user_id'] . ";";
            $get_profile_result = $conn->query($get_profile);
        }
    
        if ($get_name_result->num_rows > 0) {
            $row2 = $get_name_result->fetch_assoc(); 
            $name = $row2['first_name']; // assign name value
        } else {
            $name = "";
            echo "No results found!";
        }

    } else {
        $name = "";
        echo "Error!";
    }

    $_SESSION['first_name'] = $name;

}



$conn->close();

?>

<body>


<nav>
    <div class="menu">

        <a href = "Index.php">
        <div class="logo">
            <video autoplay loop muted playsinline id = "logo_animation">
                <source src="../Images/AnimatedLogo.webm" type="video/webm">
                <source src="../Images/Comp 2_1.mov" type="video/quicktime">
            </video>
        </div>
        </a>

        <ul class="navbar">
            <a href = "Queries.php"><li style = "font-size: 1.8em;"> <i class="fa-solid fa-envelope"></i> </li></a>
            <a href = "Jobs.php"><li> Jobs </li></a>
            <a href = "Appointments.php"><li> Appointments </li></a>
            <a href = "Choose.php"><li id = "sign_in_button" style = "<?php echo $sign_in_button_style?>"> <button class="login"> Sign In </button></li></a>
            <a href = "Profile.php" ><li id = "profile_icon" style = "<?php echo $icon_style?>"> 
                <button class="profile">
                    <?php if(isset($_SESSION['user_id'])){
                        echo substr($_SESSION['first_name'], 0, 1);
                    } ?>
                </button></li>
            </a>
        </ul>
    </div>
    
</nav>

<div class="body-content">
    
    <div class="side-bar-content">
        <div class="user">
            <button class="profile"> 
                <?php if(isset($_SESSION['user_id'])){
                        echo substr($_SESSION['first_name'], 0, 1);
                } ?>
            </button>
            <h1> 
                <?php 
                  
                        echo "Hi " . $_SESSION['first_name'] . "!";
                    
                ?>
            </h1>

        </div>

        <ul>
            <li>
                <div class="list-item" id = "account" onclick = "showAccount()">
                    <i class="fa-solid fa-user"></i>
                    <h1>Your Account</h1>
                </div>
            </li>
            <li>
                <div class="list-item" id = "cv" onclick = "showCV()">
                    <i class="fa-solid fa-clipboard"></i>
                    <h1>Profile</h1>
                </div>
            </li>
            <li>
                <div class="list-item" id = "savedJobs" onclick = "showSavedJobs()">
                    <i class="fa-solid fa-bookmark"></i>
                    <h1>Saved Jobs</h1>
                </div>
            </li>
        </ul>
    </div>

    <div id="response-div">
    <?php 
            while($row = mysqli_fetch_array($get_profile_result)) { 
              
                echo " <div id='profile-descriptions'>";
                    echo "<h1>Your Account</h1>";
                    echo "<div class='header'>";
                        echo "<img src='../Images/" . $row['profile_picture'] . "' alt='Profile Picture'>";
                        echo " <button>Upload Photo<i class='fa-solid fa-cloud-arrow-up'></i></button>";
                    echo "</div>";

                    echo "  <span class='line'></span>";

                    echo "<div class='user-details'>";
                        echo "<h3>User Details</h3>";
                        echo "<div class='name'>";
                            echo "<p>User: " . $row['first_name'] . " " . $row['last_name'] . "</p>";
                            echo "<button class = 'edit' " . $edit_button_style . ">Edit<i class='fa-solid fa-pen'></i></button>";
                        echo "</div>";

                        echo " <div class='email'>";
                            echo "<p>Email: " . $row['email'] . "</p>";
                            echo "<button class = 'edit' " . $edit_button_style . ">Edit<i class='fa-solid fa-pen'></i></button>";
                        echo "</div>";

                        echo " <span class='line'></span>";
                    echo "</div>";
               
                    echo "<div class='security'>";
                        echo "<h3>Security</h3>";
                        echo "<div class='password-div'>";
                            echo "<div class='password'>";
                                echo " <label for=''>Password</label>";
                                echo "<p>**********</p>";
                            echo "</div>";

                            
    
                       echo " <button class = 'edit' " . $edit_button_style . ">Edit<i class='fa-solid fa-pen'></i></button>";

                      
                    echo "</div>";

                
                    echo " <button class = 'logout' onclick = 'window.location.href=\"Logout.php\"'><i class='fa-solid fa-right-from-bracket'></i> Logout</button>";

    
                echo "</div>";
            echo "</div>";




            if($user_type == "Student") {

            echo "<div id='profile-and-cv'>";
                    echo "<h1>Profile</h1>";
                    echo "<span class='line'></span>";

                    echo "<div class='details'>";
                        echo "<div class='header-details'>";
                        echo "<h3>Personal Details</h3>";
                        echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                    echo "</div>";
            
                    echo "<div class='personal-details'>";
                        echo "<div class='personal-detail'>";
                            echo "<label for=''>First Name</label>";
                            echo "<p class = 'first'>" . $row['first_name'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Last Name</label>";
                        echo "<p>" . $row['last_name'] . "</p>";
                    echo "</div>";

                    if ($studentData) {

                        if (!empty($row['preferred_name'])) {
                            echo "<div class='personal-detail'>";
                                echo "<label for=''>Preferred Name</label>";
                                echo "<p>" . $row['preferred_name'] . "</p>";
                            echo "</div>";
                        }
                    } 

                   
    
                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Title</label>";
                        echo "<p>" . $row['title'] . "</p>";
                    echo "</div>";

                    
                    if ($studentData) {
                        

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Date of Birth</label>";
                        echo "<p>" . $row['birthday'] . "</p>";
                    echo "</div>";
    
                    } 
                    
                    echo "<span class='line'></span>";
                echo "</div>";


                echo "<div class='description'>";
                    echo "<div class='header-details'>";
                        echo "<h3>Description</h3>";
                        echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                    echo "</div>";

                    echo "<p>" . $row['biography'] . "</p>";
                    echo "<span class='line' style = 'margin-top: 80px;'></span>";
                echo "</div>";

    
                if ($studentData) {
                echo "<div class='header-details'>";
                    echo "<h3>Education</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";


                echo "<div class='education-details'>";
                    echo "<div class='education-detail'>";
                        echo "<label for=''>University</label>";
                        echo "<p class = 'university'>" . $row['university'] . "</p>";
                    echo "</div>";

                    echo "<div class='education-detail'>";
                        echo "<label for=''>Graduation Year</label>";
                        echo "<p>" . $row['graduation_year'] . "</p>";
                    echo "</div>";

                    echo "<div class='education-detail'>";
                        echo "<label for=''>Major</label>";
                        echo "<p>" . $row['major'] . "</p>";
                    echo "</div>";

                    echo "<div class='education-detail'>";
                        echo "<label for=''>Degree</label>";
                        echo "<p>" . $row['degree'] . "</p>";
                    echo "</div>";
                    
                    echo "<span class='line'></span>";

                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>Fields of Interest</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<div class='fields-details'>";
                    echo "<div class='interests'>";
                    while($row_interest = mysqli_fetch_array($get_student_interests_result)) { 
                        echo "<button class = 'interest'>" . $row_interest['interest_name'] . "</button>";
                    }
                    echo "</div>";
      
                    echo "<span class='line'></span>";
                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>Skills</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<div class='skills-details'>";

                    echo "<div class='skills-detail'>";
                        echo "<label for=''>Hard Skills</label>";
                        echo "<div class='hard-skills'>";
                            while($row_skills_hard = mysqli_fetch_array($get_student_skills_result)) { 
                                if ($row_skills_hard['skill_type'] == 'hard') {
                                    echo "<button class = 'hard-skill'>" . $row_skills_hard['skill_name'] . "</button>";
                                }
                            }
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='skills-detail'>";
                        echo "<label for=''>Soft Skills</label>";
                        echo "<div class='soft-skills'>";
                        
                         // Reset the result pointer to ensure second loop works
                        mysqli_data_seek($get_student_skills_result, 0);

                        while($row_skills_soft = mysqli_fetch_array($get_student_skills_result)) { 
                            if ($row_skills_soft['skill_type'] == 'soft') {
                                echo "<button class = 'soft-skill'>" . $row_skills_soft['skill_name'] . "</button>";
                            }
                        }
                        echo "</div>";
                    echo "</div>";

                    echo "<span class='line'></span>";
                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>CV Upload</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<!-- <div class='form-element' id = 'upload-stuff'>";
                    echo "<div class='button-wrap'>";
                        echo "<label class = 'upload-button' for = 'upload-file'> Add Files &ensp;<i class='fa-solid fa-cloud-arrow-up'></i></label>";
                        echo "<input type='file' id='upload-file' name='filename' multiple>";
                    echo "</div>";
                    echo "<div id='file-list'></div>";
                echo "</div> -->";

                echo "<div class='cv-details'>";
                    echo "<button class = 'file'>" . $row['cv_file'] . "</button>";
                    echo "<span class='line'></span>";
                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>Important Links</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<div class='link-details'>";
                    echo "<div class='links'>";
                        echo "<label for=''>Links</label>";
                            while($row_link_url = mysqli_fetch_array($get_student_links_result)) { 
                                echo "<button class = 'link'>";
                                    echo "<div class='text'>";
                                        echo "<a target = '_blank' href = '" . $row_link_url['link_url'] . "'>";
                                        echo "<p>" . $row_link_url['link_url'] . "</p>";
                                        echo "</a>";
                                    echo "</div>";
                                echo "</button>";
                            }
                
                    echo "</div>";

                    // Reset the result pointer to ensure second loop works
                    mysqli_data_seek($get_student_links_result, 0);
                    
                    echo "<div class='type'>";
                        echo "<label for=''>Categorization</label>";
                        while($row_link_category = mysqli_fetch_array($get_student_links_result)) { 
                            echo "<button class = 'link'>" . $row_link_category['link_type'] . "</button>";
                        }
                    echo "</div>";
                echo "</div>";

                echo "<span class='line end'></span>";

            echo "</div>";
        echo "</div>";
                    }
                } else {
                echo "<div id='profile-and-cv'>";
                    echo "<h1>Profile</h1>";
                    echo "<span class='line'></span>";

                echo "<div class='details'>";
                        echo "<div class='header-details'>";
                        echo "<h3>Personal Details</h3>";
                        echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                    echo "</div>";
            
                    echo "<div class='personal-details'>";
                        echo "<div class='personal-detail'>";
                            echo "<label for=''>First Name</label>";
                            echo "<p class = 'first'>" . $row['first_name'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Last Name</label>";
                        echo "<p>" . $row['last_name'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Title</label>";
                        echo "<p>" . $row['title'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Job Position</label>";
                        echo "<p>" . $row['job_title'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Phone Number</label>";
                        echo "<p>" . $row['phone_number'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Phone Type</label>";
                        echo "<p>" . $row['phone_type'] . "</p>";
                    echo "</div>";

                    echo "<div class='personal-detail'>";
                        echo "<label for=''>Form of Contact</label>";
                        echo "<p>" . $row['type_of_contact'] . "</p>";
                    echo "</div>";

                    
                    echo "<span class='line'></span>";
                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>Organization Details</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<div class='education-details'>";
                    echo "<div class='education-detail'>";
                        echo "<label for=''>Company Name:</label>";
                        echo "<p class = 'university'>" . $row['organization_name'] . "</p>";
                    echo "</div>";

                    echo "<div class='education-detail'>";
                        echo "<label for=''>Business Area:</label>";
                        echo "<p class = 'university'>" . $row['business_area'] . "</p>";
                    echo "</div>";

                    echo "<div class='education-detail'>";
                        echo "<label for=''>Website: </label>";
                        echo "<a href = '" . $row['website_link'] ."'>";
                        echo "<p class = 'university'>" . $row['website_link'] . "</p>";
                        echo "</a>";
                    echo "</div>";

        

                    echo "<div class='education-detail' style = 'width: 100%;'>";
                        echo "<label for=''>Description:</label>";
                        echo "<p class = 'description'>" . $row['biography'] . "</p>";
                    echo "</div>";

                    echo "<span class='line' style = 'margin-top: 80px;'></span>";
                echo "</div>";

                echo "<div class='header-details'>";
                    echo "<h3>Location</h3>";
                    echo "<button class = 'edit'>Edit<i class='fa-solid fa-pen'></i></button>";
                echo "</div>";

                echo "<div class='education-details'>";
                echo "<div class='education-detail'>";
                        echo "<label for=''>Address:</label>";
                        echo "<p class = 'university'>" . $row['address'] . "</p>";
                echo "</div>";

                echo "<div class='education-detail'>";
                        echo "<label for=''>City:</label>";
                        echo "<p class = 'university'>" . $row['city'] . "</p>";
                echo "</div>";

                echo "<div class='education-detail'>";
                        echo "<label for=''>Eircode:</label>";
                        echo "<p class = 'university'>" . $row['eircode'] . "</p>";
                echo "</div>";

                echo "<div class='education-detail'>";
                        echo "<label for=''>Country:</label>";
                        echo "<p class = 'university'>" . $row['country'] . "</p>";
                echo "</div>";

                echo "</div>";


                    

                echo "</div>";

                    
                    

                echo "</div>";
            }


        
      

                }

             
            

            echo "<div id='saved-jobs'>";
                echo "<div id = 'saved-header'>";
                echo "<h1>Saved Jobs</h1>";
                echo "<span class='line'></span>";
                echo "</div>";
                echo "<div id = 'view-job'></div>";
                echo "<div class='listed-jobs' id = 'listed-jobs'>";

            while($row_saved_jobs = mysqli_fetch_array($get_saved_jobs_result)) {
                echo "<div class = 'job-listing' id = 'container-div' >";
                    echo " <div onclick = 'viewSavedJob(" . $row_saved_jobs['job_id'] .")' class='job-item' job-id = '" . $row_saved_jobs['job_id'] . "'>"; 
                    echo "<div class='company-title'>";
                        echo "<img src='../Images/" . $row_saved_jobs['profile_picture'] . "' alt=''>";
                        echo " <h4>" . $row_saved_jobs['organization_name'] . "</h4>";
                    echo " </div>";
                    echo "<h2> " . $row_saved_jobs['position_title'] . "</h2>";
                    echo "<p> " . $row_saved_jobs['job_type'] . " | " . $row_saved_jobs['location'] . " </p>";
                    echo "<p>" . $row_saved_jobs['salary'] . "</p>";
                    echo "<p> " . $row_saved_jobs['days_remaining'] . " days to apply</p>";

                    echo "</div>";

                    echo "<button onclick = 'saveJobs(event, " . $row_saved_jobs['job_id'] . ")'>Unsave<i class='fa-solid fa-bookmark'></i></button>";
 
                    echo "<br><br>";
                echo "</div>"; 
            }

                echo "</div>";
            echo "</div>";
            

        ?> 
      
    </div>

</div>

<div class = "divider" style = "border-top: none;"></div>


<footer>
    <div class="footer">
        <div class="logo_background">
            <img src="../Images/Final_Logo.png" alt="ATU Career Path Logo">
            <p>© 2025 GTI Futures Ltd.</p>
        </div>

        <div class="footer-navigation">
        

            <ul>
                <li class = 'head-item'>Useful Sites </li>
                <a target = "_blank" href = "https://gradireland.com/"><li>GradIreland</li></a>
                <a target = "_blank" href = "https://www.linkedin.com/"><li>LinkedIn</li></a>
                <a target = "_blank" href = "https://ie.indeed.com/"><li>Indeed</li></a>
                <a target = "_blank" href = "https://www.atu.ie/student-life/student-support/careers/students-and-graduates"><li>Careers Services</li></a>
            </ul>

            <ul>
                <li class = 'head-item'>Go To</li>
                <a href = "Jobs.php"><li>Jobs </li></a>
                <a href = "Appointments.php"><li>Appointments </li></a>
                <a href = "Queries.php"><li>Queries</li></a>
            </ul>

            <ul>
                <li class = 'head-item'>Follow Us</li>
                <a target = "_blank" href = "https://www.linkedin.com/in/gmit-careers-service-guidance/?originalSubdomain=ie"><li> <i class="fa-brands fa-linkedin"></i> LinkedIn</li></a>
                <a target = "_blank" href = "https://www.facebook.com/GMITCareersOffice/"><li> <i class="fa-brands fa-square-facebook"></i> Facebook</li></a>
                <a target = "_blank" href = "https://www.instagram.com/atugalwaycity/?hl=en"><li> <i class="fa-brands fa-instagram"></i> Instagram</li></a>
                <a target = "_blank" href = "https://www.tiktok.com/@atugalwaycity"><li> <i class="fa-brands fa-tiktok"></i> TikTok</li></a>
            </ul>

        </div>
        
    </div>
</footer>


</body>

<script src = "../JS/Profile.js"></script>
<script src = "../JS/Utils.js"></script>
</html>