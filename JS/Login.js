// login any user type
function loginUser() {
    event.preventDefault();
    const formData = new FormData(document.getElementById('login_form'));

    fetch('Login.php', { // Change to your PHP script
        method: 'POST',
        body: formData,
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            if (data.success) {
                location.href = "Jobs.php";
                

            } else {
                document.getElementById('email_message').innerHTML = data.email_message;
                document.getElementById('password_message').innerHTML = data.password_message;
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('An error occurred while processing your request.');
        });
     
}


// form handle the personal details section of create account section
function validatePersonalDetails() {
    let firstName = document.getElementById("create_first").value.trim();
    let lastName = document.getElementById("create_last").value.trim();
    let jobTitle = document.getElementById("create_job_title").value.trim();
    let title = document.getElementById("title").value.trim();
    let email = document.getElementById("create_email").value.trim();
    let password = document.getElementById("create_password").value.trim();
    let confirmPassword = document.getElementById("create_verify_password").value.trim();
    let phoneNumber = document.getElementById("create_phone").value.trim();
    let phoneType = document.getElementById("phone_number_type").value;
    let contactType = document.getElementById("type_of_contact").value;

    let error_message = document.getElementById("error-message");
    // Validation checks
    if (!firstName || !lastName || !email || !password || !confirmPassword || !phoneNumber || phoneType == "default" || contactType == "default") {
         error_message.innerHTML = "* Please fill in and select all required fields!";
        return;
    }

    // Validate names
    let nameError = validateName(firstName);
    if (nameError != "Valid") {
        error_message.innerHTML = nameError;
        document.getElementById("create_first").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_first").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    // Validate names
    nameError = validateName(lastName);
    if (nameError != "Valid") {
      error_message.innerHTML = nameError;
      document.getElementById("create_last").style.boxShadow = "0px 0px 5px red";
      return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_last").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    if (!validateEmail(email)) {
        error_message.innerHTML = "Invalid email format!";
        document.getElementById("create_email").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_email").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }


    if (!validatePhoneNumber(phoneNumber)) {
        error_message.innerHTML = "* Phone number must contain only numbers and be between 10-15 digits.";
        document.getElementById("create_phone").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_phone").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    


    if (password.trim() !== confirmPassword.trim()) {
        error_message.innerHTML = "* Passwords do not match";

        document.getElementById("create_password").style.boxShadow = "0px 0px 5px red";
        document.getElementById("create_verify_password").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_password").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
        document.getElementById("create_verify_password").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }
  
    document.getElementById("hidden_first_name").value = document.getElementById("create_first").value;
    document.getElementById("hidden_last_name").value = document.getElementById("create_last").value;
    document.getElementById("hidden_job_title").value = document.getElementById("create_job_title").value;
    document.getElementById("hidden_title").value = document.getElementById("title").value;
    document.getElementById("hidden_email").value = document.getElementById("create_email").value;
    document.getElementById("hidden_password").value = document.getElementById("create_password").value;
    document.getElementById("hidden_phone").value = document.getElementById("create_phone").value;
    document.getElementById("hidden_number_type").value = document.getElementById("phone_number_type").value;
    document.getElementById("hidden_contact_type").value = document.getElementById("type_of_contact").value;
    


    
    // check if email exists before proceeding
    fetch("CheckPersonalDetails.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `email=${email}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            error_message.innerHTML = "* Email already exists! Please use a different one.";
        } else {

            document.getElementById("personal-details").style.display = "none";
            document.getElementById("organization-details").style.display = "flex";

            
            console.log("Hidden Email:",     document.getElementById("hidden_email").value);
            console.log("Validation Result:",    document.getElementById("hidden_password").value);
        }
    })
    .catch(error => console.error("Error:", error));
}



// form handle the organization details section of create account section
function validateOrganization() {
    let name = document.getElementById("create_organization").value;
    let address = document.getElementById("create_address").value;
    let eircode = document.getElementById("create_eircode").value;
    let city = document.getElementById("city").value;
    let country = document.getElementById("country").value;
    let agency = document.querySelector('input[name="agency"]:checked');

    
    let error_message = document.getElementById("error_message");

    if (!name || !address || !eircode || city == "default" || country == "default" || !agency) {
         error_message.innerHTML = "* Please fill in and select all required fields!";
        return;
    }


    nameError = validateName(name);
    if (nameError!= "Valid") {
      error_message.innerHTML = nameError;
      document.getElementById("create_organization").style.boxShadow = "0px 0px 5px red";
      return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_organization").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    nameError = validateEircode(eircode);
    if (nameError != "Valid") {
        error_message.innerHTML = nameError;
        document.getElementById("create_eircode").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_eircode").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    nameError = validateAddress(address);
    if (nameError != "Valid") {
        error_message.innerHTML = nameError;
        document.getElementById("create_address").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("create_address").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    document.getElementById("hidden_organization_name").value = document.getElementById("create_organization").value;
    document.getElementById("hidden_address").value = document.getElementById("create_address").value;
    document.getElementById("hidden_eircode").value = document.getElementById("create_eircode").value;
    document.getElementById("hidden_city").value = document.getElementById("city").value;
    document.getElementById("hidden_country").value = document.getElementById("country").value;
    let agencyValue = document.querySelector('input[name="agency"]:checked').value;
    let numericalAgencyValue = parseInt(agencyValue);

    document.getElementById("hidden_agency").value = numericalAgencyValue;
    document.getElementById("organization-details").style.display = "none";
    document.getElementById("public-profile").style.display = "flex";
}


// check final registery for account and submit to database
function createAccount(event) {
    event.preventDefault();
    let biography = document.getElementById("biography").value;
    let business = document.getElementById("business_area").value;
    let employees = document.getElementById("employees").value;

    let error_message = document.getElementById("error_message");
    // Validation checks
    if (!biography || business == "default" || employees == "default") {
         error_message.innerHTML = "* Please fill in and select all required fields!";
         return;
    }

    nameError = validateTextarea(biography);
    if(nameError != "Valid") {
        error_message.innerHTML = nameError;
        document.getElementById("biography").style.boxShadow = "0px 0px 5px red";
        return;
    } else {
        error_message.innerHTML = "";
        document.getElementById("biography").style.boxShadow = "0px 0px 2px rgba(0, 0, 0, 0.412)";
    }

    document.getElementById("hidden_description").value = document.getElementById("biography").value;
    document.getElementById("hidden_website").value = document.getElementById("website").value;
    document.getElementById("hidden_business_area").value = document.getElementById("business_area").value;
    document.getElementById("hidden_employees").value = document.getElementById("employees").value;
    

    const formData = new FormData(document.getElementById("create"));
    formData.forEach((value, key) => {
        console.log(`${key}: ${value}`); 
    });

    fetch("CreateUserFunctionality.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
        if (response.ok) {
            return response.json();
        }
        throw new Error("Network response was not ok.");
        })
        .then((data) => {
            if (data.status === "success") {
                location.href = "Organization_Login.php";
                loadPage();
            } else {
                document.getElementById('error_message').innerHTML = data.message;
                console.log(data.message);
            }
        })
        .catch((error) => {
        console.error("Error:", error);
        });


}



function validateEmail(email) {
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}


function validateName(name) {
    let namePattern = /^[A-Za-z\s]+$/; // Allows only letters and spaces
    let maxLength = 50; // Set max character limit

    if (name.trim().length > maxLength) {
        return "* Name cannot exceed " + maxLength + " characters.";
    }

    if (!namePattern.test(name)) {
        return "* Name must contain only letters (no numbers or special characters).";
    }
    return "Valid";
}


function validateTextarea(text) {
    let minLength = 50;
    let maxLength = 2000; // Set max character limit

    if (text.trim().length > maxLength) {
        return "* Name cannot exceed " + maxLength + " characters.";
    }

    if (text.trim().length < minLength) {
        return "* Name must be at least " + minLength + " characters.";
    }

    return "Valid";
}

function validatePhoneNumber(phoneNumber) {
    let phonePattern = /^\d{10,15}$/; // Allows only numbers, 10-15 digits
    return phonePattern.test(phoneNumber.trim());
}

function validateEircode(eircode) {
    let eircodePattern = /^[A-Z0-9]{3} ?[A-Z0-9]{4}$/; // Irish Eircode format

    if (!eircodePattern.test(eircode.trim())) {
        return "* Invalid Eircode format! It must be 7 characters long (e.g., A65 F4E2).";
    }

    return "Valid";
}

function validateAddress(address) {
    let addressPattern = /^[A-Za-z0-9\s,.'-]{5,100}$/; // Allows letters, numbers, spaces, commas, dots, and dashes

    if (!addressPattern.test(address.trim())) {
        return "* Invalid address format! Please enter a valid street address.";
    }

    return "Valid";
}







