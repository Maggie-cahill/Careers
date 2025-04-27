<!DOCTYPE html>
<html>

<head>
    <title>Creating Database Tables</title>
</head>

<body>

<?php
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "DROP DATABASE IF EXISTS $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database dropped successfully<br>";
} else {
  echo "Error dropping database: " . $conn->error;
}


$sql = "CREATE DATABASE $dbname;";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE Users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    user_type ENUM('Student','Employer') NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Users Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// -------------- Profiles Section -----------------------------


$sql = "CREATE TABLE Employer_Profiles (
  profile_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,

  -- Your Details
  profile_picture VARCHAR(255) DEFAULT 'Profile_Photo.png',
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  title VARCHAR(20),
  job_title VARCHAR(50),
  phone_number VARCHAR(15) NOT NULL,
  phone_type VARCHAR(100) NOT NULL,
  type_of_contact VARCHAR(100) NOT NULL,
  

  -- Organization details
  organization_name VARCHAR(100) NOT NULL,
  biography TEXT NOT NULL,


    -- Address info
    address VARCHAR (255) NOT NULL,
    city VARCHAR (50) NOT NULL,
    eircode VARCHAR (15),
    county VARCHAR (100),
    country VARCHAR (50) NOT NULL,

    -- Other info
    recruitment_agency TINYINT(1) NOT NULL,
    website_link VARCHAR(255),
    business_area VARCHAR(100) NOT NULL,
    number_of_employees VARCHAR(100) NOT NULL,


  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,

  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";


if ($conn->query($sql) === TRUE) {
echo "Employer Profiles Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}



$sql = "CREATE TABLE Student_Profiles (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,

    -- Personal Details
    profile_picture VARCHAR(255) DEFAULT 'Profile_Photo.png',
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    preferred_name VARCHAR(50),
    title VARCHAR(20),
    date_of_birth DATE,
    

    -- Profile and Education
    biography TEXT NOT NULL,
    degree ENUM('Associate', 'Bachelors','Masters', 'Doctorate (PhD)', 'Diploma', 'Certificate'),
    university VARCHAR(100),
    graduation_year YEAR,
    major VARCHAR(100),

    -- Resume Upload
    cv_file VARCHAR(255),

    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";


if ($conn->query($sql) === TRUE) {
  echo "Student Profiles Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE Skills (
    skill_id INT PRIMARY KEY AUTO_INCREMENT,
    profile_id INT NOT NULL,
    skill_name VARCHAR(100) NOT NULL,
    skill_type ENUM('hard', 'soft'),

    FOREIGN KEY (profile_id) REFERENCES Student_Profiles(profile_id) ON DELETE CASCADE
) ENGINE=InnoDB;
";


if ($conn->query($sql) === TRUE) {
echo "Skills Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE Interests  (
    interest_id INT PRIMARY KEY AUTO_INCREMENT,
    profile_id INT NOT NULL,
    interest_name VARCHAR(100) NOT NULL,

    FOREIGN KEY (profile_id) REFERENCES Student_Profiles(profile_id) ON DELETE CASCADE
) ENGINE=InnoDB;
";

if ($conn->query($sql) === TRUE) {
  echo "Interests Table created successfully<br>";
  } else {
  echo "Error creating table: " . $conn->error;
  }




$sql = "CREATE TABLE Important_Links (
  link_id INT PRIMARY KEY AUTO_INCREMENT,
  profile_id INT NOT NULL,
  link_url VARCHAR(255) NOT NULL,
  link_type ENUM('Portfolio', 'LinkedIn', 'GitHub', 'Project', 'Certificates', 'Other') NOT NULL,

  FOREIGN KEY (profile_id) REFERENCES Student_Profiles(profile_id) ON DELETE CASCADE
) ENGINE=InnoDB;
";


if ($conn->query($sql) === TRUE) {
  echo "Important Links Table created successfully<br>";
  } else {
  echo "Error creating table: " . $conn->error;
  }



  
// -------------- Jobs Section -----------------------------



$sql = "CREATE TABLE Jobs (
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    profile_id INT NOT NULL,

    -- General Job Info
    position_title VARCHAR(255) NOT NULL,
    location VARCHAR (255) NOT NULL,
    salary DECIMAL(10,2),


    -- Description Info
    description TEXT NOT NULL,
    requirements TEXT NOT NULL,

    work_environment ENUM('In-Person', 'Remote', 'Hybrid') NOT NULL,
    job_form ENUM('Full-Time', 'Part-Time', 'Contract') NOT NULL,
    job_type ENUM ('Internship', 'Work Placement', 'Graduate Program', 'Entry-Level', 'Experienced') NOT NULL,

    -- Dates
    closing_date DATE NOT NULL,
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    start_date DATE NOT NULL,
    end_date DATE DEFAULT NULL,

    -- Extra Info
     apply_link VARCHAR(255),

    FOREIGN KEY (profile_id) REFERENCES Employer_Profiles(profile_id) ON DELETE CASCADE
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
  echo "Jobs Table created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}




$sql = "CREATE TABLE Job_Skills  (
    skill_id INT PRIMARY KEY AUTO_INCREMENT,
    job_id INT NOT NULL,
    skill_name VARCHAR(100) NOT NULL,

    FOREIGN KEY (job_id) REFERENCES Jobs(job_id) ON DELETE CASCADE
) ENGINE=InnoDB;";

if ($conn->query($sql) === TRUE) {
echo "Job Skills Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}



$sql = "CREATE TABLE Saved_Jobs (
  save_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  job_id INT NOT NULL,

  saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
  FOREIGN KEY (job_id) REFERENCES Jobs(job_id) ON DELETE CASCADE
) ENGINE=InnoDB;";


if ($conn->query($sql) === TRUE) {
echo "Saved Jobs Table created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}










$conn->close();



?>

</body>
</html>


