<?php
    include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <script type="text/javascript" src="js/validate_register.js"> </script> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/user_register.css?v=<?php echo time();?>">
</head>

<script>
function validate()
{
	atpos = document.myForm.Member_Email.value.indexOf("@");
	dotpos = document.myForm.Member_Email.value.lastIndexOf(".");
	
	var first = document.myForm.Member_Name.value;
	
	if (document.myForm.Member_Name.value == "")
	{
		alert("Please provide your member name.");
		document.myForm.Member_Name.focus();
		return false;
	}	
	if(first[0] != first[0].toUpperCase()){
		alert("The first character of your member name should be uppercase.");
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
    if(document.myForm.Gender.value != "Male" && document.myForm.Gender.value != "Female")
	{
		alert("Please select your gender.");
		return false;
	}
	if(document.myForm.Member_Password.value == "")
	{
		alert("Please insert your password.");
		document.myForm.Member_Password.focus();
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
  <div class="header">
    <img src="pic/logo.png" alt="Logo" style="height:75px;">
    <h1>TMFlix</h1></img> </div>
  <br>
  	<div><h1 class="title">USER</h1></div>

  		<center><h2>REGISTER</h2></center>

	<form name="myForm" action="" method="POST">
      <div class="container">
        <label>Full Name</label> <br><br>
  			<input type="text" placeholder="Enter Full Name" name="Member_Name" class="text" id="Member_Name"><br><br><br>
        <label>Date of Birth</label> <br><br>
              <input type="date" placeholder="Enter Your Date of Birth" name="Member_Date_of_Birth" class="text" id="Member_Date_of_Birth" required><br><br><br>
        <label>Email</label> <br><br>
              <input type="text" placeholder="Enter Email" name="Member_Email" class="text" id="Member_Email"><br><br><br>
        <label>Password</label> <br><br>
              <input type="password" placeholder="Enter Password" name="Member_Password" class="text" id="Member_Password"><br><br><br>
        <label>Confirm Password</label> <br><br>
              <input type="password" placeholder="Enter Confirm Password" name="conpass" class="text" id="conpass"><br><br><br>
        <label>Gender</label> <br><br>
              <input type="radio" name="Gender" value="Male" id="Gender"> Male </input>
              <input type="radio" name="Gender" value="Female" id="Gender"> Female </input>
              <br><br><br>
  			<div class="submit"> <input name="submit" onclick="return(validate())" type="submit" value="Register"></button> </div>
          <br> <br> <br>
            <p>Switch to <a href="adminlogin.html" style="color:red;">ADMIN</a></p>
            <p>Already Have Account? <a href="index.html" style="color:red;"> Login!</a></p>
        </div>
  		</form>
      <div class="special"></div>
        <div class="special"></div>
  <footer class="footer">
    <p> Made by G6. All rights not reserved. </p>
  </footer>
</body>
</html>

<?php
    if(isset($_POST["submit"]))
    {
        $upload=mysqli_query($con, "INSERT INTO member VALUES ('','$_POST[Member_Name]','$_POST[Member_Date_of_Birth]','$_POST[Gender]','$_POST[Member_Email]','$_POST[Member_Password]')");

        if($upload)
        {
            $sql = "SELECT MAX(Member_ID) FROM member";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_array($result)){
                $last_id = $row["MAX(Member_ID)"];
              }
            }
            $date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime("+30 days"));
            $sql1 = "INSERT INTO account VALUES ('', $last_id, 'Free', '$date', '$end_date')";
            $result1 = mysqli_query($con, $sql1);

            echo "<script language=\"JavaScript\">\n";
            echo "alert('You are register successfully! Please continue with Login');\n";
            echo "window.location='index.html'";

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