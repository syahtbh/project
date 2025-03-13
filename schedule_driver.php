<?php
session_start();
include('navDriver.php');

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'driver')) {
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

$re_result = $conn->query("SELECT * FROM user_details WHERE staff_id = '$staffid'");
while ($row = $re_result->fetch_assoc()) {
    $username = $row['staff_id'];
    $user_id = $row['user_id']; 
}

// Fetch only Van or Bus bookings
// $sql = "SELECT 
//             b.bookin_id, 
//             b.asset_id, 
//             a.asset_name, 
//             b.booking_date, 
//             b.return_date, 
//             b.status, 
//             b.approval_by, 
//             b.approval_date, 
//             b.reason
//         FROM booking b
//         JOIN asset a ON b.asset_id = a.asset_id
//         WHERE b.user_id = '$user_id' 
//         AND b.status = 'approved'
//         AND a.asset_name IN ('Bus', 'Toyota Hiace')
//         ORDER BY b.booking_date DESC";
$sql = "SELECT 
            b.bookin_id, 
            a.asset_name, 
            b.booking_date, 
            b.return_date, 
            b.status, 
            b.approval_by, 
            b.approval_date, 
            b.reason
        FROM booking b
        JOIN asset a ON b.asset_id = a.asset_id
        WHERE b.status = 'approved'
        AND a.asset_name IN ('Bus', 'Toyota Hiace')
        ORDER BY b.booking_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1 {
            color: darkred;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: darkred;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Driver Schedule</h1>
    <br>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Asset Name</th>
            <th>Booking Date</th>
        </tr>
        <?php 
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                
                <td><?php echo $row["bookin_id"]; ?></td>
                <td><?php echo $row["asset_name"]; ?></td>
                <td><?php echo $row["booking_date"]; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
