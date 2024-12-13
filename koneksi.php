<?php 

$servername = 'localhost';
$username = 'root';
$password = ''; // Leave empty if there's no password
$database = 'db_reservasi';

// Attempt to create a connection
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$koneksi) {
    // Output a more detailed error message
    die('Connection failed: ' . mysqli_connect_error());
}

// Connection successful
//echo "Connected successfully to the database: " . $database;

?>
