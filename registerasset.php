<?php
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    include('navAdmin.php');
    if (isset($_POST['submit'])){
        $assetname = $_POST['asset_name'];
        $assettype = $_POST['asset_type'];
        $status = $_POST['status'];
        $purchasedate = $_POST['purchase_date'];
        $last_maintenance = $_POST['last_maintenance'];
        $platno = $_POST['plat_no'];
        $color = $_POST['color'];

        //echo $stockname.$qty.$unit.$category.$price;
        $sql ="INSERT INTO asset(asset_name, asset_type, status, purchase_date, last_maintenance, plat_no, color) VALUES ('$assetname', '$assettype', '$status', '$last_maintenance', '$purchasedate', '$platno', '$color')";

                if($conn->query($sql)===TRUE){
                    echo '<script>alert("New record created successfully")</script>';
                }else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
?>


<!DOCTYPE html>
<html >
<head>
    <title>Register Asset</title>
    <html>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
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
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            align: center
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
    <h1>REGISTER ASSET</h1>
    <form action= "registerasset.php" method="POST">
        <label for="Asset Name">Asset Name:</label>
        <input type="text" id="assetname" name="asset_name" placeholder="Enter asset name" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>
        <br>
        <label for="unit">Purchase Date:</label>
        <input type="date" id="purchase_date" name="purchase_date" placeholder="Enter purchase date" required>
        <br>
        <label for="unit">Last Maintenance:</label>
        <input type="date" id="last_maintenance" name="last_maintenance" placeholder="Enter latest service date" required>
        <br>
        <label for="asset_type">Asset type:</label>
        <select id="asset_type" name="asset_type">
            <option value="car">Car</option>
            <option value="van">Van</option>
            <option value="bus">Bus</option>
            <option value="canopy">Canopy</option>
        </select>
        <br>
        <label for="plat_no">Plat no:</label>
        <input type="text" id="plat_no" name="plat_no" placeholder="Enter plat no" required>
        <br>
        <label for="color">Color:</label>
        <input type="text" id="color" name="color" placeholder="Enter color" required>
        <br>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="available">Available</option>
            <option value="notavailable">Not Available</option>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>