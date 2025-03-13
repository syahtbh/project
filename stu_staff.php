<?php
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');
    include('navstu_staff.php');
?>

<html>
    <head>
    </head>
    <body>
        <h3>Welcome, Student & Staff!</h3>
        <h4>Register new user? <a href="register.php">click here</a></h4>
        <a href="logout.php">Logout</a>
    </body>
</html>