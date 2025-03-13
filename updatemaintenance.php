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

    // Ambil asset_id dari URL atau POST
    if (isset($_GET['asset_id'])) {
        $asset_id = $_GET['asset_id'];
    } elseif (isset($_POST['asset_id'])) {
        $asset_id = $_POST['asset_id'];
    } else {
        die("Error: Asset ID is not set.");
    }

    // Update maintenance
    if (isset($_POST['submit'])) {
        $schedule_date = $_POST['maintenance_date'];
        $maintenance_status = "COMPLETE";
        $cost = $_POST['cost'];

        $sql = "UPDATE maintenance 
                SET maintenance_date = '$schedule_date', maintenance_status = '$maintenance_status', cost = '$cost'
                WHERE asset_id = '$asset_id'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Maintenance schedule updated successfully.")</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Ambil maklumat aset
    $sql = "SELECT ass.asset_name, ass.asset_id, ass.last_maintenance 
            FROM asset ass 
            JOIN maintenance main ON ass.asset_id = main.asset_id 
            WHERE ass.asset_id = '$asset_id'";
    $rs_result = $conn->query($sql);
    if ($rs_result->num_rows > 0) {
        $asset = $rs_result->fetch_assoc();
    } else {
        die("Error: Asset not found.");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            text-align: center;
        }
        form {
            width: 350px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            text-align: left;
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
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Schedule Maintenance</h1>

    <form action="updatemaintenance.php" method="POST">
        <input type="hidden" name="asset_id" value="<?php echo $asset_id; ?>">
        <label>Asset Name:</label>
        <input type="text" name="asset_name" value="<?php echo $asset["asset_name"]; ?>" readonly><br>
        <label>Last Maintenance:</label>
        <input type="date" name="last_maintenance" value="<?php echo $asset["last_maintenance"]; ?>" readonly><br>
        <label>Actual Date:</label>
        <input type="date" id="maintenance_date" name="maintenance_date" required><br>
        <label>Cost:</label>
        <input type="text" id="cost" name="cost" placeholder="RM 0.00" required><br>
        <input type="submit" name="submit" value="Submit"><br>
    </form>
</body>
</html>
