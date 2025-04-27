<!DOCTYPE html>
<html>

<head>
    <title>Insert Job Skills </title>
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

$sql = "INSERT INTO Job_Skills (job_id, skill_name)
VALUES

(1, 'Python Programming'),
(1, 'Java Development'),
(1, 'Cloud Computing'),
(1, 'Software Architecture Design'),
(2, 'JavaScript'),
(2, 'React Framework'),
(2, 'UI/UX Design'),
(2, 'Front-End Performance Optimization'),

(3, 'Financial Modeling'),
(3, 'Investment Analysis'),
(3, 'Risk Assessment'),
(3, 'Advanced Excel'),
(4, 'Accounting Principles'),
(4, 'Data Interpretation'),
(4, 'SQL for Finance'),
(4, 'Portfolio Management Basics'),

(5, 'Machine Learning'),
(5, 'Robotics Programming'),
(5, 'Computer Vision'),
(5, 'C++ Development'),

(6, 'Healthcare Data Analytics'),
(6, 'Bioinformatics'),
(6, 'AI for Diagnostics'),
(6, 'Medical Research Methodology'),
(7, 'Clinical Data Processing'),
(7, 'Medical AI Integration'),
(7, 'Statistical Modeling'),
(7, 'Biostatistics'),

(8, 'Energy Policy Analysis'),
(8, 'Renewable Energy Engineering'),
(8, 'Solar Panel Technology'),
(8, 'Sustainable Development'),
(9, 'Environmental Science'),
(9, 'Climate Research'),
(9, 'Green Tech Innovations'),
(9, 'Carbon Footprint Calculation'),

(10, 'Deep Learning'),
(10, 'Cloud Computing'),
(10, 'AI Model Optimization'),
(10, 'Python Programming'),
(11, 'Software Testing'),
(11, 'Selenium'),
(11, 'CI/CD Pipelines'),
(11, 'Unit Testing'),

(12, 'Risk Modeling'),
(12, 'Investment Strategy'),
(12, 'Financial Analytics'),
(12, 'Market Analysis'),
(13, 'Bookkeeping'),
(13, 'Tax Compliance'),
(13, 'Excel Proficiency'),
(13, 'Audit Preparation'),

(14, 'Computer Vision'),
(14, 'Deep Learning'),
(14, 'OpenCV'),
(14, 'AI Algorithm Optimization'),
(15, 'Robotics Software Development'),
(15, 'C++ Programming'),
(15, 'ROS Framework'),
(15, 'Embedded Systems'),

(16, 'Medical AI Integration'),
(16, 'Bioinformatics'),
(16, 'Healthcare Analytics'),
(16, 'AI for Diagnostics'),
(17, 'Clinical Research'),
(17, 'Medical Data Processing'),
(17, 'Biostatistics'),
(17, 'Predictive Health Modeling'),

(18, 'Renewable Energy Engineering'),
(18, 'Environmental Impact Analysis'),
(18, 'Solar and Wind Energy Systems'),
(18, 'Smart Grid Optimization'),
(19, 'Climate Policy Research'),
(19, 'Sustainability Reporting'),
(19, 'Carbon Footprint Analysis'),
(19, 'Renewable Policy Advisory'),

(20, 'Business Strategy Development'),
(20, 'Financial Forecasting'),
(20, 'Market Analysis'),
(20, 'Stakeholder Engagement'),
(21, 'Competitor Analysis'),
(21, 'Data Visualization'),
(21, 'Economic Trend Forecasting'),
(21, 'Consumer Behavior Research'),

(22, 'Penetration Testing'),
(22, 'Threat Detection'),
(22, 'Incident Response'),
(22, 'Network Security Architecture'),
(23, 'Firewall Management'),
(23, 'Security Compliance'),
(23, 'Data Protection Regulations'),
(23, 'Malware Analysis'),

(24, 'Retail Management Strategies'),
(24, 'Customer Relationship Management'),
(24, 'Inventory Control'),
(24, 'Sales Optimization'),
(25, 'Point of Sale (POS) Systems'),
(25, 'Product Merchandising'),
(25, 'Team Leadership'),
(25, 'Store Performance Analysis'),

(26, 'Instructional Design'),
(26, 'Gamification in Learning'),
(26, 'User Experience in EdTech'),
(26, 'E-learning Platform Development'),
(27, 'Data-Driven Learning Models'),
(27, 'Content Management Systems'),
(27, 'Educational Trend Analysis'),
(27, 'Learning Management Systems'),

(28, 'Architectural Drafting'),
(28, 'Sustainable Design Practices'),
(28, 'Construction Regulations'),
(28, 'Project Planning'),
(29, '3D Modeling'),
(29, 'AutoCAD'),
(29, 'Revit and BIM'),
(29, 'Urban Planning Strategies'),

(30, 'Deep Learning'),
(30, 'Neural Networks'),
(30, 'TensorFlow & PyTorch'),
(30, 'AI Model Optimization'),
(31, 'Python Programming'),
(31, 'Machine Learning Frameworks'),
(31, 'Data Preprocessing'),
(31, 'Algorithm Development'),

(32, 'Contract Law'),
(32, 'Regulatory Compliance'),
(32, 'Corporate Litigation'),
(32, 'Mergers & Acquisitions'),
(33, 'Legal Research'),
(33, 'Case Analysis'),
(33, 'Statutory Interpretation'),
(33, 'Drafting Legal Documents'),

(34, 'Startup Growth Strategies'),
(34, 'Funding Acquisition'),
(34, 'Venture Capital Analysis'),
(34, 'Market Disruption Planning'),
(35, 'Digital Branding'),
(35, 'Social Media Marketing'),
(35, 'SEO Optimization'),
(35, 'Client Outreach Strategies'),

(36, 'Healthcare Machine Learning'),
(36, 'Medical Data Processing'),
(36, 'Bioinformatics Analysis'),
(36, 'AI-assisted Diagnostics'),
(37, 'Clinical Research Methodologies'),
(37, 'Medical Image Analysis'),
(37, 'Biostatistics in Medicine'),
(37, 'Predictive Healthcare Analytics'),

(38, 'Renewable Energy System Design'),
(38, 'Sustainability Engineering'),
(38, 'Carbon Emission Reduction'),
(38, 'Energy Grid Optimization'),
(39, 'Environmental Policy Evaluation'),
(39, 'Climate Research'),
(39, 'Green Infrastructure Development'),
(39, 'Solar & Wind Energy Solutions'),

(40, 'Blockchain Development'),
(40, 'FinTech Security'),
(40, 'Data-driven Investment Strategies'),
(40, 'Algorithmic Trading'),
(41, 'Risk Analysis in Financial Tech'),
(41, 'Regulatory Compliance'),
(41, 'Advanced Financial Modeling'),
(41, 'Payment System Engineering'),

(42, 'Architectural Visualization'),
(42, 'AutoCAD & SketchUp'),
(42, 'Building Code Compliance'),
(42, 'Sustainable Construction'),
(43, '3D Modeling Techniques'),
(43, 'Material Sourcing'),
(43, 'Urban Planning Strategies'),
(43, 'Client Presentation Skills');


";


if ($conn->query($sql) === TRUE) {
    echo "Job Skills row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




