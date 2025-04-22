<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Choose.css">





</head>

<body>


<div class="body-content">

    
        <button class="back" onclick = "history.back()">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
    
    
        <div class="header">
            <div class="background">
                <div class="image-div">
                    <img src="../Images/Final_Logo.png" alt="">
                </div>
            </div>
        </div>
    

    <div class="student-div">
        <div class="student-content">
            <div class="text-content">
                <h1>Students and Graduates</h1>
                <h3>Careers Connect</h3>

                <div class="icon">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>

                <p>An easy to use online system used to: Book an appointment, Find out about job opportunities, 
                    Book a place at an event, and Ask a question.</p>
            
                <span class = "line"></span>
                    <div class="buttons">
                <button id = "student-sign" onclick = "location.href = 'Student_Login.php'">Student Sign In<i class="fa-solid fa-right-to-bracket"></i></button><br>
                <button id = "graduate-sign" onclick = "location.href = 'Graduate_Login.php'">Graduate Sign In and Registration<i class="fa-solid fa-right-to-bracket"></i></button>
            </div>
            </div>

           
        </div>
    </div>

    <div class="business-div">
        <div class="business-content">
            <div class="text-content">
                <h1>Employers and Organizations</h1>
                <h3>Employee Connect</h3>

                <div class="icon">
                    <i class="fa-solid fa-briefcase"></i>
                </div>

                
                <p>Register your organisation with us and enhance your organisation's profile and visibility 
                    within the Institution community.</p>
                
                <span class = "line"></span>
                <div class="buttons">
                     <button id = "organization-sign" onclick = "location.href = 'Organization_Login.php'">Organization Sign In<i class="fa-solid fa-right-to-bracket"></i></button>
                </div>   
                <br><br><br>
            </div>

           
        </div>
    </div>

    <div class="header">
    <p>Careers Connect is managed by the ATU Galway Careers Service and enables students, 
       graduates, staff, and organisations to engage with our services including our 
       opportunities, events and appointment bookings.
    </p>
    </div>
</div>






</body>
<script src = "../JS/Utils.js"></script>

</html>