<?php
require 'db.php';

    $sql = "SELECT * FROM tv_series where Series_ID = '$_GET[sid]'";
    $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $id = $row["Series_ID"];
                $image = $row["image"];
                $title = $row["Title"];
                $des = $row["Description"];
            }
        }
?>

<?php
include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title><?php echo $title; ?></title>
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
            
            <div class="special"></div>
            <div class="special"></div>
            <div class="special"></div>

            <section class="section series-detail container">
                <div class="details container-md">
                    <div class="left">
                        <div class="main">
                            <img src="<?php echo $image; ?>" alt="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="right">
                        <span style="font-size: 40px;"><?php echo $title?></span>
                        <p><?php echo $des;?></p>
                        <br></br>
                        <p>Cast by:<br></br>
                        <?php
                        $sql1 = "SELECT tv_series.Series_ID, actor.Actor_Name
                        FROM ((tv_series
                        INNER JOIN tv_series_actor ON tv_series.Series_ID = tv_series_actor.Series_ID)
                        INNER JOIN actor ON tv_series_actor.Actor_ID = actor.Actor_ID) where tv_series.Series_ID = '$_GET[sid]'";
                        $result1 = mysqli_query($con,$sql1);
                        if(mysqli_num_rows($result1)>0){
                            $string1 = "";
                            while($row = mysqli_fetch_array($result1)){
                                $actor = $row["Actor_Name"];
                                $string1 .= $actor . ", ";
                            }
                            echo substr($string1, 0, strlen($string1) - 2);
                        }
                        ?>
                        </p>
                        <br></br>
                        <p>Directed by: <br></br>
                        <?php
                        $sql2 = "SELECT tv_series.Series_ID, director.Director_Name
                        FROM ((tv_series
                        INNER JOIN tv_series_director ON tv_series.Series_ID = tv_series_director.Series_ID)
                        INNER JOIN director ON tv_series_director.Director_ID = director.Director_ID) WHERE tv_series.Series_ID = '$_GET[sid]'";
                        $result2 = mysqli_query($con,$sql2);
                        if(mysqli_num_rows($result2)>0){
                            $string2="";
                            while($row = mysqli_fetch_array($result2)){
                                $director = $row["Director_Name"];
                                $string2 .= $director . ", ";
                            }
                            echo substr($string2, 0, strlen($string2) - 2);
                        }
                        ?>
                        </p>
                        <br></br>
                        <p>Genre: <br></br>
                        <?php
                        $sql3 = "SELECT distinct genre.Genre_Type
                                FROM ((tv_series
                                INNER JOIN tv_series_genre ON tv_series.Series_ID = tv_series_genre.Series_ID)
                                INNER JOIN genre ON tv_series_genre.Genre_ID = genre.Genre_ID) WHERE tv_series.Series_ID = '$_GET[sid]'";
                        $result3 = mysqli_query($con,$sql3);
                        if(mysqli_num_rows($result3)>0){
                            $string = "";
                            while($row = mysqli_fetch_array($result3)){
                                $genre = $row["Genre_Type"];
                                $string .= $genre . ', ';
                            }
                            echo substr($string, 0, strlen($string) - 2);
                        }
                        ?>
                        </p>
                        <br></br>
                        <?php
                        $sql3 = "SELECT distinct Award.Award_Name, award.Award_Category,tv_series_award.Year
                                FROM ((tv_series 
                                INNER JOIN tv_series_award ON tv_series.Series_ID = tv_series_award.Series_ID)
                                INNER JOIN award ON tv_series_award.Award_ID = award.Award_ID) WHERE tv_series.Series_ID = '$_GET[sid]'";
                        $result3 = mysqli_query($con,$sql3);
                        if(mysqli_num_rows($result3)>0){
                            ?>
                            <p>Award:<br>
                            <?php
                            while($row = mysqli_fetch_array($result3)){
                                $award_name = $row["Award_Name"];
                                $award_category = $row["Award_Category"];
                                $year = $row["Year"];
                                echo $award_name .' (' . $year . ') ----- '. $award_category .'<br>';
                            }
                        }
                        ?>
                    </div>
            </section>

            <div class="special"></div>
            <div class="special"></div>
            <div class="special"></div>

            <div class="episode-center container">
            <?php
                $query = "SELECT Season_Year, Num_of_season FROM tv_series
                INNER JOIN season ON tv_series.Series_ID = season.Series_ID 
                WHERE tv_series.Series_ID = '$_GET[sid]' ORDER BY Season_Year";
                $result4 = mysqli_query($con, $query);
                    if(mysqli_num_rows($result4)>0){
                        while($row = mysqli_fetch_array($result4)){
                            $year = $row["Season_Year"];
                            $num = $row["Num_of_season"];
                            ?>
                            
                            <div class = "episode">
                                <div class = "episode-header">
                                    <h3>Season <?php echo $num . " ";?>(<?php echo $year;?>)</h3>
                                </div>
                                <div class="episode-footer">
                                    <?php
                                    $sql5 = "SELECT distinct episode.Episode_Num, episode.Episode_Duration, episode.Episode_ID
                                    FROM ((tv_series
                                    INNER JOIN season ON tv_series.Series_ID = season.Series_ID)
                                    INNER JOIN episode ON season.Season_ID = episode.Season_ID) WHERE tv_series.Series_ID = '$_GET[sid]' and Num_of_Season = $num
                                    ORDER BY Season_Year, Episode_Num";
                                    $result5 = mysqli_query($con,$sql5);
                                        if(mysqli_num_rows($result5)>0){
                                            while($row = mysqli_fetch_array($result5)){
                                            $num_episode = $row["Episode_Num"];
                                            $duration_episode = $row["Episode_Duration"];
                                            $eid = $row["Episode_ID"];
                                            ?>

                                            <form method="POST" action="episode.php?action=view&eid=<?php echo $eid; ?>">
                                            <button style="cursor:pointer;"type="submit" name="view">Episode <?php echo $num_episode ." - " . $duration_episode . " min <br>";?></button></form>
                                            <?php
                                        }
                                    }?>
                                </div>
                            </div>
                        
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="special"></div>
        <div class="special"><h3 style="text-align:center">Ends</h3></div>
        <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>
