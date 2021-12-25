<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}   ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Add Series</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <script type="text/javascript" src="js/validate_add_product.js"> </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/admin_editseries.css?v=<?php echo time(); ?>">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:52px; background-color:transparent;"> </img>
      <h1 style="display:inline-block;color: wheat;">TMFlix <h1 style="color: wheat;">Admin System </h1></h1></div>

    <div id="side" class="side">


        <a href="admin.php" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
      	<a href="series_list.php" id="SeriesList" >Series<i class="fa fa-film" style="font-size:24px; color:white;float:right;"></i></a>
      	<a href="genre_list.php" id="GenreList" >Genre <i class="fas fa-file-video" style="font-size:27px; color:white;float:right;"></i></a>
        <a href="actor_list.php" id="ActorList" >Actor<i class="fas fa-restroom" style="font-size:24px; color:white;float:right;"></i></a>
        <a href="director_list.php" id="DirectorList" >Director<i class="	fas fa-bullhorn" style="font-size:24px; color:white;float:right;"></i></a>
        <a href="award_list.php" id="AwardList" >Award<i class="fas fa-trophy" style="font-size:24px; color:white;float:right;"></i></a>
        <a href="adminlogout.php" id="Logout" >Logout <i class="fas fa-sign-out-alt" style="font-size:24px; color:white;float:right;"></i></a>
    </div>


    <div class="special"><h2>Add New Series</h2></div>
        <div class="container2" style="align-self: center;">
        <form name="myform" action="" method="post" enctype="multipart/form-data" class="myform">
        <table style="color:wheat; margin:0 auto;">
        <tr>
        <td>Title</td>
        <td><div class="class1"><input type="text" name="sname"></div></td>
        </tr>
        <tr>
        <td>Series Image</td>
        <td><div class="class1"><input type="file" name="simage" style="color:black;"></div></td>
        </tr>
        <tr>
        <td>Description</td>
        <td><div class="class1"><textarea type="text" name="sdes" rows="10" cols="100"></textarea></div></td>
        </tr>
        </table>
        <div class="box"><div class="center">
        <button class="button buttonSub" type="submit" onclick="return(validate())" name="series1" value="upload">Upload
        </button>
        <button class="button buttonSub" type="button" onclick="location.href='series_list.php';" value="Back">Back
        </button></div>
        </form></div></div>
<?php
//add series query
    if(isset($_POST["series1"]))
    {
        $v1=rand(1111,9999);
        $v2=rand(1111,9999);

        $v3=$v1.$v2;

        $v3=md5($v3);

        $fnm=$_FILES["simage"]["name"];
        $dst="./img/".$v3.$fnm;
        $dst1="img/".$v3.$fnm;
        move_uploaded_file($_FILES["simage"]["tmp_name"], $dst);

        $upload = "INSERT INTO tv_series VALUES ('','$_POST[sname]','$_POST[sdes]','$dst1')";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Product Upload Successfully!');\n";
            echo "alert('Please add other elements (Actor, Director, Genre, Award) at the edit page!');\n";
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
        <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>
