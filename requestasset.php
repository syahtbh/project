<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    include('navAdmin.php');
    $staffid = $_SESSION['username'];
    $re_result = $conn->query("SELECT * FROM user_details where name = '$staffid'");
    while($row=$re_result->fetch_assoc()){
        $username = $row['staff_id'];
        $user_id = $row['user_id'];
    }
    if (isset($_POST['submit'])){
        $asset_type = $_POST['asset_type'];
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $reason = $_POST['reason'];
        $status = "PENDING";

        $sql = "INSERT INTO request(asset_type, quantity, color, reason, status, user_id) VALUES ('$asset_type', '$quantity', '$color', '$reason', '$status', '$user_id')";

        if($conn->query($sql) === TRUE){
            echo '<script>alert("Asset request submitted successfully")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Asset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
        }
        h1 {
            text-align: center;
        }
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, button, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input [type="submit"] {
            padding: 10px;
            background: #000;
            color: #fff;
            /* font-weight: 600;
            font-size: 1.35em; */
            letter-spacing: 0.05em;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <br><br>
    <h1>REQUEST ASSET</h1>
    <form action="requestasset.php" method="POST">
        <input type="hidden" name="user_id" id="user_id">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>
        <br>
        <label for="color">Color:</label>
        <select id="color" name="color">
            <option value="black">Black</option>
            <option value="white">White</option>
            <option value="grey">Grey</option>
            <option value="maroon">Maroon</option>
        </select>
        <br>
        <label for="asset_type">Asset Type:</label>
        <select id="asset_type" name="asset_type">
            <option value="car">Car</option>
            <option value="van">Van</option>
            <option value="bus">Bus</option>
            <option value="canopy">Canopy</option>
        </select>
        <br>
        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" placeholder="Enter reason for request" required></textarea>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
