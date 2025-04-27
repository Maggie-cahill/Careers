<!DOCTYPE html>
<html>

<head>
    <title>Insert Important Links </title>
</head>

<body>

<?php
$servername = "maggieproject";
$username = "root";
$password = "root";
$dbname = "careers_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Important_Links (profile_id, link_url, link_type) VALUES

(1, 'https://linkedin.com/in/alice-murphy', 'LinkedIn'),
(1, 'https://github.com/AliceMurphy', 'GitHub'),
(1, 'https://alicemurphy.dev', 'Portfolio'),
(1, 'https://projects.atu.ie/ai-chatbot', 'Project'),
(1, 'https://certificates.atu.ie/machine-learning', 'Certificates'),
(1, 'https://alicewrites.medium.com', 'Other'),
(1, 'https://hackathon-winner.alicemurphy.dev', 'Project'),

(2, 'https://linkedin.com/in/james-oconnor', 'LinkedIn'),
(2, 'https://github.com/JamesOConnor', 'GitHub'),
(2, 'https://jamesgreenenergy.com', 'Portfolio'),
(2, 'https://projects.atu.ie/solar-panel-analysis', 'Project'),
(2, 'https://certificates.atu.ie/sustainable-energy', 'Certificates'),
(2, 'https://climatechangeblog.jamesoconnor.com', 'Other'),
(2, 'https://researchgate.net/profile/JamesOConnor', 'Project'),

(3, 'https://linkedin.com/in/sophie-kelly', 'LinkedIn'),
(3, 'https://github.com/SophieKellyDesigns', 'GitHub'),
(3, 'https://sophiekellymarketing.com', 'Portfolio'),
(3, 'https://projects.atu.ie/brand-strategy', 'Project'),
(3, 'https://certificates.atu.ie/social-media-marketing', 'Certificates'),
(3, 'https://medium.com/@sophiekelly', 'Other'),
(3, 'https://behance.net/sophiekelly', 'Project'),

(4, 'https://linkedin.com/in/ryan-carter', 'LinkedIn'),
(4, 'https://github.com/RyanCarterFinance', 'GitHub'),
(4, 'https://ryancarterfinance.com', 'Portfolio'),
(4, 'https://projects.atu.ie/financial-risk-analysis', 'Project'),
(4, 'https://certificates.atu.ie/quantitative-finance', 'Certificates'),
(4, 'https://ryancarter.substack.com', 'Other'),
(4, 'https://fintechblog.ryancarter.com', 'Project'),

(5, 'https://linkedin.com/in/emma-doyle', 'LinkedIn'),
(5, 'https://github.com/EmmaDoyleSec', 'GitHub'),
(5, 'https://emmacybersecurity.com', 'Portfolio'),
(5, 'https://projects.atu.ie/security-testing', 'Project'),
(5, 'https://certificates.atu.ie/cyber-threat-analysis', 'Certificates'),
(5, 'https://cybernews.emmadoyle.com', 'Other'),
(5, 'https://capturetheflag.emmadoyle.dev', 'Project'),

(6, 'https://linkedin.com/in/david-farrell', 'LinkedIn'),
(6, 'https://healthdatajournal.com/david-farrell', 'Project'),
(6, 'https://certificates.atu.ie/medical-data-analysis', 'Certificates'),

(7, 'https://linkedin.com/in/megan-oconnor', 'LinkedIn'),
(7, 'https://dribbble.com/MeganOConnorDesign', 'Portfolio'),
(7, 'https://github.com/MeganOConnorUX', 'GitHub'),
(7, 'https://projects.atu.ie/user-experience-research', 'Project'),

(8, 'https://linkedin.com/in/jack-nolan', 'LinkedIn'),
(8, 'https://github.com/JackNolanEng', 'GitHub'),
(8, 'https://mechanicaldesignblog.com/jack-nolan', 'Other'),

(9, 'https://linkedin.com/in/chloe-murray', 'LinkedIn'),
(9, 'https://medium.com/@chloemurray-data', 'Other'),
(9, 'https://github.com/ChloeMurrayData', 'GitHub'),

(10, 'https://quantumcomputingblog.com/luke-fitzpatrick', 'Project'),
(10, 'https://linkedin.com/in/luke-fitzpatrick', 'LinkedIn'),
(10, 'https://certificates.atu.ie/quantum-theory', 'Certificates'),

(11, 'https://linkedin.com/in/laura-kelly', 'LinkedIn'),
(11, 'https://github.com/LauraKellyDev', 'GitHub'),
(11, 'https://laurakelly.dev', 'Portfolio'),
(11, 'https://projects.atu.ie/coding-project', 'Project'),

(12, 'https://linkedin.com/in/nathan-lynch', 'LinkedIn'),
(12, 'https://biomedicalresearchjournal.com/nathan-lynch', 'Project'),
(12, 'https://certificates.atu.ie/biomedical-engineering', 'Certificates'),

(13, 'https://linkedin.com/in/sarah-byrne', 'LinkedIn'),
(13, 'https://marketingstrategy.sarahbyrne.com', 'Portfolio'),
(13, 'https://behance.net/sarahbyrne', 'Project'),

(14, 'https://linkedin.com/in/conor-moore', 'LinkedIn'),
(14, 'https://github.com/ConorMooreFinance', 'GitHub'),
(14, 'https://investmentblog.conormoore.com', 'Other'),

(15, 'https://linkedin.com/in/rachel-higgins', 'LinkedIn'),
(15, 'https://github.com/RachelHigginsSec', 'GitHub'),
(15, 'https://cybersecuritynews.com/rachel-higgins', 'Project'),
(15, 'https://certificates.atu.ie/security-analysis', 'Certificates'),

(16, 'https://www.linkedin.com/in/margaret-cahill-g00423830/', 'LinkedIn'),
(16, 'https://maggiecahillportfolio.weebly.com/', 'Portfolio'),
(16, 'https://g00423830.webhosting.atu.ie/whatscooking/index.php', 'Project');




";


if ($conn->query($sql) === TRUE) {
    echo "Important links row(s) inserted successfully<br>";
  } else {
    echo "Error inserting row(s): " . $conn->error;
  }
  

$conn->close();
?>

</body>
</html>




