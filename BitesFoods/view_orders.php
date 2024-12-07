<?php
include('connect.php');

// Fetch orders from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4c430; /* Mustard Yellow */
            color: #333; /* Dark Text for contrast */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container Styling */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            width: 100%;
            max-width: 1000px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333; /* Dark color for heading */
        }

        /* Table Styling */
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Black background with opacity */
            color: #fff; /* White text inside the table */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #333; /* Dark background for headers */
        }

        tr:nth-child(even) {
            background-color: #444; /* Dark grey for even rows */
        }

        tr:nth-child(odd) {
            background-color: #333; /* Dark for odd rows */
        }

        a {
            color: #f2a900; /* Bright yellow-orange for links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Logout Button Styling */
        .logout-btn {
            background-color: #dc3545; /* Red background */
            padding: 10px;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Checkout Button Styling */
        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <!-- Container -->
    <div class="container">
        <h1>Order Summary</h1>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Delivery Time</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['food_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['delivery_time']; ?></td>
                        <td><?php echo '$' . number_format($row['price'], 2); ?></td>
                        <td>
                            <a href="update_order.php?order_id=<?php echo $row['id']; ?>">Update</a> |
                            <a href="delete_order.php?order_id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>

        <!-- Checkout button -->
        <form action="checkout.php" method="GET">
            <input type="submit" value="Checkout">
        </form>
    </div>

</body>
</html>
