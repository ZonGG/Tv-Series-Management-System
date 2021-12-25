<?php
require 'db.php';

include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Actor</title>
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
            <h2>TV Series Based On Actor</h2></div>
            
            <div class="actor-center container">
            <?php
                $query = "SELECT * FROM Actor
                INNER JOIN tv_series_actor ON actor.Actor_ID = tv_series_actor.Actor_ID ORDER BY actor.Actor_Name ASC;";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)){
                        $actor = $row["Actor_Name"];
                        ?>
                        <div class="actor">
                            <div class = "actor-header">
                                <h3><?php echo $actor; ?></h3>
                            </div>
                            <div class="actor-footer">
                            
                                <?php
                                $query1="SELECT distinct actor.Actor_Name, tv_series.Title, tv_series.Series_ID
                                        FROM ((tv_series
                                        INNER JOIN tv_series_actor ON tv_series.Series_ID = tv_series_actor.Series_ID)
                                        INNER JOIN actor ON tv_series_actor.Actor_ID = actor.Actor_ID)
                                        WHERE actor.Actor_Name = '$actor'";
                                $result1=mysqli_query($con,$query1);
                                    if(mysqli_num_rows($result1)>0){
                                        while($row=mysqli_fetch_array($result1)){
                                            $id = $row["Series_ID"];
                                            $series = $row["Title"];
                                            ?>
                                            
                                            <a href="detail.php?sid=<?php echo $id;?>"><?php echo $series; ?></a>
                                        <?php
                                        }
                                    }
                                    ?>

                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
        </div>
        <div class="special"></div>
        <div class="special"><h3 style="text-align:center">Ends</h3></div>
        <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>
