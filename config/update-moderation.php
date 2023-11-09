<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to your MySQL database using MySQLi
$servername = "localhost"; // Replace with your MySQL server address
$username = "root"; // Replace with your MySQL username
$password = "MySQLRoot!"; // Replace with your MySQL password
$dbname = "garage_v_parrot"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the AJAX request
$itemId = $_POST['itemId'];
$isChecked = $_POST['isChecked'];

// Prepare and execute the SQL statement to update the moderation column in the 'comments' table
$sql = "UPDATE comments SET moderation = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

// Check if the SQL statement preparation was successful
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ii", $isChecked, $itemId);

// Check if binding parameters was successful
if (!$stmt) {
    die("Error binding parameters: " . $conn->error);
}

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Moderation status updated successfully.";
} else {
    echo "Error updating moderation status: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
