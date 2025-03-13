<?php
    session_start();
    include('navAdmin.php');
    
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: logout.php");
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');

    if (isset($_POST['approve'])) {
        $bookin_id = $_POST['bookin_id'];
        $staff_id = $_SESSION['username'];
        $approval_date = date("Y-m-d");
        $latest_date = date("Y-m-d H:i:s"); // Timestamp for latest_date
        
        $sql = "UPDATE booking 
                SET status='approved', approval_by='$staff_id', approval_date='$approval_date', latest_date='$latest_date' 
                WHERE bookin_id='$bookin_id'";
        $conn->query($sql);
    }
    
    if (isset($_POST['reject'])) {
        $bookin_id = $_POST['bookin_id'];
        
        $sql = "UPDATE booking SET status='rejected' WHERE bookin_id='$bookin_id'";
        $conn->query($sql);
    }
    
    $result = $conn->query("SELECT * FROM booking WHERE status='pending'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Approval Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        input[type="submit"] {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }
        .approve {
            background: green;
            color: white;
        }
        .reject {
            background: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Approval Page</h1>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Asset Name</th>
                <th>Booking Date</th>
                <th>Return Date</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['bookin_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['asset_name']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['return_date']; ?></td>
                    <td><?php echo $row['reason']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="bookin_id" value="<?php echo $row['bookin_id']; ?>">
                            <input type="submit" name="approve" value="Approve" class="approve">
                            <input type="submit" name="reject" value="Reject" class="reject">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
