<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


<link rel="stylesheet" href="../CSS/General_Styles.css">
<link rel="stylesheet" href="../CSS/Student_Login.css">




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
<div id="login-box">
        
    <div class="login">
        <div class="icon">
                <i class="fa-solid fa-user-graduate"></i>
            </div>
        <h1>Student Portal</h1>
        <h1> Sign In </h1>
        <div id = "login" >
           
        <form id = "login_form" onsubmit = "loginUser()">

             <div class="form-element">
                <label class="form-label" for="login_email">Student Email: <p id = "email_message"></p> </label>
                <div class="input-div">
                    <input class = "form-control" type="text" id = "login_email" name = "login_email" required>
                    <div class="icons">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
            </div>

            <div class="form-element">
                <label class="form-label" for="login_password">Password:  <p id = "password_message"></p>  </label>
                
                <div class="input-div">
                    <input class = "form-control" type="password" id = "login_password" name = "login_password" required>
                    <div class="icons">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
            </div>


            <div class="buttons">
                 <button type="submit" value = "Login" id = "loginButton" class="button-container btn btn-dark mt-5"  >Sign In</button>
            </div>

            </div>

            <div id="login_response"></div>
            </div>
    </div>

    </form>

</div>
</div>

<div class = "divider"></div>





</body>


<script src = "../JS/Login.js"></script>
</html>