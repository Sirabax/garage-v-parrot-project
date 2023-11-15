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
$marque = isset($_POST['marque']) ? filter_var($_POST['marque'], 513) : '';
$modele = isset($_POST['modele']) ? filter_var($_POST['modele'], 513) : '';
$prix = isset($_POST['prix']) ? filter_var($_POST['prix'], 520) : '';
$annee = isset($_POST['annee']) ? filter_var($_POST['annee'], 519) : '';
$kilometrage = isset($_POST['kilometrage']) ? filter_var($_POST['kilometrage'], 519) : '';
$couleur = isset($_POST['couleur']) ? filter_var($_POST['couleur'], 513) : '';


// Prepare and execute the SQL statement to insert a new row into the 'voitures' table
$sql = "INSERT INTO voitures (marque, modele, prix, annee, kilometrage, couleur) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Check if the SQL statement preparation was successful
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssdiis", $marque, $modele, $prix, $annee, $kilometrage, $couleur);

// Check if binding parameters was successful
if (!$stmt->execute()) {
    die("Error inserting voiture: " . $stmt->error);
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();

// Return a JSON response
header('Content-Type: application/json');
echo json_encode(['message' => 'Voiture added successfully']);
