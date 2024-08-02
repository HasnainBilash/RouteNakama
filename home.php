<?php
session_start();
if (isset($_SESSION['username'])) {          # checking if this is a registerd user or not ( if 1<--)
    include('include.php');  
?>
<title>Home Page-RouteNakama</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>  <!--  this and the perv one is for the search option in the dropdown used   -->
<link rel= "stylesheet" href="style/include.css">
<link rel= "stylesheet" href="style/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">


<body style="background-image: url('image/home.jpg'); 
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            background color: #F8FAFD;
            ">
<p class= "user-greeting"> 
    <?php
        echo 'Welcome '. $_SESSION['username'] . ', what mode of transport would you prefer?';
    ?>
</p>
<form method= 'POST' class = 'transportation-option-button'>
    <input type="submit" value='Train' class="btn" name='action'>
    <input type="submit" value='Bus' class="btn" name='bus'>    <!-- when add bus options then switch to name= action -->
</form>

<?php
if(isset($_POST['action'])) {    # if the train button is clicked then it will show the bellow train related options  (if 2 <--)
?>

    <div class = "train-container">
        <div class='data-select'>
            <form action='' method="POST">
                <div style='margin-top:50px;'>
                <select class = "dropdown" name = 'start_location' required>
                    <option value=''>Select your starting station</option>
                    <?php
                        include('dbconnect.php');  
                        $query = "SELECT DISTINCT stationName FROM trains";
                        $stations = mysqli_query($conn,$query);
                        while($s = mysqli_fetch_array($stations)) {
                    ?>
                    <option> <?php echo $s['stationName'] ?> </option>
                    <?php
                        }
                    ?>
                </select>
                </div>
                <div style='margin-top:50px;'>
                <select class = "dropdown" name='end_location' required>
                    <option value=''>Select your ending station</option>
                    <?php
                        $query = "SELECT DISTINCT stationName FROM trains";
                        $stations = mysqli_query($conn,$query);
                        while($s = mysqli_fetch_array($stations)) {
                    ?>
                    <option> <?php echo $s['stationName'] ?> </option>
                    <?php
                        }
                    ?>
                </select>
                </div>
                <div>
                    <input type="submit" value='Submit' class="submit-btn" name='action'>
                </div>
            </form>
        </div>

        <div class= 'data-show'>
                <?php
                    if($_POST['action'] == 'Submit') {          ## (if 3 <----)
                        $start_location = $_POST['start_location'];
                        $end_location = $_POST['end_location'];
                        echo "<p style = 'text-align:center; background:lightblue; font-size:35px; margin-bottom:10px; border-radius:10px; text-shadow: 1px 1px 1px #000000;'>Starting At: $start_location Station</p>";
                        echo "<p style = 'text-align:center; background:lightblue; font-size:35px; margin-bottom:10px; border-radius:10px; text-shadow: 1px 1px 1px #000000;'>Destination At: $end_location Station</p>";

                        $query = "SELECT t1.trainName, t1.departureTime as dt1, t2.departureTime as dt2 FROM trains as t1 JOIN trains as t2 ON t1.trainName= t2.trainName WHERE t1.stationName = '$start_location' and t2.stationName = '$end_location' and t1.departureTime < t2.departureTime";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)==0){
                            echo "<p style = 'text-align:center; background-color:red; font-size:35px; margin-bottom:10px; border-radius:10px;'>Sorry there are no trains available in this route directly. Please try another station near you. Thank you!</p>";
                        }
                        else {
                            while($r = mysqli_fetch_array($result)) {
                ?>
                    <table class='header'>
                        <tr class="table-header">
                            <td>Train Name</td>
                            <td>Departure Time</td>
                            <td>Arrival Time</td>
                        </tr>
                        <tr>
                            <td><?php echo $r['trainName']?></td>
                            <td><?php echo $r['dt1']?></td>
                            <td><?php echo $r['dt2']?></td>
                        </tr>
                <?php
                        }       # (if 3 <--)
                        
                }
                ?>
                    </table>
                <?php
                    }
                ?>
        </div>
    </div>

<?php
}               #  (if 2 <--)
?>

<?php
}          # (if 1 <--)
?>

<script>
    jQuery('.dropdown').chosen();   // for the dropdown search effect
</script>