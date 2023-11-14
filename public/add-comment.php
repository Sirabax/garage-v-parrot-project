<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to your MySQL database using MySQLi
$servername = "localhost";
$username = "root";
$password = "MySQLRoot!";
$dbname = "garage_v_parrot";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize values from the form
$name = isset($_POST['name']) ? filter_var($_POST['name'], 513) : '';
$rating = isset($_POST['rating']) ? $_POST['rating'] : 5;
$comment = isset($_POST['comment']) ? filter_var($_POST['comment'], 513) : '';

// Set default values
$moderation = 0;
$created = date('Y-m-d H:i:s');

// Prepare and execute the SQL statement to insert a new row into the 'comments' table
$sql = "INSERT INTO comments (name, rating, comment, moderation, created) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Check if the SQL statement preparation was successful
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("sisis", $name, $rating, $comment, $moderation, $created);

// Check if binding parameters was successful
if (!$stmt->execute()) {
    die("Error inserting comment: " . $stmt->error);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();

// Return a JSON response
header('Content-Type: application/json');
echo json_encode(['message' => 'Comment added successfully']);