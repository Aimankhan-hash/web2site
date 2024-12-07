<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, address, phone, email, password) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $name, $address, $phone, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: ./order_food.php"); // Redirect to the order food page
 // Redirect to login page
    } else {
        die("Execution failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
