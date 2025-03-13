<?php 
    session_start();
    //echo "User login as: ", $_SESSION['username'];
    //only admin can create new users
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: logout.php");
        exit();
    }
    $conn = new mysqli('localhost', 'root', '', 'fixed_assets_management_system');

    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $staffid = $_POST['staffid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];

        //check if user already exist
        $sql = "SELECT * FROM login WHERE username = '$staffid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("User already exist!!")</script>';
    }else{
        //register user code here
        $sql = "INSERT INTO user_details (name, phone, staff_id, department, email) 
        VALUES ('$name', '$phone', '$staffid', '$department', '$email')";

        if($conn->query($sql) === TRUE){
            echo "New record created successfully";
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql2 = "INSERT INTO login (username, password, role) VALUES ('$staffid', '$password', '$role')";
        if($conn->query($sql2) === TRUE){
            echo '<script>alert("New record created successfully")</script>';
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
}  
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>
<style>
    
    /* Font import and global reset */
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

    /* Global reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }

    /* Body styling */
    body {
      display: flex;
      /* justify-content: center;
      align-items: center; */
      /* min-height: 100vh; */
      background: #000;
    }

    /* Section styles */
    section {
      position: absolute;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2px;
      flex-wrap: wrap;
      overflow: hidden;
    }

    /* Animated gradient effect */
    section::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(#000, #f00, #000);
      animation: animate 5s linear infinite;
    }

    /* Animation keyframes */
    @keyframes animate {
      0% {
        transform: translateY(-100%);
      }
      100% {
        transform: translateY(100%);
      }
    }

    /* Styling for individual spans */
    section span {
      position: relative;
      display: block;
      width: calc(6.25vw - 2px);
      height: calc(6.25vw - 2px);
      background: #181818;
      z-index: 2;
      transition: 1.5s;
    }

    section span:hover {
      background: #f00;
      transition: 0s;
    }

    /* Sign-in form styles */
    .signin {
      position: absolute;
      width: 400px;
      background: #222;
      z-index: 1000;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      border-radius: 4px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9);
    }

    .signin .content {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 40px;
    }

    .signin .content h2 {
      font-size: 2em;
      color: #f00;
      text-transform: uppercase;
    }

    .signin .content .form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .signin .content .form .inputBox {
      position: relative;
      width: 100%;
    }

    .signin .content .form .inputBox input {
      position: relative;
      width: 100%;
      background: #333;
      border: none;
      outline: none;
      padding: 25px 10px 7.5px;
      border-radius: 4px;
      color: #fff;
      font-weight: 500;
      font-size: 1em;
    }

    .signin .content .form .inputBox i {
      position: absolute;
      left: 0;
      padding: 15px 10px;
      font-style: normal;
      color: #aaa;
      transition: 0.5s;
      pointer-events: none;
    }

    .signin .content .form .inputBox input:focus ~ i,
    .signin .content .form .inputBox input:valid ~ i {
      transform: translateY(-7.5px);
      font-size: 0.8em;
      color: #fff;
    }

    .signin .content .form .links {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    .signin .content .form .links a {
      color: #fff;
      text-decoration: none;
    }

    .signin .content .form .links a:nth-child(2) {
      color: #f00;
      font-weight: 600;
    }

    .signin .content .form .inputBox input[type="submit"] {
      padding: 10px;
      background: #f00;
      color: #000;
      font-weight: 600;
      font-size: 1.35em;
      letter-spacing: 0.05em;
      cursor: pointer;
    }

    input[type="submit"]:active {
      opacity: 0.6;
    }

    /* Media queries for responsive design */
    @media (max-width: 900px) {
      section span {
        width: calc(10vw - 2px);
        height: calc(10vw - 2px);
      }
    }

    @media (max-width: 600px) {
      section span {
        width: calc(20vw - 2px);
        height: calc(20vw - 2px);
      }
    }

</style>
<body>
<form action = "register.php" method = "POST">
<!-- partial:index.partial.html -->
<section>

    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>

    
    <div class="signin">
      <div class="content">
        <h2>Sign Up</h2>
        <div class="form">
          <div class="inputBox">
            <input type="text" name="name" required="">
            <i>Name</i>
          </div>
          <div class="inputBox">
            <input type="text" name="staffid" required="">
            <i>Staff Id</i>
          </div>
          <div class="inputBox">
            <input type="text" name="email" required="">
            <i>Email</i>
          </div>
          <div class="inputBox">
            <input type="text" name="phone" required="">
            <i>Phone Number</i>
          </div>
          <div class="inputBox">
            <input type="text" name="department" required="">
            <i>Department</i>
          </div>
          <div class="inputBox">
            <input type="text" name="role" required="">
            <i>Role</i>
          </div>
          <div class="inputBox">
            <input type="password" name="password" required="">
            <i>Password</i>
          </div>
          <div class="links">
            <a href="#" type="hidden">Forgot Password</a>
            <a href="login.php">Sign In</a>
          </div>
          <div class="inputBox">
            <input type="submit" value="Sign Up" name="submit">
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- partial -->
   </form>
</body>
</html>