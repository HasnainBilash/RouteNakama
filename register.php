<?php include("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/register.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Register-RouteNakama</title>

</head>
<body style="background-image: url('image/register.png'); 
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            background color: #F8FAFD;
            ">
    <div class="container">
        <form action="" method="POST">
            <div>
            <h1 class='headline'>Register</h1>
            </div>
            <div class = "input-field">
                <box-icon name='phone' ></box-icon>
                <input type="text" class='input' name='phone' placeholder='Phone Number' required>
            </div>
            <div class = "input-field">
                <box-icon name='user'></box-icon>
                <input type="text" class='input' name='username' placeholder='Username' required >
            </div>
            <div class = "input-field">
                <box-icon name='lock'></box-icon>
                <input type="password" class='input' name='password' placeholder='Password' required>
            </div>
            <div class = "input-field">
                <box-icon name='lock'></box-icon>
                <input type="password" class='input' name='confirm_password' placeholder='Confirm Password' required>
            </div>
                <input type="submit" value='Register' class="btn" name='register'>
            </div>
        </form>
    </div>
</body>
</html>


<?php
if(isset($_POST['register'])){
    $phone =$_POST['phone'];
    $username =$_POST['username'];
    $password = $_POST['password'];
    $confirm_password =$_POST['confirm_password'];
    
    if(strlen($username) < 4) {

        echo"<p style = 'color:red; text-align:center; font-size:20px; ' >Username is too short, pleased try again.</p>";
    }
    else if(strlen($phone) < 11) {
        echo"<p style = 'color:red; text-align:center; font-size:20px; ' >Phone is invalid, pleased try again.</p>";
    }

    else if($password == $confirm_password && $password !== '')
    {
        $query = "INSERT INTO user(name,password,phone) VALUES ('$username','$password','$phone')";
        
        $data = mysqli_query($conn,$query);

        if($data)
        {
            header("Location: index.php");
        }
        else
        {
            echo"<p style = 'color:red; text-align:center;' >Something went wrong, pleased try again.</p>";
        }
    }
    else{
        echo"<p style = 'color:red; text-align:center; font-size:20px; ' >Passwords do not match, pleased try again.</p>";
    }
}
?>