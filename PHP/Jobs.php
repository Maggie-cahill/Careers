<!DOCTYPE html>
<html>
<head>
<title>Jobs</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Jobs.css">

</head>

<body>

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


$page = isset($filters['page']) ? intval($filters['page']) : 1;
$limit = 7; // set jobs per page
$offset = ($page - 1) * $limit;

$sql = "SELECT *, DATEDIFF(j.closing_date, CURRENT_DATE) AS days_remaining FROM Jobs j 
        JOIN Employer_Profiles ep ON j.profile_id = ep.profile_id 
        ORDER BY j.job_id 
        LIMIT $limit OFFSET $offset";
        
$count_statement = "SELECT COUNT(*) AS count FROM Jobs";

$job_result = $conn->query($sql);
$total_jobs = $conn->query($count_statement)->fetch_assoc()['count'];
$total_pages = ceil($total_jobs / $limit);



$icon_style = "display: none";
$sign_in_button_style = "display: block";

if(isset($_SESSION['user_id'])){
    $icon_style = "display: block";
    $sign_in_button_style = "display: none";

    $saved_jobs = "SELECT job_id from Saved_Jobs where user_id = " . $_SESSION['user_id'] . ";";
    $saved_jobs_result = $conn->query($saved_jobs);

    $check_user_type = "SELECT user_type from Users where user_id = " . $_SESSION['user_id'] . ";";
    $check_user_type_result = $conn->query($check_user_type);

    if ($check_user_type_result->num_rows > 0) {
        $row = $check_user_type_result->fetch_assoc(); 
        $user_type = $row['user_type']; // assign user_type value


        if($user_type == "Student") {
            $get_name = "SELECT first_name from Student_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);
        } else if ($user_type == "Employer") {
            $get_name = "SELECT first_name from Employer_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);
        }
    
        if ($get_name_result->num_rows > 0) {
            $row2 = $get_name_result->fetch_assoc(); 
            $name = $row2['first_name']; // assign first_name value
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
    <div class="title-content">
        <h1>Find Career Opportunities</h1>

     
        
            <div id="search-and-filter">
                <div class="form-element search">
                    <input type="text" id = "search-keyword">
                    <button type="" id = "glass"> 
                        <i class="fa-solid fa-magnifying-glass"></i> 
                    </button>
                    <button id = "arrow" onclick = "updateSelection()">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                
                <div class="filter-content">

                    <div class="form-element">
                        <div class="custom-dropdown" onclick="toggleDropdown(event)" style = "padding-right: 75px;" >
                            <div class="dropdown-selected" id="roleType" >Role Type</div>
                                <div class="dropdown-options" id="dropdown-options" style = " width: 167px;">
                                    <label class="option"><input type="checkbox" value="Internship" onchange="updateSelection()"> Internship</label>
                                    <label class="option"><input type="checkbox" value="Work Placement" onchange="updateSelection()"> Work Placement</label>
                                    <label class="option"><input type="checkbox" value="Graduate Program" onchange="updateSelection()"> Graduate Program</label>
                                    <label class="option"><input type="checkbox" value="Entry-Level" onchange="updateSelection()">Entry-Level</label>
                                    <label class="option"><input type="checkbox" value="Experienced" onchange="updateSelection()">Experienced</label>

                                </div>

                                <div class="select-icon">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                        </div>
                    </div>
                   

                    <div class="form-element">
                        <div class="custom-dropdown" onclick="toggleDropdown(event)" >
                            <div class="dropdown-selected" id="environment" >Environment</div>
                                <div class="dropdown-options" id="dropdown-options" style = " width: 166px;">
                                    <label class="option"><input type="checkbox" value="In-Person" onchange="updateSelection()"> In-Person</label>
                                    <label class="option"><input type="checkbox" value="Remote" onchange="updateSelection()"> Remote</label>
                                    <label class="option"><input type="checkbox" value="Hybrid" onchange="updateSelection()"> Hybrid</label>
                                
                                </div>

                                <div class="select-icon">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                        </div>
                    </div>



                    <div class="form-element">
                        <div class="custom-dropdown" onclick="toggleDropdown(event)" style = "padding-right: 72px;">
                            <div class="dropdown-selected" id="hours">Hours</div>
                                <div class="dropdown-options" id="dropdown-options" style = " width: 127px;">
                                    <label class="option"><input type="checkbox" value="Full-Time" onchange="updateSelection()"> Full-Time</label>
                                    <label class="option"><input type="checkbox" value="Part-Time" onchange="updateSelection()"> Part-Time</label>
                                    <label class="option"><input type="checkbox" value="Contract" onchange="updateSelection()"> Contract</label>
                                
                                </div>

                                <div class="select-icon">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                        </div>
                    </div>
                    
                   

                    <div class="form-element">
                        <div class="custom-dropdown" onclick="toggleDropdown(event)" style = "padding-right: 112px;">
                            <div class="dropdown-selected"  id="jobField">Job Field</div>

                            <div class="dropdown-options" id="dropdown-options" style = "width: 200px;">
                                <label class="option"><input type="checkbox" value="Accountancy and Financial Management" onchange="updateSelection()"> Accountancy and Financial Management</label>
                                <label class="option"><input type="checkbox" value="Agriculture, Forestry, and Fisheries" onchange="updateSelection()"> Agriculture, Forestry, and Fisheries</label>
                                <label class="option"><input type="checkbox" value="Construction, Civil Engineering and QS" onchange="updateSelection()"> Construction, Civil Engineering and QS</label>
                                <label class="option"><input type="checkbox" value="Creative Art & Design" onchange="updateSelection()"> Creative Art & Design</label>
                                <label class="option"><input type="checkbox" value="Engineering" onchange="updateSelection()"> Engineering</label>
                                <label class="option"><input type="checkbox" value="Hospitality, Sport, Leisure, and Tourism" onchange="updateSelection()"> Hospitality, Sport, Leisure, and Tourism</label>
                                <label class="option"><input type="checkbox" value="Human Resources, Recruitment, and Training" onchange="updateSelection()"> Human Resources, Recruitment, and Training</label>
                                <label class="option"><input type="checkbox" value="IT and Telecoms" onchange="updateSelection()"> IT and Telecoms</label>
                                <label class="option"><input type="checkbox" value="Manufacturing and Processing" onchange="updateSelection()"> Manufacturing and Processing</label>
                                <label class="option"><input type="checkbox" value="Medical and Healthcare" onchange="updateSelection()"> Medical and Healthcare</label>
                                <label class="option"><input type="checkbox" value="Other" onchange="updateSelection()"> Other</label>
                                <label class="option"><input type="checkbox" value="Public Sector and Civil Service" onchange="updateSelection()"> Public Sector and Civil Service</label>
                                <label class="option"><input type="checkbox" value="Retail, Sales, and Customer Services" onchange="updateSelection()"> Retail, Sales, and Customer Services</label>
                                <label class="option"><input type="checkbox" value="Science, Research, and Development" onchange="updateSelection()"> Science, Research, and Development</label>
                            </div>


                            <div class="select-icon">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                        </div>
                    </div>

              

                    <div class="form-element">
                        <div class="custom-dropdown" onclick="toggleDropdown(event)" style = "padding-right: 84px;">
                            <div class="dropdown-selected"  id="location">Location</div>
                                <div class="dropdown-options" id="dropdown-options"  style = "width: 168px;">
                                    <label class="option"><input type="checkbox" value="Outside Ireland" onchange="updateSelection()"> Outside Ireland</label>
                                    <label class="option"><input type="checkbox" value="Dublin" onchange="updateSelection()"> Dublin</label>
                                    <label class="option"><input type="checkbox" value="Galway" onchange="updateSelection()"> Galway</label>
                                    <label class="option"><input type="checkbox" value="Cork" onchange="updateSelection()"> Cork</label>
                                    <label class="option"><input type="checkbox" value="Limerick" onchange="updateSelection()"> Limerick</label>
                                    <label class="option"><input type="checkbox" value="Waterford" onchange="updateSelection()"> Waterford</label>
                                    <label class="option"><input type="checkbox" value="Belfast" onchange="updateSelection()"> Belfast</label>
                                    <label class="option"><input type="checkbox" value="Kilkenny" onchange="updateSelection()"> Kilkenny</label>
                                    <label class="option"><input type="checkbox" value="Derry" onchange="updateSelection()"> Derry</label>
                                    <label class="option"><input type="checkbox" value="Sligo" onchange="updateSelection()"> Sligo</label>
                                    <label class="option"><input type="checkbox" value="Wexford" onchange="updateSelection()"> Wexford</label>
                                    <label class="option"><input type="checkbox" value="Athlone" onchange="updateSelection()"> Athlone</label>
                                    <label class="option"><input type="checkbox" value="Drogheda" onchange="updateSelection()"> Drogheda</label>
                                    <label class="option"><input type="checkbox" value="Navan" onchange="updateSelection()"> Navan</label>
                                    <label class="option"><input type="checkbox" value="Ennis" onchange="updateSelection()"> Ennis</label>
                                    <label class="option"><input type="checkbox" value="Tralee" onchange="updateSelection()"> Tralee</label>
                                    <label class="option"><input type="checkbox" value="Letterkenny" onchange="updateSelection()"> Letterkenny</label>
                                    <label class="option"><input type="checkbox" value="Newry" onchange="updateSelection()"> Newry</label>
                                    <label class="option"><input type="checkbox" value="Castlebar" onchange="updateSelection()"> Castlebar</label>
                                    <label class="option"><input type="checkbox" value="Arklow" onchange="updateSelection()"> Arklow</label>
                                    <label class="option"><input type="checkbox" value="Thurles" onchange="updateSelection()"> Thurles</label>
                                    <label class="option"><input type="checkbox" value="Clonmel" onchange="updateSelection()"> Clonmel</label>
                                    <label class="option"><input type="checkbox" value="Mullingar" onchange="updateSelection()"> Mullingar</label>
                                    <label class="option"><input type="checkbox" value="Banbridge" onchange="updateSelection()"> Banbridge</label>
                                    <label class="option"><input type="checkbox" value="Carrick-on-Shannon" onchange="updateSelection()"> Carrick-on-Shannon</label>
                                    <label class="option"><input type="checkbox" value="Antrim" onchange="updateSelection()"> Antrim</label>
                                    <label class="option"><input type="checkbox" value="Dungarvan" onchange="updateSelection()"> Dungarvan</label>
                                    <label class="option"><input type="checkbox" value="Roscommon" onchange="updateSelection()"> Roscommon</label>
                                    <label class="option"><input type="checkbox" value="Cavan" onchange="updateSelection()"> Cavan</label>
                                    <label class="option"><input type="checkbox" value="Tullamore" onchange="updateSelection()"> Tullamore</label>
                                    <label class="option"><input type="checkbox" value="Ballina" onchange="updateSelection()"> Ballina</label>
                                    <label class="option"><input type="checkbox" value="Monaghan" onchange="updateSelection()"> Monaghan</label>
                                    <label class="option"><input type="checkbox" value="Nenagh" onchange="updateSelection()"> Nenagh</label>
                                    <label class="option"><input type="checkbox" value="Portlaoise" onchange="updateSelection()"> Portlaoise</label>
                                    <label class="option"><input type="checkbox" value="Balbriggan" onchange="updateSelection()"> Balbriggan</label>
                                    <label class="option"><input type="checkbox" value="Youghal" onchange="updateSelection()"> Youghal</label>
                                </div>

                                <div class="select-icon">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                        </div>
                    </div>

                    
                    
                </div>
                
                
            </div>
      
    </div>
    
</div>

<div class = "divider"></div>

<div id="job-content-div">

<div id="extended-job-list">
    <div id="job-list">
     
    <?php 
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
        ?> 
        <br><br><br>
        <div class="bottom-blur"></div>
        </div>
        
        <div class="pagination">
            <?php if ($page > 1): ?>
                <button onclick="changePage(<?php echo ($page - 1) ?>)" class = "page_buttons"><i class="fa-solid fa-angles-left"></i></button>
            <?php endif; ?>
            <span>Page <?php echo $page?> of <?php echo $total_pages?></span>
            <?php if ($page < $total_pages): ?>
                <button onclick="changePage(<?php echo ($page + 1); ?>)" class = "page_buttons"><i class="fa-solid fa-angles-right"></i></button>
            <?php endif; ?>
        </div>

        
        

    </div>

  


   

    <div id="job-information">
    
    </div>
</div>


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
<script src = "../JS/Jobs.js"></script>
</html>