<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Home.css">





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

<div class="search">

    <div class="videoDiv">
        <div class="backdrop"></div>
        <video id="video" width="100%" height="auto" autoplay muted loop>
            <source src="../Images/Video.mp4" type="video/mp4">
            <source src="" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        

    </div>


    <div class="box">
        <h1>Pursue Your Aspirations and Find Your Future!</h1>
        <p>Explore new and exciting opportunities for your career through ATU Career Path. The smooth transition between ATU 
           certification to employment can be found here. Everything from summer internships to permanent job positions. 
           Connect with employers today!
        </p>

        <form method="GET">
            <div class="search-and-find">
                <input type="text" class="find" name="query" placeholder="Search jobs">
                <button type="submit"> 
                    <i class="fa-solid fa-magnifying-glass"></i> 
                </button>
            </div>
        </form>


    </div>

    <div class="transparent"></div>
  
</div>

<div class = "divider" style = "margin-top: 70px;"></div>

<div class="body-content">

    <div class="subsection">
        <div class="image-outline">
            <img src="../Images/Handshake.png" alt="ATU Career Path Logo">
        </div>

        <div class="text-content">
            <h1> Career Discovery </h1>

            <div class = "underline">
                <span></span>
            </div>

            <p>
                We are a dynamic platform designed to bridge the gap between ambition and opportunity 
                for both students and employers. ATU students can leverage this resource to discover career paths, connect 
                with potential employers, and build meaningful professional relationships that align with their aspirations.
                At the same time, companies can use the platform to engage with emerging talent from ATU—motivated and 
                forward-thinking students eager to make their mark in the professional world. This mutually beneficial 
                ecosystem fosters collaboration, innovation, and growth, ensuring that ATU students have a launchpad for 
                success while companies gain access to a pool of skilled and driven individuals ready to contribute. It's 
                a win-win for students and employers alike.
            </p>
        </div>
    </div>

    <div class="subsection second">
        <div class="text-content">
            <h1> Appointments </h1>
            
            <div class = "underline" style = "justify-content: start;">
                <span></span>
            </div>

            <p> Students can conveniently book appointments through our website to access a wide array of career support 
                services tailored to their professional journey. Whether it's perfecting their CV, preparing for upcoming 
                interviews, exploring part-time work opportunities, or diving into graduate programs, they can find all 
                the guidance they need. The platform also allows students to browse current vacancies, gain insights into 
                career advice, and develop the skills required to stand out in competitive job markets. With just a few clicks, 
                ATU students can connect with career advisors who are dedicated to empowering them to achieve their goals and 
                navigate their career paths confidently.
            </p>
        </div>

        <div class="image-outline" style = "background-color: #008080;">
            <img src="../Images/Calendar.jpg" alt="ATU Career Path Logo" style = "float: right; margin-right: 0px; margin-left: 20px; margin-bottom: 15px;">
        </div>
    </div>

    <div class="subsection">
        <div class="image-outline" style = "background-color: #B1D5E6;" >
            <img src="../Images/Question.png" alt="ATU Career Path Logo">
        </div>
        
        <div class="text-content">
            <h1> Queries </h1>

            <div class = "underline">
                <span  style = "width: 25%;"></span>
            </div>

            <p> Students can easily connect with professional career advisors through our dedicated queries form, designed to address any 
                concerns or questions they may have about their career journey. Whether seeking personalized guidance on career planning, 
                navigating job opportunities, or addressing specific challenges, students can submit their queries directly to our team of 
                experts. This seamless communication channel ensures that every student has access to tailored advice and support, empowering 
                them to take confident steps toward achieving their professional goals.
            </p>
        </div>
    </div>

</div>

<div class = "divider" style = "border-top: none; margin-top: 100px;"></div>


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

<script src = "../JS/Utils.js"></script>
<script src = "../JS/Jobs.js"></script>
</html>