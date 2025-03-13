<!-- Navigation Section -->
<header>
    <table width="100%">
    <!-- <tr align=center><td><img src="jjk.jpeg" width="30%" height="20%"></td></tr> -->
    </table>
    <nav class="navbar">
        <div class="logo">FixedFlow</div>
        <ul class="nav-links">
            <li><a href="driver.php">Home</a></li>
            <li><a href="schedule_driver.php">Schedule</a></li>
        </ul>
        <a href="logout.php" class="login-btn">Log Out</a>
    </nav>
</header>

<!-- Navigation Styles -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        outline: none;
        /* border: none; */
        text-decoration: none;
        text-transform: capitalize;
        transition: 0.2s linear;
    }

    /* Centering the Navigation */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 65px;
        padding: 0 30px;
        background-color: #e50000;
        position: relative;
    }

    /* Logo Styles */
    .logo {
        font-size: 30px;
        font-weight: bold;
        color: #fff;
    }

    /* Navigation Links */
    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    .nav-links a {
        color: #fff;
        font-size: 18px;
        padding: 7px 10px;
        transition: 0.3s ease;
    }

    .nav-links a:hover {
        background-color: #fff;
        color: #333;
        border-radius: 5px;
    }

    /* Login Button Styles */
    .login-btn {
        background-color: #7f0000; 
        color: #fff; 
        font-size: 1em;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px; /* Rounded corners */
        cursor: pointer;
        transition: 0.3s ease;
        text-align: center;
    }

    .login-btn:hover {
        background-color:rgb(255, 42, 42); /* Lighter cyan on hover */
        color: #fff; /* White text on hover */
        transform: scale(1.05); /* Slightly enlarge on hover */
    }
</style>