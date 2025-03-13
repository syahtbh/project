<?php
    session_start();
    
    include('navstu_staff.php');
    if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'student' && $_SESSION['role'] != 'staff')) {
        header("Location: logout.php");
        exit();
    }
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    $staffid = $_SESSION['username'];
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;  // Elakkan undefined array key error

    $re_result = $conn->query("SELECT * FROM user_details WHERE staff_id = '$staffid'");
    while ($row = $re_result->fetch_assoc()) {
        $username = $row['staff_id'];
        $user_id = $row['user_id']; 
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Asset Booking Status</title>
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
            font-size: 28px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            color: white;
        }
        .approved {
            background-color: green;
        }
        .pending {
            background-color: orange;
        }
        .rejected {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Asset Booking Status</h1>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Asset Name</th>
                <th>Booking Date</th>
                <th>Return Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Approved By</th>
                <th>Approval Date</th>
            </tr>
            <?php
                
                $sql = "SELECT * FROM booking 
                WHERE user_id = '$user_id' 
                ORDER BY booking_date DESC";
    
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["bookin_id"]; ?></td>
                        <td><?php echo $row["asset_name"]; ?></td>
                        <td><?php echo $row["booking_date"]; ?></td>
                        <td><?php echo $row["return_date"]; ?></td>
                        <td><?php echo $row["reason"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td><?php echo $row["approval_by"] ? $row["approval_by"] : '-'; ?></td>
                        <td><?php echo $row["approval_date"] ? $row["approval_date"] : '-'; ?></td>
                    </tr>
                <?php 
                }
                $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
