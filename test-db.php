<?php
// Database connection parameters
$servername = "ecommerce-db.cz6imuacs3tj.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "Hma81200400$$";
$dbname = "ecommercedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Perform a simple query
$sql = "SELECT * FROM users LIMIT 10";
$result = $conn->query($sql);

// Check if query was successful
if ($result === FALSE) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>