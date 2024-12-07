<?php
require('connect.php');

if (isset($_POST['place_order'])) {
    $food_name = $_POST['food_name'];
    $quantity = (int)$_POST['quantity'];
    $delivery_time = $_POST['delivery_time'];
    $price = (float)$_POST['price']; // Get the price from the form

    // Sanitize and insert order into the database
    $stmt = $conn->prepare("INSERT INTO orders (food_name, quantity, delivery_time, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sisd", $food_name, $quantity, $delivery_time, $price);

    if ($stmt->execute()) {
        header("Location: view_orders.php"); // Redirect to the view orders page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - Food Order System</title>
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navigation Bar */
        nav {
            background-color: #333;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        nav a:hover {
            background-color: #575757;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        /* Container Styling */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        /* Footer Styling */
        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <div>
            <a href="#">Food Order System</a>
        </div>
        <div>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <!-- Order Form Container -->
    <div class="container">
        <h1>Place Your Order</h1>

        <form action="place_order.php" method="POST" id="orderForm">
            <div class="form-group">
                <label for="food_name">Food Name:</label>
                <input type="text" id="food_name" name="food_name" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>

            <div class="form-group">
                <label for="delivery_time">Delivery Time:</label>
                <input type="text" id="delivery_time" name="delivery_time" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>

            <div class="form-group">
                <input type="submit" name="place_order" value="Place Order">
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Food Order System</p>
    </footer>

</body>
</html>






