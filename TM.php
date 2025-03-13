<?php 
    session_start();
    include('navTM.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Asset Management System</title>

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<style>
    /* font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

.hero{
    width: 100%;
    height: 100vh;
    background: url(bg.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.hero .text{
    width: 90%;
    margin: auto;
}
.hero .text h4{
    font-size: 40px;
    color: #fff;
    font-weight: 500;
    margin-bottom: 10px;
}
.hero .text h1{
    color: #fff;
    font-size: 65px;
    text-transform: uppercase;
    line-height: 1;
    margin-bottom: 30px;
}
.hero .text h1 span{
    color: #dd0707;
    font-size: 80px;
    font-weight: bold;
}
.hero .text p{
    color: #fff;
    margin-bottom: 30px;
}
.hero .text .btn{
    padding: 10px 30px;
    background-color: #dd0707;
    text-transform: uppercase;
    color: #fff;
    font-weight: bold;
    border-radius: 30px;
    border: 2px solid #dd0707;
    transition: 0.3s;
}
.hero .text .btn:hover{
    background-color: transparent;
}
</style>

<body>
    <div class="hero">

        <div class="text">
            <h4>Powerful, Fun and</h4>
            <h1>Fierce to <br> <span>Drive</span></h1>
            <p>Real Poise, Real Power, Real Perfomance.</p>
            <a href="Login.php" class="btn">book a test ride</a>
        </div>
    </div>

    <script>
        let heroBg = document.querySelector('.hero');

        setInterval(() => {
            heroBg.style.backgroundImage = "url(img/bg-light.jpg)"
            
            setTimeout(() => {
                heroBg.style.backgroundImage = "url(img/bg.jpg)"
            }, 1000);
        }, 2200);
    </script>
</body>
</html>