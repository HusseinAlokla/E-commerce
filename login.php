<?php
$conn = new mysqli('ecommerce-db.cz6imuacs3tj.us-east-1.rds.amazonaws.com', 'root', 'Hma81200400$$', 'ecommercedb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
        // Start session and set user details
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        header("Location: index.php");
    } else {
        echo "Invalid email or password.";
    }

    mysqli_close($conn);
}
?>