<!DOCTYPE html>
<html>
<head>
<title>Jobs</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Jobs.css">





</head>

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
            <a href = "Choose.php"><li> <button class="login"> Sign In </button></li></a>
        </ul>
    </div>
    
</nav>

<div class="body-content">
    <div class="title-content">
        <h1>Find Career Opportunities</h1>

        <form action="" id="search">
        
            <div id="search-and-filter">
                <div class="form-element">
                    <input type="text" id = "search-keyword">
                    <button type="" id = "glass"> 
                        <i class="fa-solid fa-magnifying-glass"></i> 
                    </button>
                    <button id = "arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                

                <div class="form-element">
                    <select name="career-type" id="career-type">
                        <option value="" default>Role Type</option>
                    </select>
                </div>

                <div class="form-element">
                    <select name="field" id="field">
                        <option value=""default>Field</option>
                    </select>
                </div>

                <div class="form-element">
                    <select name="location" id="location">
                        <option value="" default>Location</option>
                    </select>
                </div>
                
                
            </div>
        </form>
    </div>
    
</div>

<div class = "divider"></div>

<div id="job-content-div">
    <div id="job-list">
        <div class="job-listing">
            <div class="company-title">
                <img src="../Images/Company_Logo.png" alt="">
                <h4> Company Name</h4>
            </div>
            <h2>Software Developer Intern</h2>
            <p> Type of Position | Location</p>
            <p> $40,000</p>
            <p> 45 days to apply</p>

            <form action="">
                <button><i class="fa-solid fa-bookmark"></i></button>
            </form>
            <br><br>
        </div>

        <div class="job-listing">
            <div class="company-title">
                <img src="../Images/Company_Logo.png" alt="">
                <h4> Company Name</h4>
            </div>
            <h2>Software Developer Intern</h2>
            <p> Type of Position | Location</p>
            <p> $40,000</p>
            <p> 45 days to apply</p>

            <form action="">
                <button><i class="fa-solid fa-bookmark"></i></button>
            </form>
            <br><br>
        </div>

        <div class="job-listing">
            <div class="company-title">
                <img src="../Images/Company_Logo.png" alt="">
                <h4> Company Name</h4>
            </div>
            <h2>Software Developer Intern</h2>
            <p> Type of Position | Location</p>
            <p> $40,000</p>
            <p> 45 days to apply</p>

            <form action="">
                <button><i class="fa-solid fa-bookmark"></i></button>
            </form>
            <br><br>
        </div>

        <div class="job-listing">
            <div class="company-title">
                <img src="../Images/Company_Logo.png" alt="">
                <h4> Company Name</h4>
            </div>
            <h2>Software Developer Intern</h2>
            <p> Type of Position | Location</p>
            <p> $40,000</p>
            <p> 45 days to apply</p>

            <form action="">
                <button><i class="fa-solid fa-bookmark"></i></button>
            </form>
            <br><br>
        </div>
    </div>

    <div id="job-information">
        <div class="company-header">
            <img src="../Images/Company_Logo.png" alt="">
            <h1> Company Name</h1>
        </div>

        <div class="position-info">
            <h1> Software Developer Intern</h1>
            <h3><button>81 Days to Apply</button>  &nbsp; Closing Date: April 13th, 2025</h3>
        </div>

        <div class="general-details">
            <h3>General Details</h3>
            <button><i class="fa-solid fa-location-dot"></i>Location</button>
            <button><i class="fa-solid fa-suitcase"></i>Permanent</button>
            <button><i class="fa-solid fa-coins"></i> $40,000</button>
        </div>


        <div class="options">
            <button><i class="fa-solid fa-arrow-up-right-from-square"></i>Apply</button>
            <button><i class="fa-solid fa-bookmark"></i>Save</button>
        </div>

        <div class="job-body-content">
            <div class="job-description">
                <h3>Job Description</h3>
                <p>We are seeking a diligent and motivated individual to join our Payroll Department. 
                This role will be responsible for supporting the processing by assisting with payroll
                processing, handling client and employee queries, and ensuring compliance with internal 
                systems and procedures. This role involves coordinating payrolls, managing client
                relationships, generating reports, and identifying areas for process improvement.
                </p>
            </div>

            <div class="job-requirements">
                <h3>Requirements</h3>
                <p>This role will be responsible for supporting the processing by assisting with payroll
                processing, handling client and employee queries, and ensuring compliance with internal 
                systems and procedures. This role involves coordinating payrolls, managing client
                relationships, generating reports, and i
                </p>
            </div>

            <div class="job-skills">
                <h3>Skills</h3>
                <p>This role will be responsible for supporting the processing by assisting with payroll
                processing, handling client and employee queries, and ensuring compliance with internal 
                systems and procedures. This role involves coordinating payrolls, managing client
                relationships, generating reports, and i
                </p>
            </div>

            <div class="options">
                <button><i class="fa-solid fa-arrow-up-right-from-square"></i>Apply</button>
                <button><i class="fa-solid fa-bookmark"></i>Save</button>
            </div>

        </div>
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
<script src = "../JS/Utils.js"></script>
</html>