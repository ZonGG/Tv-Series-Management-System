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

    <h1 style="color:wheat;"> Award List <i class="fas fa-trophy" style="font-size:30px; color:wheat;"></i></h1>
    <ul class="award">
        <li>  <a class="back" href="admin.php" style="color:white;"> Back </a></li>
        <li style="float:right;"><form method="POST" action=""><input type="text" name="aaward2" style="padding:5px;margin: 10px;float:right;" placeholder="Award Category">
        <input type="text" name="aaward" style="padding:5px;margin: 10px;float:right;" placeholder="Award Name">
        <button class="add" type="submit" name="award1" > Add New Award </button></form></li>
    </ul>


  <br><br>
<table>
<tr>
<th class="award">Award ID</th>
<th class="award">Award Name</th>
<th class="award">Award Category</th>
<th class="award">Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

//select and display all data in a table
$records = mysqli_query($con,"select * from award");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Award_ID']; ?></td>
    <td><?php echo $data['Award_Name']; ?></td>
    <td><?php echo $data['Award_Category']; ?></td>
    <td><a class="edit" href="award_list.php?Award_ID=<?php echo $data['Award_ID']; ?>&Award_Name=<?php echo $data['Award_Name']; ?>&Award_Category=<?php echo $data['Award_Category']; ?>#popup1">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this award? Data cannot be recovered once delete.');" href="admin_delete_award.php?Award_ID=<?php echo $data['Award_ID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>



<?php
//select specific data and edit in popup window
if(isset($_GET['Award_ID'],$_GET['Award_Name'],$_GET['Award_Category'])){
  $Award_ID= $_GET['Award_ID'];
  $Award_Name= $_GET['Award_Name'];
  $Award_Category= $_GET['Award_Category'];

$recorda ="SELECT Award_ID, Award_Name, Award_Category FROM award WHERE Award_ID = $Award_ID";
$resulta = mysqli_query($con,$recorda);
?>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2 style="float:left">Edit Award</h2><br><br><br><br><br>
		<a class="close" href="#">&times;</a>
		<div class="content">
    <?php 
    if($data = mysqli_fetch_array($resulta))
    { ?>
    
        <tr >
            <form name="update" method="POST" action="">
            <td style="color:black;">Award ID: <input type="text" name="Award_ID" style="padding:5px;margin: 10px;" value="<?php echo $data['Award_ID'] ?>" readonly> </td> 
            <td style="color:black;background-color:white;"> Award Name: <input type="text" name="Award_Name" style="padding:5px;margin: 10px;" value="<?php echo $data['Award_Name'] ?>"></td>
            <td style="color:black;"> Award Category: <input type="text" name="Award_Category" style="padding:10px;margin: 10px;" value="<?php echo $data['Award_Category'] ?>"></td>
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
if(isset($_POST['Award_ID'],$_POST['Award_Name'],$_POST['Award_Category'])){
  $Award_ID= $_POST['Award_ID'];
  $Award_Name= $_POST['Award_Name'];
  $Award_Category= $_POST['Award_Category'];
  if(isset($_POST["update"]))
    {


        $upload = "UPDATE award SET Award_Name='$Award_Name', Award_Category='$Award_Category' WHERE Award_ID= '$Award_ID'";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Award Updated Successfully!');\n";
            echo "window.location='award_list.php'";
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
if(isset($_POST["award1"]))
    {

        $upload = "INSERT INTO award VALUES ('','$_POST[aaward]','$_POST[aaward2]')";



        if(mysqli_query($con, $upload))
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Award Added Successfully!');\n";
            echo "window.location='award_list.php'";
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
