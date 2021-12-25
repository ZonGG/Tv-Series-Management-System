<?php
include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}
?>

<?php
require 'db.php';

    $sql = "SELECT distinct tv_series.Series_ID, tv_series.Title, season.Num_of_season, season.Season_Year, episode.Episode_Num, episode.Episode_Duration
    FROM ((tv_series
    INNER JOIN season ON tv_series.Series_ID = season.Series_ID)
    INNER JOIN episode ON season.Season_ID = episode.Season_ID) WHERE episode.Episode_ID = '$_GET[eid]'";
    $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
                $id = $row["Series_ID"];
                $title = $row["Title"];
                $num = $row["Num_of_season"];
                $year = $row["Season_Year"];
                $episode_num = $row["Episode_Num"];
            }
        }

    $sql2="SELECT Member_ID from Member where Member_Email = '$login_session1';";
    $run=mysqli_query($con,$sql2);
    $data=mysqli_fetch_assoc($run);
    $member_id=$data['Member_ID'];

    if(isset($_POST["view"])){
        $date = date('Y-m-d');
        $sql1 = "INSERT INTO viewhistory VALUES (NULL, $id, $member_id,'$date')";
        $result1 = mysqli_query($con,$sql1);
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title><?php echo 'Episode ' . $episode_num; ?></title>
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
                <h2><?php echo $title .' Season ' . $num .' ('. $year . ')' ;?></h2>
                <p><?php echo 'Episode ' . $episode_num; ?></p>
            </div>
            
            <div class="special" style="width:900px">
            <iframe width="900px" height="500px"
            src="https://www.youtube.com/embed/dQw4w9WgXcQ">
            </iframe>
            </div>
        </div>

        <div class="special"></div>
        <div class="special"></div>
        <div class="special"></div>

        <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>