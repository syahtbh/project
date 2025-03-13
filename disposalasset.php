<?php
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    include('navAdmin.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $disposal_name = $_POST['disposal_by'];
        $asset_id = $_POST['asset_id'];  // Change from asset_name to asset_id
        $disposal_date = $_POST['disposal_date'];
        $reason = $_POST['reason'];

        // Fetch asset details using asset_id
        $asset_query = $conn->query("SELECT asset_name, asset_type FROM asset WHERE asset_id = '$asset_id'");
        $asset = $asset_query->fetch_assoc();
        $assetname = $asset['asset_name'];
        $assettype = $asset['asset_type'];

        // Insert disposal record
        $sql = "INSERT INTO disposal (disposer_by, asset_id, asset_name, asset_type, disposal_date, reason) 
                VALUES ('$disposal_by', '$asset_id', '$assetname', '$assettype', '$disposal_date', '$reason')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Asset disposal recorded successfully")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dispose Asset</title>
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
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>DISPOSE ASSET</h1>
    <form action="disposeasset.php" method="POST">
        <label for="disposal_by">Disposer Name:</label>
        <input type="text" id="disposal_by" name="disposal_by" placeholder="Enter your name" required>
        <br>

        <label for="asset_id">Asset Name:</label>
        <select id="asset_id" name="asset_id" required>
            <option value="">Select Asset</option>
            <?php
                $asset_query = $conn->query("SELECT asset_id, asset_name FROM asset");
                while ($row = $asset_query->fetch_assoc()) {
                    echo "<option value='" . $row['asset_id'] . "'>" . $row['asset_name'] . "</option>";
                }
            ?>
        </select>
        <br>

        <label for="disposal_date">Disposal Date:</label>
        <input type="date" id="disposal_date" name="disposal_date" required>
        <br>

        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" placeholder="Enter reason for disposal" required></textarea>
        <br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
