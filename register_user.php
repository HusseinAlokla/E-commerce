<?php
// Connect to the database
$conn = new mysqli('ecommerce-db.cz6imuacs3tj.us-east-1.rds.amazonaws.com', 'root', 'Hma81200400$$', 'ecommercedb',3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$mobile_number = $_POST['mobile_number'];

// Check if passwords match
if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Hash the password before storing it
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO users (first_name, last_name, email, password, mobile_number) 
        VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$mobile_number')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>