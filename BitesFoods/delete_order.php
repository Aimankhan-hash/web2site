<?php
require('connect.php');

if (isset($_GET['order_id'])) {
    $order_id = (int)$_GET['order_id'];

    // Delete the order from the database
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        header("Location: view_orders.php"); // Redirect to view orders page
    } else {
        echo "Error deleting order: " . $stmt->error;
    }

    $stmt->close();
}
?>
