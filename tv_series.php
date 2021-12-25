<?php
require 'db.php';
?>

<?php
include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}

$date_now = date("Y-m-d");
if($end_date < $date_now){ //If the access date is end.
    header('Location: user_make_payment.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>TV Series</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="css/series.css?v=<?php echo time();?>">
    </head>

    <body>
        <div class="main">
            <div class="navbar">
                <a href="tv_series.php"><img src="pic/logo.png" alt="Logo" style="height:20px;"> TMFlix</img></a>
                <a href="genre.php">Genre</a>
                <a href="actor.php">Actor</a>
                <a href="userlogout.php" style="float: right">Logout</a>
                <a href="user_view_profile.php" style="float: right">Profile</a>
                <a style="float: right"><?php echo 'Welcome, '. $login_session1; ?></a>
            </div>

            <div class="special">
                <h2>TV Series</h2>
            </div>

            <div class="series-center container">
            <?php
                $query = "SELECT * FROM tv_series ORDER BY Series_id ASC";
                $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                            $id = $row["Series_ID"];
                            $name = $row["Title"];
                            $image = $row["image"];
                            ?>
                            
                            <div class = "series">
                                <div class = "series-header">
                                    <img src="<?php echo $image; ?>"></img>
                                </div>
                                <div class="series-footer">
                                    <a href="detail.php?sid=<?php echo $id ?>"><?php echo $name;?></a>
                                </div>
                            </div>
                        
                        <?php
                        }
                    }
                ?>
            </div>
            
            <div class="special"></div>
            <div class="special"></div>
            <div class="special"><h2>Top 5 TV Series</div>

            <div class="series-center container">
            <?php
                $query1 = "SELECT tv_series.Series_ID, tv_series.Title, tv_series.image, COUNT(viewhistory.Series_ID)
                        FROM viewhistory
                        inner JOIN tv_series ON tv_series.Series_ID = viewhistory.Series_ID
                        where view_date > current_date - interval 30 day
                        GROUP BY tv_series.Series_ID 
                        ORDER BY COUNT(viewhistory.Series_ID) DESC LIMIT 5";

                $result1 = mysqli_query($con,$query1);
                    if(mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_array($result1)){
                            $id = $row["Series_ID"];
                            $name = $row["Title"];
                            $image = $row["image"];
                            $count = $row["COUNT(viewhistory.Series_ID)"];
                            ?>
                            
                            <div class = "series">
                                <div class = "series-header">
                                    <img src="<?php echo $image; ?>"></img>
                                </div>
                                <div class="series-footer">
                                    <a href="detail.php?sid=<?php echo $id ?>"><?php echo $name;?></a>
                                    <p style="color:white;"><?php echo $count;?> views </p>
                                </div>
                            </div>
                        
                        <?php
                        }
                    }
                ?>
            </div>

        </div>
        <div class="special"></div>
        <div class="special"></div>
        <div class="special"></div>
        <div class="special"><h3 style="text-align:center">Ends</h3></div>
        <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>

