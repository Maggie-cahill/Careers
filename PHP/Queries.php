<!DOCTYPE html>
<html>
<head>
<title>Queries</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Queries.css">





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

<div class="body-content">

    <div class="title-background">
        <div class="title">
            <h1>Questions or Concerns?</h1>
        </div>
    </div>

    <div class="form-content">
        <div class="form-header">
            <h1>Send Us Your Questions!</h1>
            <p class = "subtext">Fill out the form and submit below</p>
        </div>

        <form action="/upload" method="POST" enctype="multipart/form-data">
        <div class="form-body">
            <div class="form-element">
                <label for="type-of-question">Type of Question &ensp; *</label>
                <select name="type-of-question" id="type-of-quest" required>
                    <option value="default">Select One</option>
                    <option value="apply-for-jobs">Applying For Jobs</option>
                    <option value="cv-help">CV Help and Feedback</option>
                    <option value="career-advice">Career Advice</option>
                    <option value="find-part">Find Part Time Work</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-element">
                <label for="subject">Subject &ensp; *</label>
                <input type="text" name = "subject" id = "subject" required>
            </div>

            <div class="form-element">
                <label for="question-description">Message &ensp;*</label>
                <textarea name="question-description" id="question-description"></textarea>
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

<script src="../JS/Queries.js" defer></script>
</html>