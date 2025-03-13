<?php
session_start();
include('navstu_staff.php');

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'student' && $_SESSION['role'] != 'staff')) {
    header("Location: logout.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
$staffid = $_SESSION['username'];

$re_result = $conn->query("SELECT * FROM user_details WHERE staff_id = '$staffid'");
if ($row = $re_result->fetch_assoc()) {
    $_SESSION['user_id'] = $row['user_id']; // Store in session
    $username = $row['staff_id'];
}

if (isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $asset_id = $_POST['asset_id'];
    $booking_date = $_POST['booking_date'];
    $return_date = $_POST['return_date'];
    $reason = $_POST['reason'];

    $asset_query = $conn->query("SELECT asset_name FROM asset WHERE asset_id = '$asset_id'");
    $asset_row = $asset_query->fetch_assoc();
    $asset_name = $asset_row['asset_name'];

    $sql = "INSERT INTO booking(user_id, asset_id, booking_date, return_date, status, reason, asset_name) 
            VALUES ('$user_id', '$asset_id', '$booking_date', '$return_date', 'pending', '$reason', '$asset_name')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Booking request submitted successfully")</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Asset</title>
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
        input[type="submit"] {
            padding: 10px;
            background: #000;
            color: #fff;
            letter-spacing: 0.05em;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <br><br>
    <h1>BOOKING ASSET</h1>
    <br>
    <form action="bookingasset.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <label for="asset_name">Asset Name:</label>
        <select name="asset_id">
        <?php
            $re_result = $conn->query("SELECT * FROM asset");
            while ($row = $re_result->fetch_assoc()) { ?>
                <option value="<?php echo $row['asset_id']; ?>">
                    <?php echo $row['asset_name']; ?>
                </option>
        <?php } ?>
        </select>
        <br>
        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date" required>
        <br>
        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required>
        <br>
        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" placeholder="Enter reason for booking" required></textarea>
        <br>
        <input type="submit" name="submit" value="Submit Booking">
    </form>
</body>
</html>
