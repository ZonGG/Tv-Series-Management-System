<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Actor List</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/series_list.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>


<body>

    <h1 style="color:wheat;"> Director List <i class="fas fa-bullhorn" style="font-size:30px; color:wheat;"></i></h1>
    <ul class="director">
        <li>  <a class="back" href="admin.php" style="color:white;"> Back </a></li>
        <li style="float:right;"><form method="POST" action=""> <input type="text" name="adirector" style="padding:5px;margin: 10px;float:right;">
        <button class="add" type="submit" name="director1" > Add New Director </button></form></li>
    </ul>


  <br><br>
<table>
<tr>
<th class="director">Director ID</th>
<th class="director">Director Name</th>
<th class="director">Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

//select and display all data in a table
$records = mysqli_query($con,"select * from director");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Director_ID']; ?></td>
    <td><?php echo $data['Director_Name']; ?></td>
    <td><a class="edit" href="director_list.php?Director_ID=<?php echo $data['Director_ID']; ?>&Director_Name=<?php echo $data['Director_Name']; ?>#popup1">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this director? Data cannot be recovered once delete.');" href="admin_delete_director.php?Director_ID=<?php echo $data['Director_ID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>



<?php
//select specific data and edit in popup window
if(isset($_GET['Director_ID'],$_GET['Director_Name'])){
  $Director_ID= $_GET['Director_ID'];
  $Director_Name= $_GET['Director_Name'];

$recorda ="SELECT Director_ID, Director_Name FROM director WHERE Director_ID = $Director_ID";
$resulta = mysqli_query($con,$recorda);
?>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2 style="float:left">Edit Director</h2><br><br><br><br><br>
		<a class="close" href="#">&times;</a>
		<div class="content">
    <?php 
    if($data = mysqli_fetch_array($resulta))
    { ?>
    
        <tr >
            <form name="update" method="POST" action="">
            <td style="color:black;">Director ID: <input type="text" name="Director_ID" style="padding:5px;margin: 10px;" value="<?php echo $data['Director_ID'] ?>" readonly> </td> 
            <td style="color:black;background-color:white;"> Director Name: <input type="text" name="Director_Name" style="padding:5px;margin: 10px;" value="<?php echo $data['Director_Name'] ?>"></td>
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
if(isset($_POST['Director_ID'],$_POST['Director_Name'])){
  $Director_ID= $_POST['Director_ID'];
  $Director_Name= $_POST['Director_Name'];
  if(isset($_POST["update"]))
    {


        $upload = "UPDATE director SET Director_Name='$Director_Name' WHERE Director_ID= '$Director_ID'";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Director Updated Successfully!');\n";
            echo "window.location='director_list.php'";
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
if(isset($_POST["director1"]))
    {

        $upload = "INSERT INTO director VALUES ('','$_POST[adirector]')";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Director Added Successfully!');\n";
            echo "window.location='director_list.php'";
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
