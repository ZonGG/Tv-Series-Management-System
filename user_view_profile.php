<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }

    $sql = "SELECT * FROM member,account WHERE Member_Email = '$login_session1' AND account.Member_ID = member.Member_ID";
    $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $id = $row["Member_ID"];
                $name = $row["Member_Name"];
                $dob = $row["Member_Date_of_Birth"];
                $email = $row["Member_Email"];
                $acctype = $row["Account_Type"];
                $start = $row["Access_Start"];
                $end = $row["Access_End"];
                $gender = $row["Gender"];
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>View Profile</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time();?>">
    </head>

    <div class = "header">
        <img src="pic/logo.png" alt="Logo" style="height:75px;"> 
            <h1>TMFlix</h1></img>
            </div>
            
            <div class="navbar">
                <a href="tv_series.php"> Home Page</a>
                <a href="genre.php">Genre</a>
                <a href="userlogout.php" style="float: right">Logout</a>
                <a href="user_view_profile.php" style="float: right">Profile</a>
                <a style="float: right"><?php echo 'Welcome, '. $login_session1; ?></a>
            </div>

            <div class="special"><h2>Profile</h2></div>
        
            <table class="container">
                <tr>
                    <td align="center">Member ID</td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <td align="center">Full Name</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td align="center">Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td align="center">Date of Birth</td>
                    <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td align="center">Gender</td>
                    <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <td align="center">Account Type</td>
                    <td><?php echo $acctype; ?></td>
                </tr>
                <tr>
                    <td align="center">Access Start</td>
                    <td><?php echo $start; ?></td>
                </tr>
                <tr>
                    <td align="center">Access End</td>
                    <td><?php echo $end; ?></td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub"><a href="user_edit_profile.php?Member_ID=<?php echo $id; ?>" style="text-decoration:none; color:white;">Edit</a>
            </button>
            <button class="button buttonSub"><a href="user_make_payment.php?Member_ID=<?php echo $id; ?>" style="text-decoration:none; color:white;">Pay</a>
            </button>
            </div></div>
            <div class="special"></div>
            <footer id="footer" class="footer">
                <p>Made by G6. All rights not reserved. </p>
        </footer>
</html>