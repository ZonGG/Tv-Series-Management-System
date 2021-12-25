<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Genre List</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/series_list.css?v=<?php echo time(); ?>">

</head>


<body>

    <h1 style="color:wheat;"> Genre List <i class="fas fa-file-video" style="font-size:30px; color:wheat;"></i></h1>
    <ul class="genre">
        <li>  <a class="back" href="admin.php"> Back </a></li>
        <li style="float:right;"><form method="POST" action=""> <input type="text" name="agenre" style="padding:5px;margin: 10px;float:right;">
        <button class="add" type="submit" name="genre1" > Add New Genre </button></form></li>
    </ul>


  <br><br>
<table>
<tr>
<th class="genre">Genre ID</th>
<th class="genre">Genre Type</th>
<th class="genre">Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}
//display all data in a table
$records = mysqli_query($con,"select * from genre");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Genre_ID']; ?></td>
    <td><?php echo $data['Genre_Type']; ?></td>
    <td><a class="edit" href="genre_list.php?Genre_ID=<?php echo $data['Genre_ID']; ?>&Genre_Type=<?php echo $data['Genre_Type']; ?>#popup1">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this genre? Data cannot be recovered once delete.');" href="admin_delete_genre.php?Genre_ID=<?php echo $data['Genre_ID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>


<?php
//select specific data and edit in popup window
if(isset($_GET['Genre_ID'],$_GET['Genre_Type'])){
  $Genre_ID= $_GET['Genre_ID'];
  $Genre_Type= $_GET['Genre_Type'];

$recorda ="SELECT Genre_ID, Genre_Type FROM genre WHERE Genre_ID = $Genre_ID";
$resulta = mysqli_query($con,$recorda);
?>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2 style="float:left">Edit Genre</h2><br><br><br><br><br>
		<a class="close" href="#">&times;</a>
		<div class="content">
    <?php 
    if($data = mysqli_fetch_array($resulta))
    { ?>
    
        <tr >
            <form name="update" method="POST" action="">
            <td style="color:black;">Genre ID: <input type="text" name="Genre_ID" style="padding:5px;margin: 10px;" value="<?php echo $data['Genre_ID'] ?>" readonly> </td> 
            <td style="color:black;background-color:white;"> Genre Type: <input type="text" name="Genre_Type" style="padding:5px;margin: 10px;" value="<?php echo $data['Genre_Type'] ?>"></td>
        </tr>       
      <div class="center">
    <button class="button buttonSub" type="submit" name="update" value="update">Update
        </button> </form></div>

    <?php
}
}
?>
		</div>
	</div>
  </div>



<?php
//edit query
if(isset($_POST['Genre_ID'],$_POST['Genre_Type'])){
  $Genre_ID= $_POST['Genre_ID'];
  $Genre_Type= $_POST['Genre_Type'];
  if(isset($_POST["update"]))
    {


        $upload = "UPDATE genre SET Genre_Type='$Genre_Type' WHERE Genre_ID= '$Genre_ID'";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Genre Updated Successfully!');\n";
            echo "window.location='genre_list.php'";
            echo "</script>";
                mysqli_close($con);
                exit;
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
  }
?>







<?php
//adding query 
if(isset($_POST["genre1"]))
    {

        $upload = "INSERT INTO genre VALUES ('','$_POST[agenre]')";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Genre Added Successfully!');\n";
            echo "window.location='genre_list.php'";
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





<div>
<footer id="footer" class="footer">
            <p>Made by G6. All rights not reserved. </p>
        </footer>
</div>
</body>
</html>
