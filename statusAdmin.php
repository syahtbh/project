<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    include('navAdmin.php');

    if (!isset($_SESSION['username'])) {
        header("Location: logout.php");
        exit();
    }

    $staffid = $_SESSION['username'];

    // Dapatkan maklumat user
    $user_query = $conn->query("SELECT * FROM user_details WHERE name = '$staffid'");
    if ($user_query->num_rows > 0) {
        $user = $user_query->fetch_assoc();
        $username = $user['staff_id'];
        $user_id = $user['user_id'];
    }

    // Ambil data permintaan yang disetujui
    $sql = "SELECT request_id, color, asset_type, request_date, quantity, reason, approval_by, approval_date FROM request WHERE status = 'approved'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approved Asset Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            text-align: center;
        }
        table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
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
            color: white;
            font-weight: bold;
        }
        h3 {
            font-size: 26px;
            text-align: center;
        }
        input[type="submit"] {
            background-color: darkred;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: rgb(150, 0, 0);
        }
    </style>
</head>
<body>
    <br>
    <h1>Approved Asset Requests</h1>
    <br>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Color</th>
            <th>Asset Type</th>
            <th>Request Date</th>
            <th>Quantity</th>
            <th>Reason</th>
            <th>Approved By</th>
            <th>Approval Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["request_id"] . "</td>
                    <td>" . $row["color"] . "</td>
                    <td>" . $row["asset_type"] . "</td>
                    <td>" . $row["request_date"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td>" . $row["reason"] . "</td>
                    <td>" . $row["approval_by"] . "</td>
                    <td>" . $row["approval_date"] . "</td>
                </tr>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
