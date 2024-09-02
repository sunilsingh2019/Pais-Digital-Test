<?php 
$servername = "localhost";
$username = "username"; // replace with your database username
$password = "root"; // replace with your database password
$dbname = "database"; // replace with your database name
$port = 3307; // replace with your db port
$conn = new mysqli($servername, $username, $password, "", $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$dbCreationQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($dbCreationQuery) === FALSE) {
    die("Error creating database: " . $conn->error);
}
$conn->select_db($dbname);
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    country VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableCreationQuery) === FALSE) {
    die("Error creating table: " . $conn->error);
}