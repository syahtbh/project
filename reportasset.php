<?php
session_start();
include('navTM.php');
$conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Borrowing Report</title>
    <style>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
        background-color: #f8f9fa;
    }

    h2 {
        color: black;
        padding: 12px;
        border-radius: 5px;
        text-align: center;
    }

    table {
        
        width: 80%;
        border-collapse: collapse;
        font-size: 18px;
        text-align: center;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        
    }

    th, td {
        padding: 15px;
        border: 1px solid #ddd;
    }

    th {
        background-color:rgb(204, 0, 0); /* Maroon gelap */
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e0b0b0; /* Warna maroon lebih lembut untuk hover */
        transition: 0.3s;
    }

    button {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        background: #800000; /* Maroon gelap */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    button:hover {
        background: #660000; /* Lebih gelap bila hover */
    }
    .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

</style>

</head>
<body>
    <br>
    <br>
    <h2>User Borrowing</h2>
    <div class="container">
        <table>
            <tr>
                <th>User Name</th>
                <th>Total Borrowings</th>
            </tr>
            <?php
            $query = "SELECT u.name, COUNT(b.bookin_id) AS borrow_count 
                      FROM booking b 
                      JOIN user_details u ON b.user_id = u.user_id 
                      GROUP BY b.user_id 
                      ORDER BY borrow_count DESC";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['borrow_count']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <br><br>
    <h2>Most Borrowed Assets</h2>
    <div class="container">
        <table>
            <tr>
                <th>Asset Name</th>
                <th>Total Times Borrowed</th>
            </tr>
            <?php
            $query = "SELECT b.asset_name, COUNT(b.bookin_id) AS borrow_count 
                      FROM booking b 
                      GROUP BY b.asset_name 
                      ORDER BY borrow_count DESC";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['asset_name']; ?></td>
                    <td><?php echo $row['borrow_count']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="container">
        <button onclick="window.print()">Print Report</button>
    </div>
</body>
</html>