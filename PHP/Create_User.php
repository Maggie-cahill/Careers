<!DOCTYPE html>
<html>

<head>
    <title> Register Account </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/General_Styles.css">
    <link rel="stylesheet" href="../CSS/Jobs.css">
    <link rel="stylesheet" href="../CSS/Create_User.css">



    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    
  </head>
        
       
<body>
<?php 
session_start();

?>


<div id="content">
    <div id="login-box">

        <div id="display-box">
            <div id="image">
            <img src="../Images/Final_Logo.png" alt="Company Logo">
            </div>

            <div id="display-content">
            <h1>Welcome to ATU Career Path</h1>
            <h3>Start hiring top graduate talent now</h3>
            <p>Advertise your student and graduate job vacancies on the ATU Galway Mayo Careers Connect system, and also register for events.</p>
            <span></span>
            <p style = "font-size: .7em;">If you already have an account, <a href = "Choose.php">click here to sign in.</a></p>
            </div>
        </div>

        <form id = "create" onsubmit = "createAccount(event)" enctype="multipart/form-data">
            <div id="personal-details">
                <h1 style = "width: 100%;">Account Personal Details</h1>
                <div class="form-element"  id = "create_first_div">
                    <label class="form-label" for="create_first">First Name: &nbsp;*</label>
                    <input class = "form-control" type="text" id = "create_first" name = "create_first" required>
                    <input type="hidden" name="hidden_first_name" id="hidden_first_name">

                </div>

                <div class="form-element"  id = "create_last_div">
                    <label class="form-label" for="create_last">Last Name:&nbsp; *</label>
                    <input class = "form-control" type="text" id = "create_last" name = "create_last" required>
                    <input type="hidden" name="hidden_last_name" id="hidden_last_name">

                </div>

                
                <div class="form-element"  id = "create_job_title_div">
                    <label class="form-label" id = "job_title_label" for="create_job_title">Your Job Title: </label>
                    <input class = "form-control" type="text" id = "create_job_title" name = "create_job_title">
                    <input type="hidden" name="hidden_job_title" id="hidden_job_title">

                </div>


                <div class="form-element" id = "create_phone__type_div">
                    <label class="form-label" for="create_phone_type">Title: </label>
                    <select name="title" id="title">
                        <option  value = "default" selected disabled>Select Title</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Miss">Miss</option>
                    </select>
                    <input type="hidden" name="hidden_title" id="hidden_title">

                </div>

                <div class="form-element"  id = "create_email_div">
                    <label class="form-label" for="email">Email:&nbsp; *</label>
                    <input class = "form-control" type="email" id = "create_email" name = "email" required>
                    <input type="hidden" name="hidden_email" id="hidden_email">
                </div>
                

               


                <div class="form-element"  id = "create_password_div">
                    <label class="form-label" for="create_password">Password: &nbsp;* </label>
                    <input class = "form-control" type="password" id = "create_password" name = "create_password" required>
                    <input type="hidden" name="hidden_password" id="hidden_password">
                </div>

                <div class="form-element"  id = "create_verify_password_div">
                    <label class="form-label" for="create_verify_password">Confirm Password:&nbsp; *</label>
                    <input class = "form-control" type="password" id = "create_verify_password" name = "create_verify_password" required>
                </div>

                <div class="form-element" id = "create_phone_div">
                    <label class="form-label" for="create_phone">Phone Number: &nbsp;* </label>
                    <input class = "form-control" type="text" id = "create_phone" name = "create_phone" required>
                    <input type="hidden" name="hidden_phone" id="hidden_phone">

                </div>

                <div class="form-element" id = "create_phone_number_type_div">
                    <label class="form-label" for="create_phone_number_type">Type Of Number:&nbsp; * </label>
                    <select name="phone_number_type" id="phone_number_type" required>
                        <option  value = "default" selected disabled>Select Type of Number</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Office Number">Office Number</option>
                        <option value="Fax">Fax</option>
                    </select>
                    <input type="hidden" name="hidden_number_type" id="hidden_number_type">

                </div>

                <div class="form-element" id = "create_phone_type_div">
                    <label class="form-label" for="create_phone_type">Type Of Contact: &nbsp;* </label>
                    <select name="type_of_contact" id="type_of_contact" required>
                        <option  value = "default" selected disabled>Select Type of Contact</option>
                        <option value="Event Contact">Event Contact</option>
                        <option value="Placement and Internship Contact">Placement and Internship Contact</option>
                        <option value="Recruitment Agency">Recruitment Agency</option>
                        <option value="Vacancy">Vacancy</option>
                        <option value="Finance Contact">Finance Contact</option>
                        <option value="HR Contact">HR Contact</option>
                        <option value="Main Contact">Main Contact</option>
                        <option value="Opportunity Contact">Opportunity Contact</option>
                        <option value="Other">Other</option>
                    </select>

                    <input type="hidden" name="hidden_contact_type" id="hidden_contact_type">

                </div>

                <div class="form-element" id = "error">
                    <div id="error-message"></div>
                </div>

                <div class="form-element" id = "continue_div">
                    <button type = "button" onclick = "validatePersonalDetails()">Continue</button>
                </div>

            </div>

            <div id="organization-details">
                <h1>Organization Details</h1>
                <div class="form-element" id = "create_organization_div">
                    <label class="form-label" for="create_organization">Organization Name:&nbsp; *</label>
                    <input class = "form-control" type="text" id = "create_organization" name = "create_organization" required>
                    <input type="hidden" name="hidden_organization_name" id="hidden_organization_name">
                </div>

                <div class="form-element" id = "create_address_div">
                    <label class="form-label" for="create_address">Organization Address:&nbsp; *</label>
                    <input class = "form-control" type="text" id = "create_address" name = "create_adddress" placeholder = "Address" required>
                    <input type="hidden" name="hidden_address" id="hidden_address">

                    <input class = "form-control" type="text" id = "create_eircode" name = "create_eircode" placeholder = "Eircode" required>
                    <input type="hidden" name="hidden_eircode" id="hidden_eircode">


                    <select name="city" id="city" required>
                        <option value = "default" selected disabled>Select City</option>
                        <option  value="Outside Ireland" > Outside Ireland</option>
                        <option  value="Dublin" > Dublin</option>
                        <option  value="Galway" > Galway</option>
                        <option  value="Cork" > Cork</option>
                        <option  value="Limerick" > Limerick</option>
                        <option  value="Waterford" > Waterford</option>
                        <option  value="Belfast" > Belfast</option>
                        <option  value="Kilkenny" > Kilkenny</option>
                        <option  value="Derry" > Derry</option>
                        <option  value="Sligo" > Sligo</option>
                        <option  value="Wexford" > Wexford</option>
                        <option  value="Athlone" > Athlone</option>
                        <option  value="Drogheda" > Drogheda</option>
                        <option  value="Navan" > Navan</option>
                        <option  value="Ennis" > Ennis</option>
                        <option  value="Tralee" > Tralee</option>
                        <option  value="Letterkenny" > Letterkenny</option>
                        <option  value="Newry" > Newry</option>
                        <option  value="Castlebar" > Castlebar</option>
                        <option  value="Arklow" > Arklow</option>
                        <option  value="Thurles" > Thurles</option>
                        <option  value="Clonmel" > Clonmel</option>
                        <option  value="Mullingar" > Mullingar</option>
                        <option  value="Banbridge" > Banbridge</option>
                        <option  value="Carrick-on-Shannon" > Carrick-on-Shannon</option>
                        <option  value="Antrim" > Antrim</option>
                        <option  value="Dungarvan" > Dungarvan</option>
                        <option  value="Roscommon" > Roscommon</option>
                        <option  value="Cavan" > Cavan</option>
                        <option  value="Tullamore" > Tullamore</option>
                        <option  value="Ballina" > Ballina</option>
                        <option  value="Monaghan" > Monaghan</option>
                        <option  value="Nenagh" > Nenagh</option>
                        <option  value="Portlaoise" > Portlaoise</option>
                        <option  value="Balbriggan" > Balbriggan</option>
                        <option  value="Youghal" > Youghal</option>
                    </select>
                    <input type="hidden" name="hidden_city" id="hidden_city">

                       
                    <select name="country" id="country" required>
                        <option  value = "default" selected disabled>Select Country</option>
                        <option  value="Ireland"> Ireland</option>
                        <option  value="United Kingdom"> United Kingdom</option>
                        <option  value="Mainland Europe" > Mainland Europe</option>
                        <option  value="Rest of the Word" > Rest of the Word</option>
                    </select>

                    <input type="hidden" name="hidden_country" id="hidden_country">



            </div>

            <div class="form-element" id = "create_agency_div">
            <label class="form-label" for="create_agency_div">Are you a recruitment agency? &nbsp;*</label>

                <div class="radio-div">
                    <input type="radio" id="yes" name="agency" value="1" selected>
                    <label for="yes">Yes</label>    
                </div>
                <div class="radio-div">
                    <input type="radio" id="no" name="agency" value="0">
                    <label for="no">No</label>   
                </div>
                 
                        
            </div>
            <input type="hidden" name="hidden_agency" id="hidden_agency">


            <div id="error_message"></div>

            <div class="form-element" id = "continue_div">
                    <button type = "button" onclick = "validateOrganization()">Continue</button>
            </div>

        </div>

        <div id="public-profile">
            <h1>Public Profile</h1>
            <p>Tell candidates more about your organisation. This profile will be published as part of your job advertisement.</p>
            
            <div class="form-element" id = "description_div">
                <label for="biography">Organization Description &nbsp;*</label>
                <textarea name="biography" id="biography" required placeholder = "Tell Us About Your Company (Min 50 words - Max 2000 words)"></textarea>
                <input type="hidden" name="hidden_description" id="hidden_description">
            </div>

            <div class="form-element" id = "website_div">
                <label for="website">Website</label>
                <input type="text" id = "website" name = "website">
                <input type="hidden" name="hidden_website" id="hidden_website">

            </div>

            <div class="form-element" id = "business_area_div">
                <label for="business_area">Business Area: &nbsp;*</label>
                    <select name="business_area" id="business_area" required>
                        <option  value = "default" selected disabled > Select Business Area</option>
                        <option  value="Accountancy and Financial Management" > Accountancy and Financial Management</option>
                        <option  value="Agriculture, Forestry, and Fisheries" > Agriculture, Forestry, and Fisheries</option>
                        <option  value="Construction, Civil Engineering and QS" > Construction, Civil Engineering and QS</option>
                        <option  value="Creative Art & Design" > Creative Art & Design</option>
                        <option  value="Engineering" > Engineering</option>
                        <option  value="Hospitality, Sport, Leisure, and Tourism" > Hospitality, Sport, Leisure, and Tourism</option>
                        <option  value="Human Resources, Recruitment, and Training" > Human Resources, Recruitment, and Training</option>
                        <option  value="IT and Telecoms" > IT and Telecoms</option>
                        <option  value="Manufacturing and Processing" > Manufacturing and Processing</option>
                        <option  value="Medical and Healthcare" > Medical and Healthcare</option>
                        <option  value="Other" > Other</option>
                        <option  value="Public Sector and Civil Service" > Public Sector and Civil Service</option>
                        <option  value="Retail, Sales, and Customer Services" > Retail, Sales, and Customer Services</option>
                        <option  value="Science, Research, and Development" > Science, Research, and Development</option>
                    </select>  
                    <input type="hidden" name="hidden_business_area" id="hidden_business_area">

            </div>

            <div class="form-element" id = "employees_div">
                <label for="employees">Number of Employees: &nbsp;*</label>
                    <select name="employees" id="employees" required>
                        <option value = "default" selected disabled>Select Employee Count</option>
                        <option  value='1-10'> 1-10</option>
                        <option  value='11-50'> 11-50</option>
                        <option  value='51-250'> 51-250</option>
                        <option  value='251-500'> 251-500</option>
                        <option  value='501-1000'> 501-1000</option>
                        <option  value='1000+' > 1000+</option>
                        <option  value='not known' > Not Known</option>          
                    </select>  
                    <input type="hidden" name="hidden_employees" id="hidden_employees">
            </div>

    

            <div id="error_message"></div>

            <div class="form-element" id = "continue_div">
                    <button type="submit" value = "Create" id = "create_button" class="button-container btn btn-light mt-3">Register Account</button>
                </div>

        </div>



            



            

                

                  
            </form>



            <div id="create_response"><br><br><br></div>

        </div>

    </div>

   
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../JS/Login.js"></script>
</html>