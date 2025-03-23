<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Profile.css">





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
    <div class="side-bar-content">
        <div class="user">
            <img src="../Images/Office.jpg" alt="">
            <h1>Username</h1>
        </div>

        <ul>
            <li>
                <div class="list-item">
                    <i class="fa-solid fa-user"></i>
                    <h1>Your Account</h1>
                </div>
            </li>
            <li>
                <div class="list-item">
                    <i class="fa-solid fa-clipboard"></i>
                    <h1>Profile and CV</h1>
                </div>
            </li>
            <li>
                <div class="list-item">
                    <i class="fa-solid fa-bookmark"></i>
                    <h1>Saved Jobs</h1>
                </div>
            </li>
        </ul>
    </div>

    <div class="profile-descriptions">
        <h1>Your Account</h1>
        <div class="header">
            <img src="../Images/Office.jpg" alt="">
            <button>Upload Photo<i class="fa-solid fa-cloud-arrow-up"></i></button>
        </div>

        <span class="line"></span>

        <div class="user-details">
            <h3>User Details</h3>

            <div class="name">
                <p>Name: Maggie Cahill</p>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

            <div class="email">
                <p>Email: 2236maggie@gmail.com</p>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

            <p>
               Creative arts & design, 3D design, Artistic creation, Media, 
               journalism & publishing, Film and cinematography, Media, 
               Photography, Technology, Business & systems analysis, Software 
               engineering, Web development
            </p>

            <span class="line"></span>
        </div>

        <div class="security">
            <h3>Security</h3>

            <div class="password-div">
                <div class="password">
                    <label for="">Password</label>
                    <p>****************</p>
                </div>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

        </div>
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