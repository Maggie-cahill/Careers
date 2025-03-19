<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Appointments.css">





</head>

<body>

<nav>
    <div class="menu">

        <a href = "Index.php">
        <div class="logo">
            <img src="../Images/Final_Logo.png" alt="ATU Career Path Logo">
        </div>
        </a>

        <ul class="navbar">
            <a href = "Queries.php"><li style = "font-size: 1.8em;"> <i class="fa-solid fa-envelope"></i> </li></a>
            <a href = "Jobs.php"><li> Jobs </li></a>
            <a href = "Appointments.php"><li> Appointments </li></a>
            <a href = "Login.php"><li> <button class="login"> Sign In </button></li></a>
        </ul>
    </div>
    
</nav>

<div class="body-content">

    <div class="title-background">
        <div class="title">
            <h1>Schedule Appointments</h1>
        </div>
    </div>

    <div class="subtext">
        <h1> Let's Start a Conversation!</h1>
        <p>
            "questions and concerns" is correct and usable in written English. You can use it to express that 
            something raises both questions and concerns--for example: The proposed changes to the health care 
            system have raised a number of questions and concerns. "questions and concerns" is correct and usable 
            in written English. You can use it to express that something raises both questions and concerns--for example: 
            The proposed changes to the health care system have raised a number of questions and concerns.
        </p>
    </div>

    

    <div class = "divider"></div>

    <div class="appointment-list">
        <div class="hours-div">
        <div class="hours">
            <h1> Careers Office Hours</h1>
            
            

            <table>
                <tr>
                    <th></th>
                    <th> Monday </th>
                    <th> Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
                <tr>
                    <th>Opens</th>
                    <td> 9:00 </td>
                    <td> 9:00 </td>
                    <td> 9:00 </td>
                    <td> 9:00 </td>
                    <td> 9:00 </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <th></th>
                    <td> to</td>
                    <td> to</td>
                    <td> to</td>
                    <td> to</td>
                    <td> to</td>
                    <td>CLOSED</td>
                    <td>CLOSED</td>
                </tr>
               
                <tr>
                    <th>Closes</th>
                    <td> 17:00</td>
                    <td> 17:00</td>
                    <td> 17:00</td>
                    <td> 17:00</td>
                    <td> 16:00</td>
                    <td></td>
                    <td> </td>
                </tr>
                
            </table>
        </div>
        </div>
        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> CV Check </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Career Advice </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Interview Prep </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Vacancies</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Applying For Jobs</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1>  Looking For Part Time Work </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Applying For Graduate Programs</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking">Request Booking</button>
            </div>
        </div>
    </div>


</div>

<div class = "divider" style = "border-top: none; margin-top: 100px;"></div>

<div class="booking-form">
    <div class="booking-form-content">

        <form action="" id = "booking">
            <div class="form-element">
                <label for="date">Select a date:</label>
                <input type="date" id="date" name = "date">
            </div>

            <div class="form-element">
                <label for="time">Select a time:</label>
                <input type="text" id="time" name = "time">
            </div>

            <div class="form-element">
                <label for="describe">Describe your situation:</label>
                <textarea name="describe" id="describe"></textarea>
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

            <div class="form-element" id = "submit-div">
                <button type="submit" value = "Submit" id = "submit" >Send</button>
            </div>


        </form>
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
                <li>Legal</li>
                <li>ATU Privacy Policy </li>
                <li>Terms and Conditions </li>
                <li>Accessibility</li>
            </ul>

            <ul>
                <li>Useful Sites </li>
                <li>GradIreland</li>
                <li>LinkedIn</li>
                <li>Indeed</li>
                <li>Career Advice</li>
            </ul>

            <ul>
                <li>Go To</li>
                <li>Jobs </li>
                <li>Appointments </li>
                <li>Queries</li>
                <li>Your Profile</li>
            </ul>

            <ul>
                <li>Follow Us</li>
                <li> <i class="fa-brands fa-linkedin"></i> LinkedIn</li>
                <li> <i class="fa-brands fa-square-facebook"></i> Facebook</li>
                <li> <i class="fa-brands fa-instagram"></i> Instagram</li>
                <li> <i class="fa-brands fa-tiktok"></i> TikTok</li>
            </ul>

        </div>
        
    </div>
</footer>


</body>

</html>