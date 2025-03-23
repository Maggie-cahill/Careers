<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Student_Login.css">
<link rel="stylesheet" href="../CSS/Organization_Login.css">





</head>

<body>

<button class="back" onclick = "history.back()">
    <i class="fa-solid fa-arrow-left"></i>
</button>
<div class="body-content">
<div class="header">
            <div class="image-div">
                <img src="../Images/Final_Logo.png" alt="">
            </div>
        </div>
<div id="login-box" style = "border-color:rgb(4, 19, 128);">
        
    <div class="login">
        <div class="icon">
            <i class="fa-solid fa-briefcase"></i>
        </div>
        <h1>Organization Portal</h1>
        <h1> Sign In </h1>
        <form id = "login" onsubmit = "loginUser()">
           

             <div class="form-element">
                <label class="form-label" for="login_username">Email: </label>
                <div class="input-div">
                    <input class = "form-control" type="text" id = "login_username" name = "login_username" required>
                    <div class="icons">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
            </div>

            <div class="form-element">
                <label class="form-label" for="login_password">Password: </label>
                
                <div class="input-div">
                    <input class = "form-control" type="password" id = "login_password" name = "login_password" required>
                    <div class="icons">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                <a href="Forgot_Password.php" id = "forgot-link">
                    <label for="login_password" id = "forgot">Forgot Password</label>
                </a>
            </div>


            <div class="buttons">
                <a href="Recipes.php" style = "text-decoration: none;">
                 <button type="submit" value = "Login" id = "loginButton" class="button-container btn btn-dark mt-5">Sign In</button>
                 </a>
            </div>

            </form>

            <div id="login_response"></div>
            </div>
</div>

<div class="create-account">
    <div class="label">  
        <div class="class">
        <span class="short-line"></span>
        </div>
        
        <label for="createAccount" id = "labelCreateAccount">Register Business at ATU Careers</label>
        
        <div class="class">
        <span class="short-line"></span>
        </div>
    </div>
    <button id = "createAccount" name = "createAccount" onclick = "window.location = 'Create_User.php'">Register Account </button>
</div>

</div>
</div>







</body>

</html>