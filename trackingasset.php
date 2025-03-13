<?php
    session_start();
    include('navAdmin.php');
    // echo "User login as: ", $_SESSION['username'];

    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: logout.php");
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');

    // Handle search query
    $search = "";
    if(isset($_POST['submit'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM asset WHERE asset_name LIKE '%$search%' OR asset_type LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM asset";
    }

    $rs_result = $conn->query($sql);

    // Fetch asset details when clicking on an asset
    $assetDetails = null;
    if(isset($_GET['asset_id'])) {
        $asset_id = $_GET['asset_id'];
        $result = $conn->query("SELECT * FROM asset WHERE asset_id = $asset_id");
        $assetDetails = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Asset Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            text-align: center;
        }
        .search-box {
            margin: 20px;
        }
        .search-box input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid rgb(255, 42, 42);
            border-radius: 5px;
        }
        .search-box input[type="submit"] {
            padding: 8px 15px;
            background: #7f0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #7f0000;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .status {
            padding: 5px;
            border-radius: 5px;
            font-weight: bold;
        }
        .available {
            background: #28a745;
            color: white;
        }
        .in-use {
            background: #dc3545;
            color: white;
        }
        .modal {
            display: block;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            position: relative;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <br>
    <h1>Asset Tracking</h1>
    <form action="trackingasset.php" method="POST" class="search-box">
        <input type="text" name="search" placeholder="Search by asset name or type..." value="<?php echo $search; ?>" required>
        <input type="submit" name="submit" value="Search">
    </form>
    <table>
        <tr>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Status</th>
        </tr>
        <?php while($row = $rs_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['asset_name']; ?></td>
                <td><?php echo $row['asset_type']; ?></td>
                <td>
                    <?php 
                        $status = $row['status'] == 'available' ? "Available" : "In Use"; 
                        $statusClass = $row['status'] == 'available' ? "available" : "in-use"; 
                    ?>
                    <span class="status <?php echo $statusClass; ?>"><?php echo $status; ?></span>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
