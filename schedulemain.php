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

    $re_result = $conn->query("SELECT * FROM asset");
    while($row=$re_result->fetch_assoc()){
        $asset_id = $row['asset_id'];
    }

    if (isset($_POST['submit'])){
        // $last_maintenance = $_POST['last_maintenance'];
        $schedule_date = $_POST['maintenance_date'];
        $maintenance_status = "PENDING";

        $asset_id = $_POST['asset_id']; 
        $sql = "UPDATE maintenance 
        SET maintenance_date = '$schedule_date', maintenance_status = '$maintenance_status' 
        WHERE asset_id = '$asset_id'";


        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Maintenance schedule updated successfully.")</script>';
        } else {
            echo "Error: " . $conn->error;
        }
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
        input [type="submit"]{
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
    <h1>Schedule Maintenance</h1>
    <br>
<body>
        <?php
            $asset_id = $_POST['asset_id']; 
            $sql = "SELECT ass.asset_name, ass.asset_id, ass.last_maintenance FROM asset ass 
            JOIN maintenance main ON ass.asset_id = main.asset_id WHERE ass.asset_id = '$asset_id'";
            $rs_result = $conn->query($sql);
            while($row=$rs_result->fetch_assoc()){?>
                
        <form action="schedulemain.php" method="POST">
        <input type="hidden" name="asset_id" value="<?php echo $asset_id; ?>">
        <label>Asset Name:</label>
        <input type="text" name="asset_name" value="<?php echo $row["asset_name"];?>" readonly><br>
        <label>Last Maintenance:</label>
        <input type="date" name="last_maintenance" value="<?php echo $row["last_maintenance"]; ?>" readonly><br>
        <label>Schedule to Maintenance:</label>
        <input type="date" id="maintenance_date" name="maintenance_date" required>
        <input type="submit" name="submit" value="Submit"><br>
        </form>
        <?php } ?>
    </body>
</html>
