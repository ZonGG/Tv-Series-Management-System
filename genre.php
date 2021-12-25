<?php
require 'db.php';
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
        <title>Genre</title>
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
            <h1 style="color:wheat;text-align:center;"> TV Series Based On Genre </h1>
            
                <?php
                    $query = "SELECT DISTINCT Genre_Type FROM genre INNER JOIN tv_series_genre ON genre.Genre_ID = tv_series_genre.Genre_ID ORDER BY genre.Genre_ID;";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_array($result)){
                            $genre = $row["Genre_Type"];
                            ?>
                            <div class="special">
                                <h2><?php echo $genre ?></h2>
                            </div>

                            <div class="series-center container">
                            <?php
                                $query1 = "SELECT tv_series.Title, tv_series.image, tv_series.Series_ID
                                FROM ((tv_series
                                INNER JOIN tv_series_genre ON tv_series.Series_ID = tv_series_genre.Series_ID)
                                INNER JOIN genre ON tv_series_genre.Genre_ID = genre.Genre_ID) WHERE Genre_type = '$genre'";
                                $result1 = mysqli_query($con,$query1);
                                    if(mysqli_num_rows($result1)>0){
                                        while($row = mysqli_fetch_array($result1)){
                                            $id = $row["Series_ID"];
                                            $name = $row["Title"];
                                            $image = $row["image"];
                                            ?>
                                            <form method = "POST" action="#">
                                            <div class = "series">
                                                <div class = "series-header">
                                                    <img src="<?php echo $image; ?>"></img>
                                                </div>
                                                <div class="series-footer">
                                                    <a href="detail.php?sid=<?php echo $id ?>"><?php echo $name;?></a>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        }
                                    }
                                ?>
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

