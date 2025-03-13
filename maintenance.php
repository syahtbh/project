<?php 
    session_start();
    include('navAdmin.php');
    // echo "User login as: ", $_SESSION['username'];
    //only admin can create new users
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: logout.php");
        exit();
    }
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');


?>
<head>
<style>
    .action-form {
        display: flex;
        gap: 5px;
        align-items: center;
        justify-content: center;
    }
    textarea {
        width: 150px;
        height: 40px;
        resize: none;
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
<html>
<body>
<table>
    <br>
    <h3>Maintenance</h3>
            <tr>
                <th>Asset Name</th>
                <th>No Plat</th>
                <th>Asset Type</th>
                <th>Last Maintenance</th>
                <th>Action</th>
            </tr>
            <?php
                $sql = "SELECT * FROM asset";
                $rs_result = $conn->query($sql);
                while($row=$rs_result->fetch_assoc()){ 
                    
                ?>
                    

            <tr>
                <td><?php echo $row['asset_name']; ?></td>
                <td><?php echo $row['plat_no']; ?></td>
                <td><?php echo $row['asset_type']; ?></td> 
                <td><?php echo $row['last_maintenance']; ?></td> 
                <td>
                    <form action="schedulemain.php" method="POST">
                        <input type="hidden" name="asset_id" value="<?php echo $row['asset_id']; ?>" >
                        <input type="submit" value="Set Schedule">
                    </form>
                    
                </td>
            </tr>

            <?php } ?>

        </table>
    </body>
</html>