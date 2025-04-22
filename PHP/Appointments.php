<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Appointments.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">




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
        $user_type = $row['user_type']; // asssign user_type value


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
<div id="backdrop"></div>
<div class="body-content">

    <div class="title-background">
        <div class="title">
            <h1>Schedule Appointments</h1>
        </div>
    </div>

    <div class="subtext">
        <h1> Let's Start a Conversation!</h1>
        <p>
        Our appointments page is your gateway to personalized career support, offering a streamlined way for 
        students to book sessions with professional advisors across multiple categories. Whether you need expert 
        advice on crafting an impactful CV, preparing for interviews, exploring graduate programs, or finding 
        part-time work and current vacancies, our team is here to guide you every step of the way. With just 
        a few clicks, students can schedule a session to address their specific needs and gain tailored insights 
        that help them navigate their career journey confidently.
        </p>
    </div>

    

    <div class = "divider"></div>

    <div class="appointment-list">
        <div class="hours-div">
        <div class="hours">
            <h1> Careers Office Hours</h1>
            
            

            <table style = "text-align:center;">
                <tr>
                    <th></th>
                    <th> Monday - Thursday </th>
                    <th> Friday </th>
                    <th>Saturday & Sunday</th>
                </tr>
                <tr>
                    <th>Opens</th>
                    <td> 9:00 </td>
                    <td> 9:00 </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <th></th>
                    <td> to</td>
                    <td> to</td>
                    <td>CLOSED</td>
                </tr>
               
                <tr>
                    <th>Closes</th>
                    <td> 17:00</td>
                    <td> 16:00</td>
                    <td></td>
                    <td> </td>
                </tr>
                
            </table>
        </div>
        </div>
        <div class="appointment-element" >
            <img src="../Images/CV_Check.JPG" alt="">
            <div class="text-content">
                <h1> CV Check </h1>
                <p>Get tailored feedback to refine and enhance your CV for job applications.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="CV Check">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element" >
            <img src="../Images/Career_Advice.jpg" alt="">
            <div class="text-content">
                <h1> Career Advice </h1>
                <p> Receive personalized guidance from expert advisors to explore career options, set goals, and navigate 
                    challenges in your professional journey.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="Career Advice">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element" >
            <img src="../Images/Interview.JPG" alt="">
            <div class="text-content">
                <h1> Interview Prep </h1>
                <p> Get professional tips and strategies to boost your confidence and excel in interviews.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="Interview Prep">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element" >
            <img src="../Images/Vacancy.jpg" alt="">
            <div class="text-content">
                <h1> Vacancies</h1>
                <p> Explore current job opportunities tailored to your skills and aspirations.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="Vacancy">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element" >
            <img src="../Images/Job_Application.jpg" alt="">
            <div class="text-content">
                <h1> Applying For Jobs</h1>
                <p> Get expert support to craft strong applications and confidently apply for your desired roles.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="Applying for Jobs">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element" >
            <img src="../Images/Part_Time.jpg" alt="">
            <div class="text-content">
                <h1>  Looking For Part Time Work </h1>
                <p> Receive guidance on finding part-time opportunities that align with your schedule and skills.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" data-type="Part Time">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element graduate" data-type="Graduate Program">
            <div class="image-div">
                <img src="../Images/Graduate.jpg" alt="">
            </div>
            <div class="text-content">
                <h1> Applying For Graduate Programs</h1>
                <p>Get expert assistance to navigate graduate program applications and stand out as a candidate.</p>
                <button id = "request_booking" onclick = "showFormModal(event)" >Request Booking</button>
            </div>
        </div>

        <div id="booking-form-div">
            <div class="booking-form">
                <h1>Request Appointment</h1>
                <span id = "close-form-modal" onclick = "closeFormModal()">&times</span>
                    <form action="SendAppointment.php" method="POST" enctype="multipart/form-data" id = "booking">
                        <input type="hidden" id="appointment-type" name="appointment-type">

                        <div class="booking-form-content">
                
                            <div class="form-element">
                                <label for="date">Select a date:</label>
                                <div class = "input-div" id = "input-div">
                                    <input type="text" id="date-picker" name = "date-picker" placeholder = "Requested Date" required >
                                    <i class="fa-solid fa-calendar-days" id = "calendar-icon"></i>
                                </div>
                            </div>

                            <div class="form-element">
                                <label for="time">Select a time:</label>
                                <div class = "input-div" id = "input-div">
                                    <input type="text" id="time" name = "time" placeholder = "Time" required>
                                    <i class="fa-solid fa-clock" id = "calendar-icon"></i>
                                </div>
                            </div>

                            <div class="form-element describe">
                                <label for="describe">Describe your situation:</label>
                                <div class = "input-div">
                                    <textarea name="describe" id="describe" required></textarea>
                                </div>
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
                                    echo "<p style = 'color: red'>" . $_SESSION['error_appointment_message']. "</p> ";
                                echo "</div>";
                            }
                            ?>

                            <div class="form-element" id = "submit-div">
                            <?php 
                                if(isset($_SESSION['user_id'])){
                                    echo "<button type='submit' value = 'Submit' id = 'submit' >Send Request </button>";
                                } else {
                                    echo "<button type = 'button' id = 'submit' onclick = 'window.location.href=\"Choose.php\" ' >Send Request</button>";

                                }
                            ?>
                            </div>


                            <div class="time-lists-div" id = "time-modal">
                                <div class="time-list">
                                    <h2>Select a time:</h2>

                                    <div class="timeslots">
                                        <div class = "time">
                                        <input type="radio" id = "slot-9" name = "timeslot" value = "9:00">
                                        <label for="slot-9">9:00 </label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-93" name = "timeslot" value = "9:30">
                                        <label for="slot-93">9:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-10" name = "timeslot" value = "10:00">
                                        <label for="slot-10">10:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-103" name = "timeslot" value = "10:30">
                                        <label for="slot-103">10:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-11" name = "timeslot" value = "11:00">
                                        <label for="slot-11">11:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-113" name = "timeslot" value = "11:30">
                                        <label for="slot-113">11:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-12" name = "timeslot" value = "12:00">
                                        <label for="slot-12">12:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-123" name = "timeslot" value = "12:30">
                                        <label for="slot-123">12:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-13" name = "timeslot" value = "13:00">
                                        <label for="slot-13">13:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-133" name = "timeslot" value = "13:30">
                                        <label for="slot-133">13:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-14" name = "timeslot" value = "14:00">
                                        <label for="slot-14">14:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-143" name = "timeslot" value = "14:30">
                                        <label for="slot-143">14:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-15" name = "timeslot" value = "15:00">
                                        <label for="slot-15">15:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-153" name = "timeslot" value = "15:30">
                                        <label for="slot-153">15:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-16" name = "timeslot" value = "16:00">
                                        <label for="slot-16">16:00</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-163" name = "timeslot" value = "16:30">
                                        <label for="slot-163">16:30</label>
                                        </div>

                                        <div class = "time">
                                        <input type="radio" id = "slot-17" name = "timeslot" value = "17:00">
                                        <label for="slot-17">17:00</label>
                                        </div>
                                        
                                        <span id="close-modal">&times</span>

                                        
                                    </div>


                                </div>
                            </div>

                        </div>
                    </form>
            
            </div>
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src = "../JS/Appointments.js"></script>
<script src = "../JS/Queries.js"></script>
<script src = "../JS/Utils.js"></script>
</body>

</html>