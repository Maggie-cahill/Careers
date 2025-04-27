<!DOCTYPE html>
<html>

<head>
    <title>Insert Student Profiles </title>
</head>

<body>

<?php
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Student_Profiles (
    user_id, profile_picture, first_name, last_name, preferred_name, title, date_of_birth,
    biography, degree, university, graduation_year, major, cv_file, created_at
) VALUES

(1, 'Profile_Photo.png', 'Alice', 'Murphy', 'Ali', 'Ms.', '2001-06-15',
 'Aspiring software engineer passionate about AI-driven solutions.',
 'Bachelors', 'Atlantic Technological University', 2023, 'Computer Science', 'CV_Alice_Murphy.pdf', CURRENT_TIMESTAMP),


(2, 'Profile_Photo.png', 'James', 'O’Connor', NULL, 'Mr.', '2000-04-20',
 'Focused on sustainable energy research and environmental impact assessment.',
 'Masters', 'Atlantic Technological University', 2025, 'Renewable Energy Engineering', 'CV_James_OConnor.pdf', CURRENT_TIMESTAMP),


(3, 'Profile_Photo.png', 'Sophie', 'Kelly', 'Soph', 'Ms.', '2002-11-30',
 'Marketing enthusiast with experience in digital media strategies.',
 'Bachelors', 'Atlantic Technological University', 2024, 'Marketing & Digital Media', 'CV_Sophie_Kelly.pdf', CURRENT_TIMESTAMP),


(4, 'Profile_Photo.png', 'Ryan', 'Carter', NULL, 'Mr.', '2001-08-25',
 'Business student eager to specialize in corporate finance and risk analysis.',
 'Diploma', 'Atlantic Technological University', 2023, 'Finance & Economics', 'CV_Ryan_Carter.pdf', CURRENT_TIMESTAMP),


(5, 'Profile_Photo.png', 'Emma', 'Doyle', 'Em', 'Ms.', '2000-09-18',
 'Cybersecurity student focused on ethical hacking and networking security.',
 'Doctorate (PhD)', 'Atlantic Technological University', 2026, 'Cybersecurity', 'CV_Emma_Doyle.pdf', CURRENT_TIMESTAMP),


(6, 'Profile_Photo.png', 'David', 'Farrell', NULL, 'Mr.', '1999-02-10',
 'Health tech specialist exploring AI applications in medical research.',
 'Certificate', 'Atlantic Technological University', 2022, 'Health Informatics', 'CV_David_Farrell.pdf', CURRENT_TIMESTAMP),

(7, 'Profile_Photo.png', 'Megan', 'O’Connor', 'Meg', 'Ms.', '2003-05-05',
 'UX designer passionate about creating user-friendly digital experiences.',
 'Bachelors', 'Atlantic Technological University', 2025, 'Graphic Design & UX', 'CV_Megan_OConnor.pdf', CURRENT_TIMESTAMP),


(8, 'Profile_Photo.png', 'Jack', 'Nolan', NULL, 'Mr.', '1998-12-22',
 'Mechanical engineering student researching automation and smart systems.',
 'Masters', 'Atlantic Technological University', 2024, 'Mechanical Engineering', 'CV_Jack_Nolan.pdf', CURRENT_TIMESTAMP),


(9, 'Profile_Photo.png', 'Chloe', 'Murray', 'Clo', 'Ms.', '2002-01-14',
 'Data science student specializing in predictive analytics and machine learning.',
 'Bachelors', 'Atlantic Technological University', 2024, 'Data Science', 'CV_Chloe_Murray.pdf', CURRENT_TIMESTAMP),


(10, 'Profile_Photo.png', 'Luke', 'Fitzpatrick', NULL, 'Mr.', '2001-07-28',
 'Physics student researching computational models for quantum computing.',
 'Doctorate (PhD)', 'Atlantic Technological University', 2027, 'Quantum Computing', 'CV_Luke_Fitzpatrick.pdf', CURRENT_TIMESTAMP),

(11, 'Profile_Photo.png', 'Laura', 'Kelly', 'Laur', 'Ms.', '2002-08-12',
 'Computer science major passionate about AI-driven applications and automation.',
 'Bachelors', 'Atlantic Technological University', 2024, 'Computer Science', 'CV_Laura_Kelly.pdf', CURRENT_TIMESTAMP),


(12, 'Profile_Photo.png', 'Nathan', 'Lynch', NULL, 'Mr.', '2001-03-09',
 'Biomedical engineering student specializing in medical robotics and prosthetics.',
 'Masters', 'Atlantic Technological University', 2025, 'Biomedical Engineering', 'CV_Nathan_Lynch.pdf', CURRENT_TIMESTAMP),


(13, 'Profile_Photo.png', 'Sarah', 'Byrne', 'Saz', 'Ms.', '2000-12-25',
 'Marketing and brand management enthusiast with an interest in digital strategy.',
 'Bachelors', 'Atlantic Technological University', 2024, 'Marketing & Communications', 'CV_Sarah_Byrne.pdf', CURRENT_TIMESTAMP),


(14, 'Profile_Photo.png', 'Conor', 'Moore', NULL, 'Mr.', '1999-07-04',
 'Finance student interested in risk management and investment portfolio analysis.',
 'Diploma', 'Atlantic Technological University', 2023, 'Finance & Risk Analysis', 'CV_Conor_Moore.pdf', CURRENT_TIMESTAMP),


(15, 'Profile_Photo.png', 'Rachel', 'Higgins', 'Rach', 'Ms.', '2001-09-30',
 'Cybersecurity specialist eager to develop advanced threat detection systems.',
 'Doctorate (PhD)', 'Atlantic Technological University', 2026, 'Cybersecurity', 'CV_Rachel_Higgins.pdf', CURRENT_TIMESTAMP),

 
(35, 'Maggie_Cahill.jpg', 'Margaret', 'Cahill', 'Maggie', 'Ms.', '2004-06-05',
 'Computing student with a wide range of skills in the digital landscape eager to contribute towards a meaningful team.',
 'Bachelors', 'Atlantic Technological University', 2027, 'Computing and Digital Media', 'CV_Margaret_Cahill.pdf', CURRENT_TIMESTAMP);

";


if ($conn->query($sql) === TRUE) {
    echo "Student Profile row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




