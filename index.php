<?php
session_start();
include('include.php');
include('dbconnect.php');
?>

<title>RouteNakama</title>
<link rel= "stylesheet" href="style/include.css"> 
<link rel="stylesheet" href="style/index.css">
<link rel="stylesheet" href= 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>


<body style="background-image: url('image/index.jpg'); 
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            background color: #F8FAFD;
            ">
<div class= "subtitle">
    <div class="sub-section">
    Welcome to RouteNakama, your go-to destination for all your travel scheduling needs. We make it easy to find up-to-date route information for trains and buses, so you can plan your journeys with confidence and ease.
    </div>
</div>
<div class="login">
    <div class='log-left'>

    </div>
    <div class="wrapper">
        <form action="" method='POST'>
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" name='username' required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" name='password' required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
            <a href="#">Forgot Password</a>
        </div>
        <button type="submit" class="btn" name = "login">
            Login
        </button>
        <div class="register-link">
            <p>Dont have an account? <a href="register.php">Register</a></p>
        </div>
        <div>
        <?php
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM user WHERE name = '$username' and password = '$password'";
            $data = mysqli_query($conn,$query);
            $rows = mysqli_num_rows($data);
            if($rows > 0){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: home.php");
            }
            else{
                echo "<p style = 'font-size:15px; color: red; text-align: center;'> Username and Password did not match! </p1>";
            }
        }
        ?>
        </div>
        </form>
    </div>
    <div class='log-right'>

    </div>
</div>