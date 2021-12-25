<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Page</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


</script>

<body>

    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:52px; background-color:transparent;"> </img>
      <h1 style="display:inline-block; color: wheat;">TMFlix <h1 style="color: #247BA0">Admin System </h1></h1>
      <h3 style="color: #B0F2B4; float:right;"><?php echo $login_session; ?>&nbsp;</h3><h3 style="float:right; color:white;">Welcome, &nbsp;</h3></div>
    <div id="side" class="side">

          <a href="#" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="series_list.php" id="SeriesList" >Series<i class="fa fa-film" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="genre_list.php" id="GenreList" >Genre <i class="fas fa-file-video" style="font-size:27px; color:white;float:right;"></i></a>
          <a href="actor_list.php" id="ActorList" >Actor<i class="fas fa-restroom" style="font-size:24px; color:white;float:right;"></i></a>
          <a href="director_list.php" id="DirectorList" >Director<i class="	fas fa-bullhorn" style="font-size:24px; color:white;float:right;"></i></a>
          <a href="award_list.php" id="AwardList" >Award<i class="fas fa-trophy" style="font-size:24px; color:white;float:right;"></i></a>
         <a href="adminlogout.php" id="Logout" >Logout <i class="fas fa-sign-out-alt" style="font-size:24px; color:white;float:right;"></i></a>
    </div>

<div style="margin:auto; height:500px;width:100%;">
        <!-- Pie Chart !-->
        <div>
           <?php
              $query = "SELECT Gender, count(*) as number FROM member GROUP BY Gender";
              $result = mysqli_query($con, $query);
              ?>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <div id="piechart" style="width:50%; height: 480px;float:left;"></div>
              <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart()
              {
                   var data = google.visualization.arrayToDataTable([
                             ['Gender', 'Number'],
                             <?php
                             while($row = mysqli_fetch_array($result))
                             {
                                  echo "['".$row["Gender"]."', ".$row["number"]."],";
                             }
                             ?>
                        ]);
                   var options = {
                         title: 'Percentage of Male and Female Members',
                         fontSize: 20,
                         backgroundColor:'wheat',
                         pieHole: 0.4
                        };

                   var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                   chart.draw(data, options);
              }
              </script>
              </div>




 <!-- Line Chart !-->
 <div>
    <?php
    $chartQuery = "SELECT view_date, COUNT(*) as  'Views Count' FROM viewhistory GROUP BY view_date
    ";
    $chartQueryRecords = mysqli_query($con,$chartQuery);
    ?>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <div id="regions_div" style="width: 50%; height: 471.20px;float:right;"></div>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
          });
          google.charts.setOnLoadCallback(drawRegionsMap);

          function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                 ['view_date', 'Views Count'],
                <?php
                    while($row = mysqli_fetch_assoc($chartQueryRecords)){
                        echo "['".$row['view_date']."',".$row['Views Count']."],";
                    }
                ?>
            ]);

            var options = {
              title: 'Views Per Day',
              fontSize: 15,
              backgroundColor: 'wheat',
            };

            var chart = new google.visualization.LineChart(document.getElementById('regions_div'));

            chart.draw(data, options);
          }
        </script>
</div>
        </div>




        <!-- Member List !-->
<div class="member">
<table>
<tr> <h1 style="text-align:center;color:wheat;"> Members </h1> <tr>
<tr>
<th>Member ID</th>
<th>Member Name</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>

<?php
//display informations for member
$records = mysqli_query($con,"select * from member");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Member_ID']; ?></td>
    <td><?php echo $data['Member_Name']; ?></td>
    <td><?php echo $data['Member_Date_of_Birth']; ?></td>
    <td><?php echo $data['Gender']; ?></td>
    <td><?php echo $data['Member_Email']; ?></td>
    <td><?php echo $data['Member_Password']; ?></td>
    <td><a class="acc" href="admin.php?Member_Name=<?php echo $data['Member_Name']; ?>&Member_ID=<?php echo $data['Member_ID']; ?>#popup1">Check Account</a>/<a class="deletem"href="admin_delete_member.php?Member_ID=<?php echo $data['Member_ID']; ?>">Delete Member </a></td>
  </tr>

  <?php
}
?></table> 
<?php 
// display account of a member in a popup window
if(isset($_GET['Member_Name'],$_GET['Member_ID'])){
  $MemberName= $_GET['Member_Name'];
  $MemberID= $_GET['Member_ID'];
?>

<?php 

$recorda ="SELECT distinct account.Account_ID, account.Account_Type,member.Member_Name
FROM account INNER JOIN member WHERE account.Member_ID = $MemberID";
$resulta = mysqli_query($con,$recorda);
?>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2 style="float:left">Account for &nbsp;<h2 style="color:darkblue;"><?php echo $MemberName ?></h2> </h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
    <?php 
    if($data = mysqli_fetch_array($resulta))
    { ?>
         <table>
        <tr>
            <td style="color:black;">Account ID:  <?php echo $data['Account_ID'] ?></td></tr> 
            <td style="color:black;background-color:white;">Account Type:  <?php echo $data['Account_Type'] ?></td></tr> 

        
    </table> 
    <?php
}
else{ echo "Account Havent Created.";}
}
?>

		</div>
    
	</div>
  
  </div>


</div>



<div>
    <footer id="footer" class="footer">
    <p>Made by G6. All rights not reserved. </p>
    </footer>
        </div>           


</body>

</html>
