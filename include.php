<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&display=swap" rel="stylesheet">
</head>


    <div class='head-title-pannel'>
        <div class="left-section">
        </div>
        <div class="middle-section">
            RouteNakama
        </div>
        <div class="right-section">
        <?php
            $url = $_SERVER['REQUEST_URI'];
            if ($url == '/RouteNakama/home.php') {
        ?>
        <form method='POST'><input type="submit" value='Logout' class="logout-btn" name='logout'> </form>
        <?php
            if(isset($_POST['logout'])) {
                include('logout.php');
            }
            }
        ?>
        </div>
    </div>
</body>
</html>