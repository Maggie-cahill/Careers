<!DOCTYPE html>
<html>

<head>
    <title>Insert Interests </title>
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

$sql = "INSERT INTO Interests (profile_id, interest_name) VALUES

(1, 'Artificial Intelligence'),
(1, 'Open-Source Development'),
(1, 'Gaming & Game Development'),
(1, 'Cybersecurity Research'),
(1, 'Blockchain Technology'),
(1, 'Coding Challenges & Hackathons'),
(1, 'Space Exploration Tech'),

(2, 'Solar Power Innovations'),
(2, 'Sustainable Living'),
(2, 'Hydroelectric Energy'),
(2, 'Climate Change Research'),
(2, 'Environmental Policy Advocacy'),
(2, 'Eco-Friendly Architecture'),
(2, 'Smart Grids & Energy Storage'),

(3, 'Social Media Strategy'),
(3, 'Brand Development'),
(3, 'Consumer Psychology'),
(3, 'Creative Advertising'),
(3, 'Public Speaking'),
(3, 'Digital Content Creation'),
(3, 'E-Commerce Marketing'),

(4, 'Investment Strategies'),
(4, 'Stock Market Analysis'),
(4, 'Entrepreneurship'),
(4, 'Personal Finance Management'),
(4, 'Business Consulting'),
(4, 'Financial Tech Innovation'),
(4, 'Global Economics Trends'),

(5, 'Ethical Hacking'),
(5, 'Cyber Forensics'),
(5, 'Malware Analysis'),
(5, 'Network Security'),
(5, 'Digital Privacy Advocacy'),
(5, 'Cloud Security'),
(5, 'Threat Intelligence Research'),

(6, 'Medical AI Innovations'),
(6, 'Mental Health Advocacy'),
(6, 'Creative Writing'),
(6, 'Scientific Research'),
(6, 'Cooking & Nutrition'),
(6, 'Travel & Cultural Exploration'),
(6, 'Volunteering in Healthcare'),

(7, 'Typography & Print Design'),
(7, 'Music Production'),
(7, 'Photography'),
(7, 'Cinematic Storytelling'),
(7, 'Fashion & Styling'),
(7, 'Web Animation'),
(7, 'Board Games & Strategy'),

(8, '3D Printing & Prototyping'),
(8, 'Mountain Biking'),
(8, 'Space Exploration'),
(8, 'Woodworking'),
(8, 'DIY Electronics'),
(8, 'Astrophysics'),
(8, 'Hiking & Outdoor Adventures'),

(9, 'Artificial Intelligence & Ethics'),
(9, 'Competitive Chess'),
(9, 'Virtual Reality'),
(9, 'Mathematical Puzzles'),
(9, 'Cooking & Baking'),
(9, 'Podcast Hosting'),
(9, 'Climate Change Analysis'),

(10, 'Quantum Theories & Philosophy'),
(10, 'Reading Sci-Fi Novels'),
(10, 'Astronomy'),
(10, 'Meditation & Mindfulness'),
(10, 'Cycling'),
(10, 'Historical Research'),
(10, 'Art & Abstract Drawing'),

(11, 'Video Game Development'),
(11, 'Cloud Computing'),
(11, 'Board Games & Strategy'),
(11, 'Machine Learning'),
(11, 'Philosophy & Critical Thinking'),
(11, 'Coding Competitions'),
(11, 'Virtual Reality Tech'),

(12, 'Medical Robotics'),
(12, 'Wildlife Conservation'),
(12, 'Reading Mystery Novels'),
(12, 'Human Anatomy & Physiology'),
(12, 'Cooking & Baking'),
(12, 'Public Health Initiatives'),
(12, 'Fitness & Strength Training'),

(13, 'Event Planning'),
(13, 'Comedy & Stand-Up Shows'),
(13, 'Podcast Hosting'),
(13, 'Brand Strategy'),
(13, 'Music Festivals'),
(13, 'Personal Blogging'),
(13, 'E-commerce Marketing'),

(14, 'Cryptocurrency Investing'),
(14, 'Personal Finance Coaching'),
(14, 'Traveling & Exploring Cultures'),
(14, 'Economic Policy Debates'),
(14, 'Debating & Public Speaking'),
(14, 'Stock Trading Simulations'),
(14, 'Hiking & Outdoor Adventures'),

(15, 'AI in Cybersecurity'),
(15, 'Escape Room Challenges'),
(15, 'Coding for Fun'),
(15, 'Building Custom PCs'),
(15, 'Ethical Hacking Competitions'),
(15, 'Sci-Fi Films'),
(15, 'Reading Cybercrime Thrillers'),

(16, 'AI in Cybersecurity'),
(16, 'Escape Room Challenges'),
(16, 'Coding for Fun'),
(16, 'Building Custom PCs'),
(16, 'Ethical Hacking Competitions'),
(16, 'Fantasy Films'),
(16, 'Videography');


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




