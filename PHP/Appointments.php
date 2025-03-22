<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Appointments.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">




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
            <a href = "Choose.php"><li> <button class="login"> Sign In </button></li></a>
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
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Career Advice </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Interview Prep </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Vacancies</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Applying For Jobs</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1>  Looking For Part Time Work </h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()">Request Booking</button>
            </div>
        </div>

        <div class="appointment-element">
            <img src="../Images/Office.jpg" alt="">
            <div class="text-content">
                <h1> Applying For Graduate Programs</h1>
                <p> Random description for the appointment type and what it involves</p>
                <button id = "request_booking" onclick = "showFormModal()" >Request Booking</button>
            </div>
        </div>

        <div id="booking-form-div">
            <div class="booking-form">
                <h1>Request Appointment</h1>
                <span id = "close-form-modal" onclick = "closeFormModal()">&times</span>
                    <form action="" id = "booking">
                        <div class="booking-form-content">
                
                            <div class="form-element">
                                <label for="date">Select a date:</label>
                                <div class = "input-div" id = "input-div">
                                    <input type="text" id="date-picker" placeholder = "Requested Date" required >
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

                            <div class="form-element" id = "submit-div">
                                <button type="submit" value = "Submit" id = "submit" >Send Request </button>
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src = "../JS/Appointments.js"></script>
<script src = "../JS/Queries.js"></script>
</body>

</html>