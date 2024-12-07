<?php 
require('connect.php'); // Include the database connection

// Fetch the order details for the update
if (isset($_GET['order_id'])) {
    $order_id = (int)$_GET['order_id'];
    $sql = "SELECT * FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc(); // Fetch the order details from the database
    } else {
        echo "Order not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4c430;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background-color: rgba(253, 248, 229, 0.9);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #d77f2c;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #333;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <!-- Container for form -->
    <div class="container">
        <h1>Update Order</h1>

        <!-- Update Form -->
        <form action="update_order_process.php" method="POST">
            <div class="form-group">
                <label for="food_name">Food Name</label>
                <input type="text" id="food_name" name="food_name" value="<?php echo htmlspecialchars($order['food_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($order['quantity']); ?>" required>
            </div>

            <div class="form-group">
                <label for="delivery_time">Delivery Time</label>
                <input type="text" id="delivery_time" name="delivery_time" value="<?php echo htmlspecialchars($order['delivery_time']); ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($order['price']); ?>" required>
            </div>

            <!-- Hidden field for order ID -->
            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">

            <div class="form-group">
                <input type="submit" value="Update Order">
            </div>
        </form>
    </div>

</body>
</html> 
