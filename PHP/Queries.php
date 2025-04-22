<!DOCTYPE html>
<html>
<head>
<title>Queries</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Queries.css">

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

if(isset($_SESSION['user_id'])){
    $icon_style = "display: block";
    $sign_in_button_style = "display: none";

    $check_user_type = "SELECT user_type from Users where user_id = " . $_SESSION['user_id'] . ";";
    $check_user_type_result = $conn->query($check_user_type);

    if ($check_user_type_result->num_rows > 0) {
        $row = $check_user_type_result->fetch_assoc(); 
        $user_type = $row['user_type']; // assign user_type value


        if($user_type == "Student") {
            $get_name = "SELECT first_name from Student_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);
        } else {
            $get_name = "SELECT first_name from Employer_Profiles where user_id = " . $_SESSION['user_id'] . ";";
            $get_name_result = $conn->query($get_name);
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

    <div class="title-background">
        <div class="title">
            <h1>Questions or Concerns?</h1>
        </div>
    </div>

    <div class="form-content">
        <div class="form-header">
            <h1>Send Us Your Questions!</h1>
            <p class = "subtext">Fill out the form and submit below. You must be signed into your account to submit a query</p>
        </div>
     
        <form action="SendQuery.php" method="POST" enctype="multipart/form-data">
        <div class="form-body">
            <div class="form-element">
                <label for="type-of-question">Type of Question &ensp; *</label>
                <select name="type-of-question" id="type-of-question" required>
                    <option value="default">Select One</option>
                    <option value="Applying for jobs">Applying For Jobs</option>
                    <option value="CV Help">CV Help and Feedback</option>
                    <option value="Career Advice">Career Advice</option>
                    <option value="Part Time Work">Find Part Time Work</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-element">
                <label for="subject">Subject &ensp; *</label>
                <input type="text" name = "subject" id = "subject" required>
            </div>

            <div class="form-element">
                <label for="question-description">Message &ensp;*</label>
                <textarea name="question-description" id="question-description" required></textarea>
            </div>

            <div class="form-element" id = "upload-stuff">
                <label for="upload-files" style = "width: 100%;">Upload Files</label>
                <div class="button-wrap">
                    <label class = "upload-button" for = "upload-file"> Add Files &ensp;<i class="fa-solid fa-cloud-arrow-up"></i></label>
                    <input type="file" id="upload-file" name="filename" multiple> 
                </div>
                <div id="file-list"></div>
            </div>

            <div class="form-element">
                <span class = "separator"></span>
            </div>

            <?php if(isset($_SESSION['error_message'])){
                echo "<div class='form-element'>";
                    echo "<p style = 'color: red'>" . $_SESSION['error_message']. "</p> ";
                echo "</div>";
            }
          
               
            ?>
            <div class="form-element" id = "submit-div">
            <?php 
            if(isset($_SESSION['user_id'])){
                echo "<button type='submit' value = 'Submit' id = 'submit' >Send</button>";
            } else {
                echo "<button type = 'button' id = 'submit' onclick = 'window.location.href=\"Choose.php\" ' >Send</button>";

            }
            ?>
            </div>

        </div>
    </form>

    </div>
</div>

<div class = "divider" ></div>

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

<script src="../JS/Queries.js" defer></script>
<script src = "../JS/Utils.js"></script>
</html>