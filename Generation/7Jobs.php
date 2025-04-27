<!DOCTYPE html>
<html>

<head>
    <title>Insert Jobs </title>
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

$sql = "INSERT INTO Jobs (
    profile_id, position_title, location, salary, description, requirements, work_environment, 
    job_form, job_type, closing_date, posted_date, start_date, end_date, apply_link
) VALUES


(1, 'Software Engineer', 'Dublin', 75000.00, 
 'Develop scalable software solutions using AI-driven algorithms.', 
 'Proficiency in Python, Java, and cloud technologies.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-15', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://techcorp.com/careers'),

(1, 'Front-End Developer Intern', 'Dublin', 32000.00, 
 'Assist in UI/UX design for AI-powered web platforms.', 
 'Basic JavaScript, React, and UI design principles.', 
 'Remote', 'Contract', 'Internship', '2025-06-30', CURRENT_TIMESTAMP, '2025-07-15', '2025-09-15', 'https://techcorp.com/internships'),

(1, 'Graduate AI Engineer', 'Dublin', 35000.00, 
 'Work on cutting-edge AI model development under senior mentorship.', 
 'Knowledge of deep learning frameworks and cloud computing.', 
 'Hybrid', 'Full-Time', 'Graduate Program', '2025-08-01', CURRENT_TIMESTAMP, '2025-09-01', '2026-08-01', 'https://techcorp.com/graduates'),

(2, 'Senior Financial Analyst', 'Galway', 60000.00, 
 'Develop financial models and analyze investment opportunities.', 
 'Degree in Finance or Economics. Strong analytical and Excel skills.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-07-10', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://globalfinance.ie/jobs'),

(2, 'Finance Intern', 'Galway', 32000.00, 
 'Assist in financial reporting and client portfolio analysis.', 
 'Basic understanding of accounting principles and Excel.', 
 'Hybrid', 'Contract', 'Work Placement', '2025-07-01', CURRENT_TIMESTAMP, '2025-07-20', '2025-10-20', 'https://globalfinance.ie/internships'),

(3, 'Robotics AI Engineer', 'Limerick', 70000.00, 
 'Develop AI models for automation and robotics systems.', 
 'Proficiency in Python, ROS, and machine learning techniques.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-20', CURRENT_TIMESTAMP, '2025-08-10', NULL, 'https://futurerobotics.com/jobs'),

(3, 'Robotics Software Developer Intern', 'Limerick', 32000.00, 
 'Assist in the development of control software for smart robotics.', 
 'Basic experience in C++, ROS, and embedded systems.', 
 'Hybrid', 'Contract', 'Internship', '2025-07-01', CURRENT_TIMESTAMP, '2025-07-20', '2025-10-20', 'https://futurerobotics.com/internships'),

(6, 'Clinical Data Analyst', 'Dublin', 65000.00, 
 'Analyze healthcare data trends and support AI-driven medical research.', 
 'Degree in biomedical engineering or data science.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-07-20', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://healthtech.ie/jobs'),

(6, 'Biomedical Research Intern', 'Dublin', 32000.00, 
 'Support research teams working on AI-assisted healthcare solutions.', 
 'Background in medical sciences, data analytics, or AI research.', 
 'Hybrid', 'Contract', 'Work Placement', '2025-06-30', CURRENT_TIMESTAMP, '2025-07-15', '2025-12-15', 'https://healthtech.ie/internships'),

(7, 'Sustainability Consultant', 'Galway', 62000.00, 
 'Advise on renewable energy projects and climate-friendly solutions.', 
 'Degree in environmental science, sustainability, or energy engineering.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-15', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://renewableenergyworld.com/jobs'),

(7, 'Climate Policy Research Intern', 'Galway', 32000.00, 
 'Assist in climate policy analysis and green technology innovations.', 
 'Background in environmental science or public policy.', 
 'Remote', 'Contract', 'Internship', '2025-06-20', CURRENT_TIMESTAMP, '2025-07-05', '2025-10-05', 'https://renewableenergyworld.com/internships'),

(1, 'AI Research Engineer', 'Dublin', 80000.00, 
 'Lead AI model development for cutting-edge software solutions.', 
 'Expertise in deep learning frameworks and cloud computing.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-10', CURRENT_TIMESTAMP, '2025-09-01', NULL, 'https://techcorp.com/jobs'),

(1, 'Software Quality Assurance Tester', 'Dublin', 55000.00, 
 'Ensure software reliability by conducting automated and manual testing.', 
 'Experience with Selenium, unit testing, and CI/CD pipelines.', 
 'Remote', 'Full-Time', 'Entry-Level', '2025-07-25', CURRENT_TIMESTAMP, '2025-08-15', NULL, 'https://techcorp.com/careers'),

(2, 'Financial Risk Analyst', 'Galway', 62000.00, 
 'Evaluate market risks and create financial models for investment strategy.', 
 'Proficiency in risk modeling and financial analytics tools.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-07-30', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://globalfinance.ie/jobs'),

(2, 'Accounting Intern', 'Galway', 31000.00, 
 'Gain hands-on experience in financial reporting and audit processes.', 
 'Basic knowledge of bookkeeping, tax compliance, and Excel.', 
 'Hybrid', 'Contract', 'Internship', '2025-06-20', CURRENT_TIMESTAMP, '2025-07-05', '2025-10-05', 'https://globalfinance.ie/internships'),

(3, 'Computer Vision Engineer', 'Limerick', 75000.00, 
 'Develop AI-powered image recognition for robotic applications.', 
 'Proficiency in OpenCV, deep learning, and algorithm optimization.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-15', CURRENT_TIMESTAMP, '2025-09-01', NULL, 'https://futurerobotics.com/careers'),

(3, 'Robotics Software Developer Intern', 'Limerick', 32000.00, 
 'Assist in the development of control software for smart robotics.', 
 'Basic experience in C++, ROS, and embedded systems.', 
 'Hybrid', 'Part-Time', 'Internship', '2025-07-01', CURRENT_TIMESTAMP, '2025-07-20', '2025-10-20', 'https://futurerobotics.com/internships'),

(6, 'Medical AI Engineer', 'Dublin', 75000.00, 
 'Develop AI-based solutions for healthcare diagnostics and treatments.', 
 'Experience in data science, bioinformatics, and machine learning.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-07-30', CURRENT_TIMESTAMP, '2025-08-15', NULL, 'https://healthtech.ie/careers'),

(6, 'Lab Research Assistant Intern', 'Dublin', 32000.00, 
 'Support research teams in analyzing patient data for AI-driven healthcare.', 
 'Background in health sciences, statistics, or machine learning.', 
 'Hybrid', 'Part-Time', 'Internship', '2025-06-30', CURRENT_TIMESTAMP, '2025-07-15', '2025-10-15', 'https://healthtech.ie/internships'),

(7, 'Green Technology Engineer', 'Galway', 68000.00, 
 'Design and implement renewable energy solutions for residential and commercial clients.', 
 'Degree in environmental engineering or renewable energy.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-05', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://renewableenergyworld.com/jobs'),

(7, 'Climate Policy Research Intern', 'Galway', 32000.00, 
 'Assist in climate policy analysis and green technology innovations.', 
 'Background in environmental science or public policy.', 
 'Remote', 'Contract', 'Internship', '2025-06-20', CURRENT_TIMESTAMP, '2025-07-05', '2025-10-05', 'https://renewableenergyworld.com/internships'),

(8, 'Business Consultant', 'Cork', 70000.00, 
 'Advise clients on digital transformation and business optimization strategies.', 
 'Degree in business, finance, or economics. Strong analytical skills.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-01', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://atlasconsulting.com/jobs'),

(8, 'Market Research Intern', 'Cork', 32000.00, 
 'Assist in researching industry trends and competitor analysis for strategy development.', 
 'Basic knowledge of market analytics and data interpretation.', 
 'Remote', 'Contract', 'Internship', '2025-07-10', CURRENT_TIMESTAMP, '2025-07-25', '2025-09-25', 'https://atlasconsulting.com/internships'),

(9, 'Cybersecurity Engineer', 'Limerick', 75000.00, 
 'Develop and implement security solutions to protect company infrastructure.', 
 'Experience in network security, penetration testing, and encryption.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-30', CURRENT_TIMESTAMP, '2025-08-15', NULL, 'https://cybersecure.ie/jobs'),

(9, 'Security Analyst Intern', 'Limerick', 32000.00, 
 'Assist cybersecurity teams in analyzing threat patterns and implementing security protocols.', 
 'Basic understanding of firewall configurations, intrusion detection systems.', 
 'Remote', 'Contract', 'Internship', '2025-06-25', CURRENT_TIMESTAMP, '2025-07-10', '2025-10-10', 'https://cybersecure.ie/internships'),

(10, 'Retail Operations Manager', 'Waterford', 58000.00, 
 'Oversee store operations and lead customer service initiatives.', 
 'Experience in retail management and supply chain optimization.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-07-20', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://retailleaders.ie/jobs'),

(10, 'Sales Associate', 'Waterford', 32000.00, 
 'Assist customers and manage retail floor operations.', 
 'Strong communication skills and sales experience.', 
 'In-Person', 'Part-Time', 'Entry-Level', '2025-06-30', CURRENT_TIMESTAMP, '2025-07-15', NULL, 'https://retailleaders.ie/jobs'),

(11, 'E-Learning Product Manager', 'Dublin', 60000.00, 
 'Develop digital learning tools and manage educational content creation.', 
 'Degree in education technology or instructional design.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-05', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://edtechevolution.com/jobs'),

(11, 'Education Research Intern', 'Dublin', 32000.00, 
 'Assist in developing digital education tools and researching emerging trends in e-learning.', 
 'Background in education or software development.', 
 'Remote', 'Part-Time', 'Internship', '2025-07-10', CURRENT_TIMESTAMP, '2025-07-30', '2025-10-30', 'https://edtechevolution.com/internships'),

(12, 'Architectural Design Consultant', 'Galway', 65000.00, 
 'Lead sustainable design initiatives for commercial and residential projects.', 
 'Degree in architecture, proficiency in CAD software.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-15', CURRENT_TIMESTAMP, '2025-08-01', NULL, 'https://architecturalvision.ie/jobs'),

(12, '3D Design Intern', 'Galway', 32000.00, 
 'Assist in architectural visualization projects and 3D modeling.', 
 'Knowledge of Revit or SketchUp.', 
 'Remote', 'Contract', 'Entry-Level', '2025-07-05', CURRENT_TIMESTAMP, '2025-07-20', '2025-10-20', 'https://architecturalvision.ie/internships'),


(13, 'Machine Learning Researcher', 'Limerick', 78000.00, 
 'Develop state-of-the-art AI models for data processing and automation.', 
 'Expertise in deep learning, NLP, and TensorFlow/PyTorch.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-10', CURRENT_TIMESTAMP, '2025-09-01', NULL, 'https://nextgenai.ie/careers'),

(13, 'AI Development Intern', 'Limerick', 32000.00, 
 'Assist in machine learning model training and performance optimization.', 
 'Basic understanding of Python, ML frameworks, and data science concepts.', 
 'Remote', 'Contract', 'Internship', '2025-07-05', CURRENT_TIMESTAMP, '2025-07-20', '2025-10-20', 'https://nextgenai.ie/internships'),

(14, 'Corporate Legal Advisor', 'Waterford', 72000.00, 
 'Provide expert legal consulting services to businesses and clients.', 
 'Experience in contract law, regulatory compliance, and corporate litigation.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-01', CURRENT_TIMESTAMP, '2025-08-15', NULL, 'https://legalsolutions.ie/jobs'),

(14, 'Legal Research Intern', 'Waterford', 32000.00, 
 'Support legal teams by conducting case research and compliance analysis.', 
 'Background in law or corporate governance.', 
 'Remote', 'Part-Time', 'Internship', '2025-07-15', CURRENT_TIMESTAMP, '2025-07-30', '2025-10-30', 'https://legalsolutions.ie/internships'),

(15, 'Startup Growth Consultant', 'Cork', 68000.00, 
 'Guide emerging companies in scaling their operations and securing investments.', 
 'Experience in entrepreneurship, investment strategies, and market analysis.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-25', CURRENT_TIMESTAMP, '2025-08-15', NULL, 'https://startupinc.ie/careers'),

(15, 'Startup Marketing Intern', 'Cork', 32000.00, 
 'Assist in branding strategies and digital outreach for startup clients.', 
 'Basic understanding of digital marketing tools and audience engagement.', 
 'Remote', 'Contract', 'Internship', '2025-06-30', CURRENT_TIMESTAMP, '2025-07-15', '2025-10-15', 'https://startupinc.ie/internships'),

(16, 'Biomedical AI Engineer', 'Dublin', 75000.00, 
 'Develop AI-driven medical solutions for diagnostics and treatment.', 
 'Expertise in biomedical engineering, AI algorithms, and healthcare analytics.', 
 'In-Person', 'Full-Time', 'Experienced', '2025-08-20', CURRENT_TIMESTAMP, '2025-09-05', NULL, 'https://medtechinnovators.com/jobs'),

(16, 'Medical Research Intern', 'Dublin', 32000.00, 
 'Support teams analyzing patient data for AI-enhanced treatment research.', 
 'Background in health sciences, statistics, or machine learning.', 
 'Hybrid', 'Part-Time', 'Internship', '2025-07-10', CURRENT_TIMESTAMP, '2025-07-30', '2025-10-30', 'https://medtechinnovators.com/internships'),

(17, 'Renewable Energy Engineer', 'Galway', 69000.00, 
 'Develop and implement sustainable energy technologies for residential and commercial clients.', 
 'Experience in solar energy, wind power, and green infrastructure.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-30', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://greenenergyworld.com/jobs'),

(17, 'Sustainability Analyst Intern', 'Galway', 32000.00, 
 'Assist research teams in evaluating climate policies and renewable energy trends.', 
 'Background in environmental science or engineering.', 
 'Remote', 'Part-Time', 'Internship', '2025-06-25', CURRENT_TIMESTAMP, '2025-07-10', '2025-10-10', 'https://greenenergyworld.com/internships'),

(18, 'FinTech Software Engineer', 'Limerick', 72000.00, 
 'Develop secure financial transaction software using blockchain technology.', 
 'Experience in Java, Python, and cybersecurity.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-07-30', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://globalfintech.com/jobs'),

(18, 'Investment Analytics Intern', 'Limerick', 32000.00, 
 'Assist in analyzing investment trends and financial technologies.', 
 'Background in finance, data analytics, and risk assessment.', 
 'Remote', 'Part-Time', 'Internship', '2025-06-25', CURRENT_TIMESTAMP, '2025-07-10', '2025-10-10', 'https://globalfintech.com/internships'),

(19, 'Senior Interior Designer', 'Cork', 68000.00, 
 'Lead creative design projects for commercial and residential spaces.', 
 'Expertise in AutoCAD, SketchUp, and sustainable architecture.', 
 'Hybrid', 'Full-Time', 'Experienced', '2025-08-05', CURRENT_TIMESTAMP, '2025-08-20', NULL, 'https://designcreators.com/jobs'),

(19, 'Architectural Intern', 'Cork', 32000.00, 
 'Assist in designing structural layouts and 3D visualization projects.', 
 'Basic experience with architectural drawing software.', 
 'Remote', 'Contract', 'Internship', '2025-07-10', CURRENT_TIMESTAMP, '2025-07-25', '2025-10-25', 'https://designcreators.com/internships');

";


if ($conn->query($sql) === TRUE) {
    echo "Jobs row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




