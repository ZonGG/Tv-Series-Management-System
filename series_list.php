<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Series List</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/series_list.css?v=<?php echo time(); ?>">

</head>


<body>

    <h1 style="color:wheat;"> Series List <i class="fa fa-film" style="font-size:30px; color:wheat;"></i></h1>
    <ul class="series">
        <li>  <a class="back" href="admin.php"> Back </a></li>
        <li style="float: right;">  <a class="add" href=admin_add_series.php> Add New Series </a></li>
    </ul>


  <br><br>
<table>
<tr>
<th class="series">Series ID</th>
<th class="series">Series Title</th>
<th class="series">Series Description</th>
<th class="series">Action</th>

</tr>

<?php
// display all series data in a table
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$records = mysqli_query($con,"select * from tv_series");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Series_ID']; ?></td>
    <td><?php echo $data['Title']; ?></td>
    <td><?php echo $data['Description']; ?></td>
    <td><a class="edit" href="admin_edit_series.php?Series_ID=<?php echo $data['Series_ID']; ?>">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this series? Data cannot be recovered once delete.');" href="admin_delete_series.php?Series_ID=<?php echo $data['Series_ID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>


<div>
<footer id="footer" class="footer">
            <p>Made by G6. All rights not reserved. </p>
        </footer>
</div>
</body>
</html>
