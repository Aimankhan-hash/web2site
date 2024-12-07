<?php 
include('connect.php');

// Fetch the orders to be checked out
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Calculate the total price
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4c430; /* Mustard Yellow */
            background-image: url('photo/BBQPLATTER.avif'); /* Replace with your image path */
            background-size: cover; /* Ensures the image covers the entire screen */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            color: #333; /* Dark Text for contrast */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* For positioning the logout button */
        }

        /* Container Styling */
        .container {
            max-width: 900px;
            margin: 30px auto;
            background-color: rgba(253, 248, 229, 0.9); /* Creamy White with opacity */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #d77f2c; /* Warm Orange for headings */
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            color: #555;
        }

        table th {
            background-color: #d77f2c; /* Warm orange for table header */
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9; /* Light Gray for even rows */
        }

        table tr:nth-child(odd) {
            background-color: #f1f1f1; /* Slightly darker gray for odd rows */
        }

        /* Total Price Styling */
        .total-price {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #d77f2c; /* Matching orange for total price */
            margin-top: 20px;
        }

        /* Checkout Button Styling */
        input[type="submit"] {
            background-color: #333; /* Dark Gray for the button */
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #555; /* Lighter Gray for hover effect */
        }

        /* Logout Button Styling */
        .logout-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #dc3545; /* Red for logout button */
            padding: 10px;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c82333; /* Slightly darker red on hover */
        }
    </style>
</head>
<body>

    <!-- Container -->
    <div class="container">
        <h1>Checkout</h1>

        <!-- Order Display -->
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Delivery Time</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['food_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['delivery_time']; ?></td>
                            <td>$<?php echo number_format($row['price'], 2); ?></td>
                        </tr>
                        <?php $total_price += $row['price']; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="total-price">
                Total Price: $<?php echo number_format($total_price, 2); ?>
            </div>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>

        <!-- Checkout button -->
        <form action="checkout_process.php" method="POST">
            <input type="submit" value="Proceed to Checkout">
        </form>
    </div>

    <!-- Logout button outside the container -->
    <a href="logout.php" class="logout-btn">Logout</a>

</body>
</html>
