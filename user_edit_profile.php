<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }
    
    $id = $_GET['Member_ID'];
    $query = mysqli_query($con,"SELECT * FROM member WHERE Member_ID='$id'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update']))
    {
        $name = $_POST["Member_Name"];
        $dob = $_POST["Member_Date_of_Birth"];
        $email = $_POST["Member_Email"];
        $passw = $_POST["Member_Password"];
        $gender = $_POST["Gender"];

        $edit = mysqli_query($con, "UPDATE member SET Member_Name='$name', Member_Date_of_Birth='$dob', Member_Email='$email', Gender='$gender', Member_Password='$passw' WHERE Member_ID='$id'");

        if($edit)
        {
            header('Location: user_view_profile.php');
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
    <meta charset = "utf-8">
        <title>Edit Profile</title>
        <script src="js/validate_edit_profile.js"></script>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
    </head>

    <script>
function validate()
{
	atpos = document.myForm.Member_Email.value.indexOf("@");
	dotpos = document.myForm.Member_Email.value.lastIndexOf(".");
	
	var first = document.myForm.Member_Name.value;
	
	if (document.myForm.Member_Name.value == "")
	{
		alert("Please provide your full name.");
		document.myForm.Member_Name.focus();
		return false;
	}	
	if(first[0] != first[0].toUpperCase()){
		alert("The first character of your name should be uppercase.");
		document.myForm.Member_Name.focus();
		return false;
	}
	
	if (document.myForm.Member_Email.value == "")
	{
		alert("Please provide your email.");
		document.myForm.Member_Email.focus();
		return false;
	}	
	if(atpos < 1 || (dotpos - atpos < 2))
	{
		alert("Please enter correct email in correct format.");
		document.myForm.Member_Email.focus();
		return false;
    }
	if(document.myForm.conpass.value == "")
	{
		alert("Please insert your confirm password.");
		document.myForm.conpass.focus();
		return false;
	}

	if(document.myForm.conpass.value != document.myForm.Member_Password.value){
		alert("Your confirm password should be same as your password.");
		document.myForm.conpass.focus();
		return false;
	}
	else{
		alert("The profile is successfully edited! Thank you.");
		return true;
    }
}
</script>



    <body>
    <div class = "header">
        <img src="pic/logo.png" alt="Logo" style="width: 70px;">
            <h1>TMFlix</h1></img>
            </div>

            <div class="navbar">
                <a href="tv_series.php">Home Page</a>
                <a href="genre.php">Genre</a>
                <a href="userlogout.php" style="float: right">Logout</a>
                <a href="user_view_profile.php" style="float: right">Profile</a>
                <a style="float: right"><?php echo 'Welcome, '. $login_session1; ?></a>
            </div>

            <div class="special"><h2>Edit Profile</h2></div>

        <form method="POST" name="myForm" enctype="multipart/form-data">
            <table class="container" style="width:900px;">
                <tr>
                    <th width="30%"></th>
                    <th width="70%"></th>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Full Name</td>
                    <td style="border-bottom: none;"><input type="text" name="Member_Name" id="Member_Name" value="<?php echo $data['Member_Name'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Date of Birth</td>
                    <td style="border-bottom: none;" ><input type="date" name="Member_Date_of_Birth" id="Member_Date_of_Birth" value="<?php echo $data['Member_Date_of_Birth'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Email</td>
                    <td style="border-bottom: none;"><input type="text" name="Member_Email" id="Member_Email" value="<?php echo $data['Member_Email'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Gender</td>
                    <td style="border-bottom: none;">
                        <input type="radio" name="Gender" id="Gender" <?php if($data['Gender']=="Male") {echo "checked";}?> value="Male" id="Gender"> Male </input>
                        <input type="radio" name="Gender" id="Gender" <?php if($data['Gender']=="Female") {echo "checked";}?> value="Female" id="Gender"> Female </input></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Password</td>
                    <td style="border-bottom: none;"><input type="password" name="Member_Password" id="Member_Password" value="<?php echo $data['Member_Password'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Confirm Password</td>
                    <td style="border-bottom: none;"><input type="password" name="conpass" id="conpass"></td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub" onclick="return(validate())" type="submit" name="update" value="update">Edit
            </button></div></div>
        </form>
        <footer id="footer" class="footer">
            <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>
