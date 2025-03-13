<nav class="navbar">
    <div class="logo">FixedFlow</div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li class="dropdown">
            <a href="#">Asset<i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
                <li><a href="registerasset.php">Register Asset</a></li>
                <li><a href="trackingasset.php">Tracking Asset</a></li>
                <li><a href="disposalasset.php">Dispose Asset</a></li>
                <li><a href="requestasset.php">Request Asset</a></li>
            </ul>
        <li class="dropdown">
            <a href="#">Maintenance<i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
                <li><a href="maintenance.php">Set Schedule</a></li>
                <li><a href="listmaintenance.php">Update Maintenance</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#">Status<i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
                <li><a href="statusAdmin.php">Request Asset</a></li>
                <li><a href="approvebook.php">Approve Booking</a></li>
            </ul>
        </li>   
    </ul>
    <a href="logout.php" class="login-btn">Log Out</a>
</nav>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        outline: none;
        border: none;
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

    /* Dropdown Menu Styles */
    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #e50000;
        list-style: none;
        padding: 10px 0;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu li {
        padding: 10px 20px;
    }

    .dropdown-menu a {
        color: #fff;
        font-size: 16px;
        padding: 5px 10px;
        display: block;
    }

    .dropdown-menu a:hover {
        background-color: #fff;
        color: #333;
        border-radius: 5px;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    /* Login Button Styles */
    .login-btn {
        background-color: #7f0000; /* Bright cyan color */
        color: #fff; /* Dark blue text */
        font-size: 1em;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px; /* Rounded corners */
        cursor: pointer;
        transition: 0.3s ease;
        text-align: center;
    }

    .login-btn:hover {
        background-color: rgb(255, 42, 42); /* Lighter cyan on hover */
        color: #fff; /* White text on hover */
        transform: scale(1.05); /* Slightly enlarge on hover */
    }
</style>