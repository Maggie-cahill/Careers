<!DOCTYPE html>
<html>

<head>
    <title>Insert Employers Profiles </title>
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

$sql = "INSERT INTO Employer_Profiles (
  user_id, profile_picture, first_name, last_name, title, job_title, phone_number, phone_type, type_of_contact,
  organization_name, biography, address, city, eircode, county, country,
  recruitment_agency, website_link, business_area, number_of_employees, created_at
) VALUES


(16, 'Tech.jpg', 'Michael', 'Clark', 'Mr.', 'CEO', '1234567890', 'Office Number', 'Main Contact',
 'TechCorp', 'Leading software development company specializing in AI solutions.',
 '123 Innovation Drive', 'Dublin', 'D01XYZ', 'Dublin', 'Ireland',
 0, 'https://techcorp.com', 'IT and Telecoms', '251-500', CURRENT_TIMESTAMP),

(17, 'Finance.png', 'Sarah', 'Adams', 'Ms.', 'Finance Director', '9876543210', 'Mobile', 'Finance Contact',
 'Global Finance', 'Top-tier financial consultancy firm working with international clients.',
 '10 Business Park', 'Galway', 'H91XYZ', 'Galway', 'Ireland',
 0, 'https://globalfinance.ie', 'Accountancy and Financial Management', '1000+', CURRENT_TIMESTAMP),

(18, 'Robotics.jpg', 'Dylan', 'Reid', 'Dr.', 'CTO', '8765432109', 'Office Number', 'Opportunity Contact',
 'Future Robotics', 'Innovating the field of robotics and AI automation.',
 '22 Robotics Way', 'Limerick', 'V94XYZ', 'Limerick', 'Ireland',
 1, 'https://futurerobotics.com', 'Science, Research and Development', '51-250', CURRENT_TIMESTAMP),

(19, 'Marketing.png', 'Lisa', 'Walsh', 'Ms.', 'Marketing Manager', '7890123456', 'Fax', 'Event Contact',
 'Creative Marketing Agency', 'Specialized marketing firm creating digital strategies for brands.',
 '45 Creative Street', 'Cork', 'T12XYZ', 'Cork', 'Ireland',
 0, 'https://creativemarketing.ie', 'Creative Art & Design', '11-50', CURRENT_TIMESTAMP),

(20, 'HR.jpg', 'Kevin', 'Brennan', 'Mr.', 'HR Consultant', '5678901234', 'Mobile', 'HR Contact',
 'Brennan HR Solutions', 'Helping businesses streamline hiring processes.',
 '67 HR Avenue', 'Waterford', 'X91XYZ', 'Waterford', 'Ireland',
 0, 'https://brennanhr.com', 'Human Resources, Recruitment and Training', '1-10', CURRENT_TIMESTAMP),

(21, 'Medical.jpg', 'Emma', 'O’Brien', 'Dr.', 'Director of Research', '9876543210', 'Office Number', 'Placement and Internship Contact',
 'HealthTech Innovations', 'Leading biomedical research company focusing on AI-assisted healthcare solutions.',
 '150 MedTech Park', 'Dublin', 'D02XYZ', 'Dublin', 'Ireland',
 1, 'https://healthtech.ie', 'Medical and Healthcare', '501-1000', CURRENT_TIMESTAMP),

(22, 'Eco.jpg', 'Sean', 'Gallagher', 'Mr.', 'Sustainability Lead', '8765432109', 'Mobile', 'Vacancy Contact',
 'Renewable Energy Corp', 'Developing groundbreaking renewable energy solutions for global markets.',
 '200 Green Way', 'Galway', 'H91XYZ', 'Galway', 'Ireland',
 0, 'https://renewableenergyworld.com', 'Science, Research and Development', '1000+', CURRENT_TIMESTAMP),

(23, 'MoreHR.png', 'Laura', 'Fitzgerald', 'Ms.', 'Strategy Consultant', '7890123456', 'Office Number', 'Recruitment Agency',
 'Atlas Consulting', 'Providing top-tier business strategy advice and digital transformation solutions.',
 '45 Business Street', 'Cork', 'T12XYZ', 'Cork', 'Ireland',
 0, 'https://atlasconsulting.com', 'Human Resources, Recruitment and Training', '51-250', CURRENT_TIMESTAMP),

(24, 'Cyber.jpeg', 'Mark', 'Nolan', 'Mr.', 'Cybersecurity Engineer', '5678901234', 'Fax', 'HR Contact',
 'CyberSecure Ltd.', 'Protecting companies from cyber threats with leading-edge security solutions.',
 '32 Security Lane', 'Limerick', 'V94XYZ', 'Limerick', 'Ireland',
 0, 'https://cybersecure.ie', 'IT and Telecoms', '251-500', CURRENT_TIMESTAMP),

(25, 'Retail.jpg', 'Rebecca', 'Dunne', 'Ms.', 'Retail Operations Director', '3456789012', 'Mobile', 'Event Contact',
 'Retail Leaders Ireland', 'Providing retail industry leadership and innovation.',
 '65 Commerce Road', 'Waterford', 'X91XYZ', 'Waterford', 'Ireland',
 0, 'https://retailleaders.ie', 'Retail, Sales and Customer Services', '1000+', CURRENT_TIMESTAMP),

(26, 'MoreTech.jpg', 'Ryan', 'McGrath', 'Mr.', 'CTO', '2345678901', 'Office Number', 'Opportunity Contact',
 'EdTech Evolution', 'Education-focused technology company developing next-generation e-learning platforms.',
 '88 Learning Hub', 'Dublin', 'D03XYZ', 'Dublin', 'Ireland',
 0, 'https://edtechevolution.com', 'Science, Research and Development', '11-50', CURRENT_TIMESTAMP),

(27, 'Architect.jpg', 'Jennifer', 'Kennedy', 'Ms.', 'Lead Architect', '1234567890', 'Mobile', 'Main Contact',
 'Architectural Vision', 'Architectural firm specializing in sustainable design solutions.',
 '105 Build Avenue', 'Galway', 'H92XYZ', 'Galway', 'Ireland',
 0, 'https://architecturalvision.ie', 'Construction, Civil Engineering and QS', '251-500', CURRENT_TIMESTAMP),

(28, 'AILabs.jpeg', 'Connor', 'Hayes', 'Dr.', 'AI Researcher', '0987654321', 'Office Number', 'Vacancy Contact',
 'NextGen AI Labs', 'Advanced artificial intelligence research lab focused on machine learning advancements.',
 '77 AI Park', 'Limerick', 'V95XYZ', 'Limerick', 'Ireland',
 1, 'https://nextgenai.ie', 'Science, Research and Development', '51-250', CURRENT_TIMESTAMP),

(29, 'Legal.jpg', 'Lisa', 'Byrne', 'Ms.', 'Senior Legal Advisor', '8765432109', 'Fax', 'HR Contact',
 'Legal Solutions Ireland', 'Providing corporate legal consulting and advisory services.',
 '121 Legal House', 'Waterford', 'X92XYZ', 'Waterford', 'Ireland',
 0, 'https://legalsolutions.ie', 'Other', '1000+', CURRENT_TIMESTAMP),

(30, 'Profile_Photo.png', 'Tom', 'Murphy', 'Mr.', 'Startup Mentor', '7654321098', 'Mobile', 'Placement and Internship Contact',
 'Startup Incubator Ireland', 'Helping new ventures scale with funding and mentorship opportunities.',
 '50 Innovation Space', 'Cork', 'T13XYZ', 'Cork', 'Ireland',
 1, 'https://startupinc.ie', 'Other', '1-10', CURRENT_TIMESTAMP),

(31, 'AI.jpeg', 'Carla', 'Fenton', 'Dr.', 'Chief Medical Officer', '0987654321', 'Office Number', 'Placement and Internship Contact',
 'MedTech Innovators', 'A leading firm specializing in AI-driven medical technology solutions.',
 '500 Healthcare Ave', 'Dublin', 'D04XYZ', 'Dublin', 'Ireland',
 1, 'https://medtechinnovators.com', 'Medical and Healthcare', '501-1000', CURRENT_TIMESTAMP),

(32, 'Renew.jpg', 'Nathan', 'Powers', 'Mr.', 'Renewables Consultant', '0876543210', 'Mobile', 'Vacancy Contact',
 'Green Energy World', 'Developing sustainable energy solutions for residential and commercial sectors.',
 '75 Eco Lane', 'Galway', 'H93XYZ', 'Galway', 'Ireland',
 0, 'https://greenenergyworld.com', 'Science, Research and Development', '1000+', CURRENT_TIMESTAMP),

(33, 'Fintech.jpg', 'Amelia', 'Watson', 'Ms.', 'FinTech Analyst', '0765432109', 'Office Number', 'Finance Contact',
 'Global FinTech', 'Creating cutting-edge financial technology solutions for secure transactions worldwide.',
 '220 Finance Street', 'Limerick', 'V96XYZ', 'Limerick', 'Ireland',
 0, 'https://globalfintech.com', 'Accountancy and Financial Management', '1000+', CURRENT_TIMESTAMP),

(34, 'Interior.jpg', 'Henry', 'Collins', 'Mr.', 'Senior Design Engineer', '0654321098', 'Mobile', 'Event Contact',
 'Design Creators', 'An innovative architecture and interior design firm specializing in modern spaces.',
 '90 Creative Hub', 'Cork', 'T14XYZ', 'Cork', 'Ireland',
 0, 'https://designcreators.com', 'Construction, Civil Engineering and QS', '251-500', CURRENT_TIMESTAMP);


";


if ($conn->query($sql) === TRUE) {
    echo "Employer Profile row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




