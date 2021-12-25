<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}
// show informations for one particular series
$Series_ID = $_GET['Series_ID'];

$query = mysqli_query($con, "SELECT * FROM tv_series WHERE Series_ID=$Series_ID");

$data = mysqli_fetch_array($query);
if(isset($_POST['update']))
{
         $Title = $_POST['Title'];
        $Description = $_POST['Description'];

        $edit = mysqli_query($con, "UPDATE tv_series SET Title='$Title', Description='$Description' WHERE Series_ID='$Series_ID'");

        if($edit)
        {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Series Update Successfully!');\n";
        echo "window.location='series_list.php'";
        echo "</script>";
            mysqli_close($con);
            exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>


<?php
//add new genre into one particular series
    if(isset($_POST['genre1']))
    {
        $SGenre_ID= $_POST['sgenre'];
        $add_series_genre = "INSERT INTO tv_series_genre VALUES ($Series_ID,$SGenre_ID);";



        if(mysqli_query($con, $add_series_genre))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Genre Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>

<?php
//add new actor into one particular series
    if(isset($_POST['actor1']))
    {
        $SActor_ID= $_POST['sactor'];
        $add_series_actor = "INSERT INTO tv_series_actor VALUES ($Series_ID,$SActor_ID);";



        if(mysqli_query($con, $add_series_actor))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Actor Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>

<?php
//add new director into one particular series
    if(isset($_POST['director1']))
    {
        $SDirector_ID= $_POST['sdirector'];
        $add_series_director = "INSERT INTO tv_series_director VALUES ($Series_ID,$SDirector_ID);";



        if(mysqli_query($con, $add_series_director))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Director Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>


<?php
//add new award into one particular series
    if(isset($_POST['award1']))
    {
        $SAward_ID= $_POST['saward'];
        $year = $_POST['year'];
        $add_series_award = "INSERT INTO tv_series_award VALUES ($Series_ID,$SAward_ID,$year);";

        if(mysqli_query($con, $add_series_award))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Award Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>


<?php
//edit EPISODE into one particular series
    if(isset($_POST['episode1']))
    {
        $num_epi= $_POST['num_epi'];
        $dura = $_POST['duration'];
        $edit_series_episode = "UPDATE Episode SET Episode_Num='$num_epi', Episode_Duration='$dura'
                            WHERE Episode_ID=$_GET[Episode_ID]";

        if(mysqli_query($con, $edit_series_episode))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Episode is Updated Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>

<?php
//edit season into one particular series
    if(isset($_POST['season2']))
    {
        $num_sea2= $_POST['num_sea2'];
        $year2 = $_POST['year2'];
        $edit_series_season1 = "UPDATE season SET Num_of_season='$num_sea2', Season_Year='$year2'
                            WHERE Season_ID=$_GET[Season_ID]";

        if(mysqli_query($con, $edit_series_season1))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Season is Updated Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>

<?php
//add new season into one particular series
    if(isset($_POST['season1']))
    {
        $num_sea= $_POST['num_season'];
        $year1 = $_POST['year'];
        $add_series_season = "INSERT INTO season VALUES (NULL,$Series_ID,$year1,$num_sea);";

        if(mysqli_query($con, $add_series_season))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('A New Season is Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>

<?php
//add new episode into one particular season
    if(isset($_POST['episode2']))
    {
        $num_episode1= $_POST['num_episode1'];
        $dura1 = $_POST['dura1'];
        $add_series_episode = "INSERT INTO episode VALUES (NULL,$_GET[Season_ID],$num_episode1,$dura1);";

        if(mysqli_query($con, $add_series_episode))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('A New Episode is Added Successfully!');\n";
            echo "window.location='admin_edit_series.php?Series_ID=$Series_ID'";
            echo "</script>";

                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Series</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/admin_editseries.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


</script>

<body>

    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:52px; background-color:transparent;"> </img>
      <h1 style="display:inline-block; color: wheat;">TMFlix <h1 style="color: #247BA0">Admin System </h1></h1>
      <h3 style="color: #B0F2B4; float:right;"><?php echo $login_session; ?>&nbsp;</h3><h3 style="float:right; color:white;">Welcome, &nbsp;</h3></div>
    <div id="side" class="side">

          <a href="admin.php" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="series_list.php" id="SeriesList" >Series<i class="fa fa-film" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="genre_list.php" id="GenreList" >Genre <i class="fas fa-file-video" style="font-size:27px; color:white;float:right;"></i></a>
          <a href="actor_list.php" id="ActorList" >Actor<i class="fas fa-restroom" style="font-size:24px; color:white;float:right;"></i></a>
          <a href="director_list.php" id="DirectorList" >Director<i class="	fas fa-bullhorn" style="font-size:24px; color:white;float:right;"></i></a>
          <a href="award_list.php" id="AwardList" >Award<i class="fas fa-trophy" style="font-size:24px; color:white;float:right;"></i></a>
         <a href="adminlogout.php" id="Logout" >Logout <i class="fas fa-sign-out-alt" style="font-size:24px; color:white;float:right;"></i></a>
    </div>
    <div class="special"><h2>Edit Series</h2></div>
    <div class="container">
    <div class="left" style="display:inline-block;">
    <form name="myform" method="POST" enctype="multipart/form-data">
    <table class="edit">
        <tr>
        <td style="color:wheat;">Title</td>
        <td><div class="class1" ><input type="text" name="Title" value="<?php echo $data['Title'];?>"></div></td>
        </tr>
        <tr>
        <td style="color:wheat;">Description</td>
        <td><div class="class1"><textarea type="text" name="Description"><?php echo $data['Description'];?></textarea></div></td>
        </tr>
        <tr>
        <td style="color:wheat;">Genre</td>
        <td><a class="button" href="#popup1">Genres in This Series</a>
        <div id="popup1" class="overlay">
	    <div class="popup">
		<h2>Genres</h2>
        <div style="float:right;">
<?php
 $queryg = "SELECT * from genre";
 $res = mysqli_query($con, $queryg);   
?>
    <form name="sgenre" action="#" method="POST">
    <select name="sgenre">
        <option>Choose Genre to add </option>
    <?php
       while ($row = $res->fetch_assoc()) 
       { ?>
        <option  value="<?php echo $row["Genre_ID"]; ?>" > <?php echo $row["Genre_Type"];?> </option>
        <?php    } ?>
    </select> 
    <button type="submit" name="genre1" value="genre1" > Add Genre </button>

    </form>

    
    </div>

		<a class="close" href="#">&times;</a>
		<div class="content">
        <?php
            $sql6 = "SELECT DISTINCT genre.Genre_Type,tv_series_genre.Series_ID, tv_series_genre.Genre_ID
            FROM ((tv_series
            INNER JOIN tv_series_genre ON tv_series.Series_ID = tv_series_genre.Series_ID)
            INNER JOIN genre ON tv_series_genre.Genre_ID = genre.Genre_ID) WHERE tv_series.Series_ID=$Series_ID";
                $result6 = mysqli_query($con,$sql6);
                    if(mysqli_num_rows($result6)>0){
                        while($row = mysqli_fetch_array($result6)){
                            $genre = $row["Genre_Type"];
                            $Genre_ID = $row["Genre_ID"];
                            ?>
<table>
<tr><th><?php echo $genre ?></th> <th style="padding:10px;"><a class="delete" href="admin_delete_series_genre.php?Genre_ID=<?php echo $Genre_ID; ?>&Series_ID=<?php echo $Series_ID; ?> "> Delete</a> </th></tr> 
</table>
 <?php
}
}?> 
</div>
</div>
</div>
</div>
</div>

        </tr>
        <tr>
        <td style="color:wheat;">Actor</td>
        <td><a class="button" href="#popup2">Actors in this Series</a>
        <div id="popup2" class="overlay">

	    <div class="popup">
		<h2>Actors</h2>

        <div style="float:right;">
        <?php
        $querya = "SELECT * from actor";
        $res1 = mysqli_query($con, $querya);   
        ?>
            <form name="sactor" action="#" method="POST">
            <select name="sactor">
                <option>Choose Actor to add </option>
            <?php
            while ($row = $res1->fetch_assoc()) 
            { ?>
                <option value="<?php echo $row["Actor_ID"]; ?>" > <?php echo $row["Actor_Name"];?> </option>
                <?php    } ?>
            </select> 
            <button type="submit" name="actor1" value="actor1" > Add Actor </button>

            </form>
        </div>

		<a class="close" href="#">&times;</a>
		<div class="content">
        <?php
                                    $sql7 = "SELECT DISTINCT actor.Actor_Name,tv_series_actor.Series_ID, tv_series_actor.Actor_ID
                                    FROM ((tv_series
                                    INNER JOIN tv_series_actor ON tv_series.Series_ID = tv_series_actor.Series_ID)
                                    INNER JOIN actor ON tv_series_actor.Actor_ID = actor.Actor_ID) WHERE tv_series.Series_ID=$Series_ID";
                                        $result7 = mysqli_query($con,$sql7);
                                        if(mysqli_num_rows($result7)>0){
                                            while($row = mysqli_fetch_array($result7)){
                                            $actor = $row["Actor_Name"];
                                            $Actor_ID = $row["Actor_ID"];
                                            ?>
<table style="overflow:scroll;">
<tr><th style="padding:10px;"><?php echo $actor ?></th> <th><a class="delete" href="admin_delete_series_actor.php?Actor_ID=<?php echo $Actor_ID; ?>&Series_ID=<?php echo $Series_ID; ?> "> Delete</a> </th></tr> 
</table>
 <?php
}
}?> 
</div>
</div>
</div>
        <tr>
        <td style="color:wheat;">Director</td>
        <td><a class="button" href="#popup3">Directors in this Series</a>
        <div id="popup3" class="overlay">
	    <div class="popup">

		<h2>Directors</h2>

        <div style="float:right;">
        <?php
        $queryd = "SELECT * from director";
        $res2 = mysqli_query($con, $queryd);   
        ?>
            <form name="sdirector" action="#" method="POST">
            <select name="sdirector">
                <option>Choose Actor to add </option>
            <?php
            while ($row = $res2->fetch_assoc()) 
            { ?>
                <option value="<?php echo $row["Director_ID"]; ?>" > <?php echo $row["Director_Name"];?> </option>
                <?php    } ?>
            </select> 
            <button type="submit" name="director1" value="director1" > Add Director </button>

            </form>
        </div>

		<a class="close" href="#">&times;</a>
		<div class="content">
        <?php
                                    $sql8 = "SELECT DISTINCT director.Director_Name,tv_series_director.Series_ID, tv_series_director.Director_ID
                                    FROM ((tv_series
                                    INNER JOIN tv_series_director ON tv_series.Series_ID = tv_series_director.Series_ID)
                                    INNER JOIN director ON tv_series_director.Director_ID = director.Director_ID) WHERE tv_series.Series_ID=$Series_ID";
                                        $result8 = mysqli_query($con,$sql8);
                                        if(mysqli_num_rows($result8)>0){
                                            while($row = mysqli_fetch_array($result8)){
                                            $director = $row["Director_Name"];
                                            $Director_ID = $row["Director_ID"];
                                            ?>
<table style="overflow:scroll;">
<tr><th  style="padding:10px;"><?php echo $director ?></th> <th><a class="delete" href="admin_delete_series_director.php?Director_ID=<?php echo $Director_ID; ?>&Series_ID=<?php echo $Series_ID; ?> "> Delete</a> </th></tr> 
</table>
 <?php
}
}?> 
</div>
</div>
</div>
        </tr>
        <tr>
        <td style="color:wheat;">Award</td>
        <td><a class="button" href="#popup4">Awards in this Series</a>
        <div id="popup4" class="overlay">
	    <div class="popup">
		<h2>Awards</h2>

        <table style="width:70%">
        <tr><th style="padding:10px;">Award Name</th><th style="padding:10px;text-align:left;">Year</th><th style="padding:10px;" >Category</th><th style="padding:10px; text-align:right;" >Action</th></tr> 
        </table>
		<a class="close" href="#">&times;</a>
		<div class="content">
        <?php
                                    $sql8 = "SELECT DISTINCT award.Award_Name, tv_series_award.Year, award.Award_Category, tv_series_award.Series_ID, tv_series_award.Award_ID
                                    FROM ((tv_series
                                    INNER JOIN tv_series_award ON tv_series.Series_ID = tv_series_award.Series_ID)
                                    INNER JOIN award ON tv_series_award.Award_ID = award.Award_ID) WHERE tv_series.Series_ID=$Series_ID";
                                        $result8 = mysqli_query($con,$sql8);
                                        if(mysqli_num_rows($result8)>0){
                                            while($row = mysqli_fetch_array($result8)){
                                            $award = $row["Award_Name"];
                                            $awardyear = $row["Year"];
                                            $awardcat = $row["Award_Category"];
                                            $Award_ID = $row["Award_ID"];
                                            ?>
<table style="width:70%;">
<tr><th style="padding:10px;width=:25%;"><?php echo $award ?></th><th style="padding:10px;"><?php echo $awardyear ?></th><th style="width:45%; padding:10px;"><?php echo $awardcat ?></th><th style="padding:10px;" >
<a class="delete" href="admin_delete_series_award.php?Award_ID=<?php echo $Award_ID; ?>&Series_ID=<?php echo $Series_ID; ?>&year=<?php echo $awardyear; ?>"> Delete</a> </th></tr> 
</table>
 <?php
}

}
?> 

<div style="float:right; padding-top:40px;">
        <?php
        $query3 = "SELECT * from award";
        $res3 = mysqli_query($con, $query3);   
        ?>
            <form name="saward" action="#" method="POST">
            <select name="saward">
                <option>Choose Award to add </option>
            <?php
            while ($row = $res3->fetch_assoc()) 
            { ?>
                <option value="<?php echo $row["Award_ID"]; ?>" > <?php echo $row["Award_Name"]. " -- " . $row["Award_Category"];?> </option>
                <?php    } ?>
            </select>
            <input type="text" placeholder="Year" class="text" name="year" id="year"></input>
            <button type="submit" name="award1" value="award1" > Add Award </button>

            </form>
        </div>
</div>
</div>
</div>
        </tr>
        </table>
        <div class="box"><div class="center">
        <button class="button buttonSub" type="submit" name="update" value="update">Update
        </button>
        <button class="button buttonSub" type="button" onclick="location.href='series_list.php';" value="Back">Back
        </button></div></div>
    </form> </div>



    <div class="season" style="display:inline-block;width:100%;">
            <?php
                $query1 = "SELECT Season_ID,Season_Year, Num_of_season FROM tv_series
                INNER JOIN season ON tv_series.Series_ID = season.Series_ID 
                WHERE tv_series.Series_ID = '$Series_ID' ORDER BY Season_Year";
                $result4 = mysqli_query($con, $query1);
                    if(mysqli_num_rows($result4)>0){
                        while($row = mysqli_fetch_array($result4)){
                            $season_id = $row["Season_ID"];
                            $year = $row["Season_Year"];
                            $num = $row["Num_of_season"];
                            ?>
                        
                                <div class="tba" >
                                <input type="checkbox"/>
                                <span>Season <?php echo $num . " ";?>(<?php echo $year;?>) </span><span>Hide</span>
                                <table class="collapsible" id="collapsible1" width="100%">
                                    <?php
                                    $sql5 = "SELECT distinct episode.Episode_Num, episode.Episode_Duration, episode.Episode_ID
                                    FROM ((tv_series
                                    INNER JOIN season ON tv_series.Series_ID = season.Series_ID)
                                    INNER JOIN episode ON season.Season_ID = episode.Season_ID) WHERE tv_series.Series_ID = '$Series_ID' and Num_of_Season = $num
                                    ORDER BY Season_Year, Episode_Num";
                                    $result5 = mysqli_query($con,$sql5);
                                        if(mysqli_num_rows($result5)>0){
                                            while($row = mysqli_fetch_array($result5)){
                                            $num_episode = $row["Episode_Num"];
                                            $duration_episode = $row["Episode_Duration"];
                                            $eid = $row["Episode_ID"];
                                            ?>

                                            <table class="collapsible" id="collapsible1" width="100%">
                                            <tr>
                                            <td> Episode <?php echo $num_episode ." ------- " . $duration_episode   ?> Minutes </td>
                                            <td style="float:center;"><a style="color:white;text-decoration:none;" href="admin_edit_series.php?Series_ID=<?php echo $Series_ID;?>&Episode_ID=<?php echo $eid;?>#popup5">Edit</a></td>
                                            <td style="float:center;"><a style="color:white;text-decoration:none;" href="admin_delete_series_episode.php?Series_ID=<?php echo $Series_ID;?>&Episode_ID=<?php echo $eid;?>" style="color:white;">Delete</a></td>
                                            </tr>
                                            <?php
                                            }?>
                                        <?php
                                        }?>
                                            <tr>
                                                <td style="float:left;"><a class="delete"  href="admin_edit_series.php?Series_ID=<?php echo $Series_ID;?>&Season_ID=<?php echo $season_id;?>#popup7">Add Episode</a></td>
                                                <td style="float:right;"><a class="delete" href="admin_edit_series.php?Series_ID=<?php echo $Series_ID;?>&Season_ID=<?php echo $season_id;?>#popup8">Edit Season Detail</a></td>
                                            </tr>
                                            </table></div>

                                            <?php
                                            if(isset($_GET['Series_ID'],$_GET['Episode_ID'])){
                                            $sid=$_GET['Series_ID'];
                                            $eid1=$_GET['Episode_ID'];

                                            $sql6="SELECT * FROM Episode where Episode_ID='$eid1';";
                                            $result6=mysqli_query($con,$sql6);
                                            ?>
                                            <div id="popup5" class="overlay">
                                            <div class="popup">
                                            <h2 align="left">Episode Detail</h2>
                                            <a class="close" href="#">&times;</a>
                                            <?php
                                            if($data = mysqli_fetch_array($result6)){ ?>

                                            <form name="sepisode" action="#" method="POST">
                                            <table style="width:100%">
                                            <tr>
                                            <td align="center" style="padding:20px; color:black;">Number of Episode</td>
                                            <td><input type="text" name="num_epi" value="<?php echo $data['Episode_Num'];?>"></input></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding:20px; color:black;">Duration</td>
                                                <td><input type="text" name="duration" value="<?php echo $data['Episode_Duration'];?>"></input></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td align="center" style="padding: 20px;"><button type="submit" name="episode1" value="episode1" > Edit </button></td></form>
                                            </table></div></div>
                                                                                
                                            <?php
                                                }
                                            }
                                        ?>
                                            
                                            <div id="popup7" class="overlay">
                                            <div class="popup">
                                                <h2>Adding Episode</h2>
                                                <a class="close" href="#">&times;</a>
                                                
                                                <form name="sepisode1" action="#" method="POST">
                                                <table style="width:100%; ">
                                                    <tr>
                                                        <td style="padding:20px;">Episode</td>
                                                        <td style="padding:20px;"><input type="text" name="num_episode1"></input></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:20px;">Duration</td>
                                                        <td style="padding:20px;"><input type="text" name="dura1"></input></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="padding:20px;"><button style="float: right;" type="submit" name="episode2" value="episode2">Add Episode</button></td>
                                                </table>
                                            </form>
                                            </div></div>
                    
                                    <?php
                                    }
                                }
                            ?>
                                

                                <div class="box"><div class="center">
                                <a class="button" href="#popup6">Add Season</a>
                                </div></div>
                                <div id="popup6" class="overlay">
                                <div class="popup">
                                    <h2>Adding Season</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        <?php 
                                        $sql10="SELECT * FROM Season where Series_ID=$Series_ID";
                                        $run1=mysqli_query($con,$sql10);
                                        if(mysqli_num_rows($run1)>0){
                                            while($row=mysqli_fetch_array($run1)){
                                                $sid2=$row["Season_ID"];
                                                $num_sea3=$row["Num_of_season"];
                                                $year3=$row["Season_Year"];?>
                                                <table style="width:60%">
                                                <tr>
                                                <td align="center" style="padding:10px;">Season <?php echo $num_sea3 . ' (' .$year3.')'; ?> </td>
                                                <td align="right"><a href="admin_delete_series_season.php?Season_ID=<?php echo $sid2; ?>&Series_ID=<?php echo $Series_ID; ?>"> Delete</a></td></tr>
                                                </table>
                                                <?php
                                            }
                                        }
                                    ?>
                                    <div style="float:right;">
                                    <form name="sseason" action="#" method="POST">
                                    
                                    <table style="width:100%; ">
                                        <tr>
                                            <td style="padding:20px;">Season</td>
                                            <td style="padding:20px;"><input type="text" name="num_season"></input></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px;">Year</td>
                                            <td style="padding:20px;"><input type="text" name="year"></input></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="padding:20px;"><button style="float: right;" type="submit" name="season1" value="season1">Add Season</button></td>
                                    </table>
                                    </form></div></div>
                                    </div></div>

                                
                                            <div id="popup8" class="overlay">
                                            <div class="popup">
                                                <?php
                                                    $sql9="SELECT * FROM Season where Season_ID = $_GET[Season_ID];";
                                                    $run=mysqli_query($con,$sql9);
                                                    if($data=mysqli_fetch_array($run)){
                                                        $num_sea2=$data['Num_of_season'];
                                                        $year2=$data["Season_Year"];
                                                    }
                                                ?>
                                                <h2>Edit Season</h2>
                                                <a class="close" href="#">&times;</a>
                                                <form name="sseaon2" action="#" method="POST">
                                                <table style="width:100%; ">
                                                    <tr>
                                                        <td style="padding:20px;">Season</td>
                                                        <td style="padding:20px;"><input type="text" name="num_sea2" value="<?php echo $num_sea2; ?>"></input></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:20px;">Year</td>
                                                        <td style="padding:20px;"><input type="text" name="year2" value="<?php echo $year2 ?>"></input></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="padding:20px;"><button style="float: right;" type="submit" name="season2" value="season2">Edit Season</button></td>
                                                </table>
                                            </form>
                                            </div></div>
                            </div>
                    </div></div>

    <footer id="footer" class="footer">
    <p>Made by G6. All rights not reserved. </p>
    </footer>
    
    </body>
    
</html>



