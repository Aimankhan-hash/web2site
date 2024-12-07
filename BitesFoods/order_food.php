<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order System</title>
    <style>
        /* General Reset and Box Sizing */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4c430; /* Mustard Yellow */
        }

        /* Main Layout */
        .main-container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Split into two equal sections */
            flex: 1;
            height: calc(100vh - 60px); /* Full height minus navbar */
        }

        /* Left Side - Background Image */
        .image-section {
            background: url('formimage/imageback.jpg') no-repeat center center/cover;
            background-size: cover;
            height: 100%;
        }

        /* Right Side - Form Section */
        .form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.3); /* Dark overlay for contrast */
        }

        /* Form Container */
        .form-container {
            border: 2px solid #333; /* Dark Border */
            padding: 30px;
            border-radius: 8px;
            width: 80%;
            max-width: 400px;
            background-color: rgba(253, 248, 229, 0.9); /* Light yellow background with opacity */
        }

        /* Form Heading */
        .form-container h1 {
            text-align: center;
            color: #d77f2c; /* Warm Orange for headings */
            margin-bottom: 20px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input::placeholder {
            color: #999; /* Placeholder color */
        }

        .form-group input[type="submit"] {
            background-color: #333; /* Dark Gray for the button */
            color: white;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #555; /* Lighter Gray for hover effect */
        }

        /* Additional Button Styling */
        .logout-btn {
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr; /* Stack the sections on smaller screens */
            }

            .form-container {
                width: 100%; /* Full width on mobile */
            }
        }
    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Left Image Section -->
        <div class="image-section"></div>

        <!-- Right Form Section -->
        <div class="form-section">
            <div class="form-container">
                <h1>Food Order Form</h1>
                <form action="place_order.php" method="POST">
                    <div class="form-group">
                        <label for="food_name">Food Name:</label>
                        <input type="text" id="food_name" name="food_name" placeholder="Enter food name" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                        <label for="delivery_time">Delivery Time:</label>
                        <input type="time" id="delivery_time" name="delivery_time" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="place_order" value="Place Order">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>








