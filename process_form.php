<?php
// Replace these values with your actual database credentials
$host = "localhost";
$username = "root";
$password = '';
$database = "parulregister";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["username"]);
    $email = sanitizeInput($_POST["email"]);
    $college = sanitizeInput($_POST["collagename"]);
    $year = sanitizeInput($_POST["year"]);
    $batch = sanitizeInput($_POST["timing"]);

    // You can add further validation or processing logic here

    // Insert the data into the database
    $sql = "INSERT INTO tbl_gymregister (username, email, collagename, year, timing) VALUES ('$name', '$email', '$college', '$year', '$timing')";
    
    if ($conn->query($sql) === TRUE) {
        // If the insertion is successful, redirect to a success page
        header("Location: payment.html");
        exit();
    } else {
        // If there's an error, redirect back to the form with a pop-up message
        header("Location: signup.html?error=" . urlencode("Server issue. Please try again later."));
        exit();
    }
    
    // Close the database connection
    $conn->close();
}
?>
