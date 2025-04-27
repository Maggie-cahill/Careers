<!DOCTYPE html>
<html>

<head>
    <title>Insert Skills </title>
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

$sql = "INSERT INTO Skills (profile_id, skill_name, skill_type) VALUES

(1, 'Python Programming', 'hard'),
(1, 'Machine Learning', 'hard'),
(1, 'Database Management', 'hard'),
(1, 'Cybersecurity Basics', 'hard'),
(1, 'Critical Thinking', 'soft'),
(1, 'Team Collaboration', 'soft'),
(1, 'Problem Solving', 'soft'),

(2, 'Solar Energy Systems', 'hard'),
(2, 'Wind Power Technologies', 'hard'),
(2, 'Environmental Impact Analysis', 'hard'),
(2, 'Project Management', 'hard'),
(2, 'Leadership', 'soft'),
(2, 'Communication Skills', 'soft'),
(2, 'Research & Data Analysis', 'soft'),

(3, 'SEO & SEM Strategies', 'hard'),
(3, 'Social Media Marketing', 'hard'),
(3, 'Advertising Analytics', 'hard'),
(3, 'Content Creation', 'hard'),
(3, 'Creativity', 'soft'),
(3, 'Negotiation Skills', 'soft'),
(3, 'Public Speaking', 'soft'),

(4, 'Financial Modeling', 'hard'),
(4, 'Data Analysis & Interpretation', 'hard'),
(4, 'Investment Strategies', 'hard'),
(4, 'Risk Management', 'hard'),
(4, 'Decision Making', 'soft'),
(4, 'Networking Skills', 'soft'),
(4, 'Adaptability', 'soft'),

(5, 'Ethical Hacking', 'hard'),
(5, 'Network Security', 'hard'),
(5, 'Cryptography', 'hard'),
(5, 'Penetration Testing', 'hard'),
(5, 'Analytical Thinking', 'soft'),
(5, 'Attention to Detail', 'soft'),
(5, 'Time Management', 'soft'),

(6, 'Medical Data Analytics', 'hard'),
(6, 'Electronic Health Records (EHR)', 'hard'),
(6, 'AI in Healthcare', 'hard'),
(6, 'Data Security in Health Tech', 'hard'),
(6, 'Problem Solving', 'soft'),
(6, 'Attention to Detail', 'soft'),
(6, 'Interpersonal Communication', 'soft'),

(7, 'Adobe Photoshop', 'hard'),
(7, 'User Experience (UX) Design', 'hard'),
(7, 'Web Interface Design', 'hard'),
(7, 'Illustration & Branding', 'hard'),
(7, 'Creativity', 'soft'),
(7, 'Collaboration', 'soft'),
(7, 'Critical Thinking', 'soft'),

(8, 'CAD & 3D Modeling', 'hard'),
(8, 'Finite Element Analysis (FEA)', 'hard'),
(8, 'Automation Systems', 'hard'),
(8, 'Mechanical Design', 'hard'),
(8, 'Analytical Thinking', 'soft'),
(8, 'Teamwork', 'soft'),
(8, 'Problem-Solving', 'soft'),

(9, 'Python & R for Data Science', 'hard'),
(9, 'Machine Learning Algorithms', 'hard'),
(9, 'Big Data Analysis', 'hard'),
(9, 'Predictive Analytics', 'hard'),
(9, 'Logical Thinking', 'soft'),
(9, 'Data-Driven Decision Making', 'soft'),
(9, 'Research & Presentation Skills', 'soft'),

(10, 'Quantum Mechanics', 'hard'),
(10, 'Computational Simulations', 'hard'),
(10, 'Quantum Cryptography', 'hard'),
(10, 'Advanced Mathematics', 'hard'),
(10, 'Analytical Thinking', 'soft'),
(10, 'Problem-Solving', 'soft'),
(10, 'Patience & Dedication', 'soft'),

(11, 'Software Development', 'hard'),
(11, 'Data Structures & Algorithms', 'hard'),
(11, 'Cloud Computing', 'hard'),
(11, 'Web Application Development', 'hard'),
(11, 'Logical Thinking', 'soft'),
(11, 'Collaboration', 'soft'),
(11, 'Adaptability', 'soft'),

(12, 'Medical Device Prototyping', 'hard'),
(12, 'Biomechanics', 'hard'),
(12, 'AI in Health Technology', 'hard'),
(12, 'Human Anatomy & Physiology', 'hard'),
(12, 'Critical Thinking', 'soft'),
(12, 'Team Collaboration', 'soft'),
(12, 'Analytical Reasoning', 'soft'),

(13, 'Market Research', 'hard'),
(13, 'Social Media Branding', 'hard'),
(13, 'Consumer Psychology', 'hard'),
(13, 'Email Marketing Campaigns', 'hard'),
(13, 'Creative Problem-Solving', 'soft'),
(13, 'Storytelling', 'soft'),
(13, 'Interpersonal Communication', 'soft'),

(14, 'Portfolio Management', 'hard'),
(14, 'Financial Forecasting', 'hard'),
(14, 'Risk Assessment Models', 'hard'),
(14, 'Taxation & Regulatory Policies', 'hard'),
(14, 'Strategic Decision-Making', 'soft'),
(14, 'Negotiation Skills', 'soft'),
(14, 'Leadership', 'soft'),


(15, 'Incident Response & Threat Analysis', 'hard'),
(15, 'Cloud Security', 'hard'),
(15, 'Cyber Forensics', 'hard'),
(15, 'Zero Trust Architecture', 'hard'),
(15, 'Attention to Detail', 'soft'),
(15, 'Problem-Solving', 'soft'),
(15, 'Time Management', 'soft'),


(16, 'Object Oriented Programming', 'hard'),
(16, 'Computer Forensics', 'hard'),
(16, 'Project Management', 'hard'),
(16, 'Adobe Products', 'hard'),
(16, 'Attention to Detail', 'soft'),
(16, 'Problem-Solving', 'soft'),
(16, 'Time Management', 'soft');

";


if ($conn->query($sql) === TRUE) {
    echo "Skills row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




