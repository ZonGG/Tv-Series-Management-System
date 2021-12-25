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

    <h1 style="color:wheat;"> Actor List <i class="fas fa-restroom" style="font-size:30px; color:wheat;"></i></h1>
    <ul class="actor">
        <li>  <a class="back" href="admin.php"> Back </a></li>
        <li style="float:right;"><form method="POST" action=""> <input type="text" name="aactor" style="padding:5px;margin: 10px;float:right;">
        <button class="add" type="submit" name="actor1" > Add New Actor </button></form></li>
    </ul>


  <br><br>
<table>
<tr>
<th class="actor">Actor ID</th>
<th class="actor">Actor Name</th>
<th class="actor">Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

//select and display all data in a table
$records = mysqli_query($con,"select * from actor");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Actor_ID']; ?></td>
    <td><?php echo $data['Actor_Name']; ?></td>
    <td><a class="edit" href="actor_list.php?Actor_ID=<?php echo $data['Actor_ID']; ?>&Actor_Name=<?php echo $data['Actor_Name']; ?>#popup1">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this actor? Data cannot be recovered once delete.');" href="admin_delete_actor.php?Actor_ID=<?php echo $data['Actor_ID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>



<?php
//select specific data and edit in popup window
if(isset($_GET['Actor_ID'],$_GET['Actor_Name'])){
  $Actor_ID= $_GET['Actor_ID'];
  $Actor_Name= $_GET['Actor_Name'];

$recorda ="SELECT Actor_ID, Actor_Name FROM actor WHERE Actor_ID = $Actor_ID";
$resulta = mysqli_query($con,$recorda);
?>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2 style="float:left">Edit Actor</h2><br><br><br><br><br>
		<a class="close" href="#">&times;</a>
		<div class="content">
    <?php 
    if($data = mysqli_fetch_array($resulta))
    { ?>
    
        <tr >
            <form name="update" method="POST" action="">
            <td style="color:black;">Actor ID: <input type="text" name="Actor_ID" style="padding:5px;margin: 10px;" value="<?php echo $data['Actor_ID'] ?>" readonly> </td> 
            <td style="color:black;background-color:white;"> Actor Name: <input type="text" name="Actor_Name" style="padding:5px;margin: 10px;" value="<?php echo $data['Actor_Name'] ?>"></td>
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
if(isset($_POST['Actor_ID'],$_POST['Actor_Name'])){
  $Actor_ID= $_POST['Actor_ID'];
  $Actor_Name= $_POST['Actor_Name'];
  if(isset($_POST["update"]))
    {


        $upload = "UPDATE actor SET Actor_Name='$Actor_Name' WHERE Actor_ID= '$Actor_ID'";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Actor Updated Successfully!');\n";
            echo "window.location='actor_list.php'";
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
if(isset($_POST["actor1"]))
    {

        $upload = "INSERT INTO actor VALUES ('','$_POST[aactor]')";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Actor Added Successfully!');\n";
            echo "window.location='actor_list.php'";
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
