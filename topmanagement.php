<?php 
    session_start();
    include('navTM.php');
    // echo "User login as: ", $_SESSION['username'];
    //only admin can create new users
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'topmanagement') {
        header("Location: logout.php");
        exit();
    }
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    $staffid = $_SESSION['username'];
    $re_result = $conn->query("SELECT * FROM user_details where name = '$staffid'");
    while($row=$re_result->fetch_assoc()){
        $username = $row['staff_id'];
        $user_id = $row['user_id'];
    }
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
        $approval_date = date('Y-m-d'); // Get current date
    
        $query = "UPDATE request 
                  SET status = 'approved', approval_by = '$staffid', approval_date = '$approval_date' 
                  WHERE request_id = '$id'";
    
        if ($conn->query($query) === TRUE) {
            echo '<script>alert("Request approved successfully");</script>';
        }
    }
    
    if (isset($_POST['reject'])) {
        $id = $_POST['id'];
        $reject_reason = $_POST['reject_reason'];
        $query = "UPDATE request SET status = 'rejected', reject_reason = '$reject_reason' WHERE request_id = '$id'";
        if ($conn->query($query) === TRUE) {
            echo '<script>alert("Request rejected successfully");</script>';
        }
    }

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
</style>
</head>
<html>
<body>
    <br>
    <h3>Asset Status</h3>
    <br>
<table>
            <tr>
                <th>Name</th>
                <th>Asset Type</th>
                <th>Colour</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php
                $sql = "SELECT re.request_id, ud.staff_id, ud.name, re.asset_type, re.color, re.quantity, re.reason 
                        FROM request re 
                        JOIN user_details ud ON re.user_id = ud.user_id";
                $rs_result = $conn->query($sql);
                while($row=$rs_result->fetch_assoc()){ 
                    
                ?>
                    

            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['asset_type']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td><?php echo $row['quantity']; ?></td>  
                         
                <td>
                <div class="action-form">
                <form action="topmanagement.php" method="post">
                    <input type="hidden" value="<?php echo $row['request_id']; ?>" name="id">
                    <input type="submit" name="approve" value="Approve">
                </form>
                <form action="topmanagement.php" method="post">
                    <input type="hidden" value="<?php echo $row["request_id"]; ?>" name="id">
                    <input type="hidden" value="<?php echo $row["staff_id"]; ?>" name="staff_id">
                    <textarea name="reject_reason" placeholder="Enter reason..."></textarea>
                    <input type="submit" name="reject" value="Reject">
                </td>
            </tr>

            <?php } ?>
                </form>
            </div>
        </table>
    </body>
</html>