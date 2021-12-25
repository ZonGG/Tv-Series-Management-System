<?php
    include('usersession.php');
    if(!isset($login_session1))
    {
    header('Location: index.html'); // Redirecting To Home Page
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
        <title>Payment</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <script type="text/javascript" src="js/payment_val.js"> </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time();?>">
    </head>

    <body>
    <div class = "header">
        <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:#242526;">
            <h1>TMFlix</h1></img>
            </div>
            <div class="navbar">
                <a style="float: right" href="userlogout.php">Logout</a>
                <a style="float: right"><?php echo $login_session1; ?></a>
            </div>

            <div class="special">
            <h2>Customer Package Detail </h2></div>

            <form method="POST" name="myForm" enctype="multipart/form-data">

            <table class="container" style="width:900px;">
                <tr>
                    <th width="30%"></th>
                    <th width="30%"></th>
                    <th width="15%"></th>
                    <th width="25%"></th>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Subscription Packages</td>
                    <td colspan="3" style="border-bottom: none;">
                      <input type="radio"id="s1" name="Subscription" value="17">
                      <label for="s1">RM17 for one device viewing</label><br>
                      <input type="radio" id="s2" name="Subscription" value="39">
                      <label for="s2">RM39 for multiple devices viewing</label><br>

                      </td>

                </tr>

                <tr>
                    <td colspan="4" style="border-bottom: none;" align="center"><h2>Payment Detail<h2></td>
                </tr>
                <tr>
                    <td colspan="4" class="special" style="border-bottom: none;" align="center">Card accepted<br><br>
                    <div class="icon-container">
				<i class="fa fa-cc-visa" style="color:navy; font-size:30px"></i>
				<i class="fa fa-cc-amex" style="color:blue; font-size:30px"></i>
				<i class="fa fa-cc-mastercard" style="color:red; font-size:30px"></i>
				<i class="fa fa-cc-discover" style="color:orange; font-size:30px"></i>
			</div></td></tr>


                <tr>
                    <td style="border-bottom: none;" align="center">Card Number</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="CardNum" placeholder="1111222233334444"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Exp date</td>
                    <td style="border-bottom: none;"><input type="text" name="ExpDate" placeholder="MM/YY"></td>
                    <td style="border-bottom: none;" align="center">CVV</td>
                    <td style="border-bottom: none;"><input type="text" name="cvv" placeholder="XXX"></td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: none;" align="center"><div class="special"></div>
                    <input type="checkbox" checked="checked" name="con"> I agree the terms and conditions.</td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub" onclick="return(validate())" type="submit" name="update" value="update">Pay
            </button></div></div>


        </form>
        <div class="special"></div>
        <footer id="footer" class="footer">
            <p>Made by G6. All rights not reserved. </p>
        </footer>
    </body>
</html>

<?php
if(isset($_POST["update"]))
{

      $date = date('Y-m-d');

      $hahaha= "INSERT INTO payment (Payment_ID,Account_ID,Amount,Date)
      SELECT null, account.Account_ID,'$_POST[Subscription]', '$date' 
      FROM member INNER JOIN account ON member.Member_ID= account.Member_ID
      WHERE member.Member_Email = '$login_session1'";


$ds = "SELECT Access_End, Account_ID
      FROM member INNER JOIN account on member.Member_ID = account.Member_ID
      WHERE member.Member_Email = '$login_session1'";


$xz = mysqli_query($con, $ds);
   if(mysqli_num_rows($xz)>0)
   {
        while($row = mysqli_fetch_array($xz))
        {
            $access_end = $row["Access_End"];
            $account_id =  $row["Account_ID"];
        }

   }

$date_now = date("Y-m-d");
if($access_end < $date_now){
    $end_date = date('Y-m-d', strtotime("+30 days"));
}
else{
    $end_date =date('Y-m-d', strtotime($access_end. ' + 30 days'));
}


       $xc = "UPDATE account
       SET Access_End = '$end_date', Account_Type='Paid'
       WHERE Account_ID = '$account_id'";


$upload1=mysqli_query($con, $xc);


    $upload=mysqli_query($con, $hahaha);
    if($upload)
    {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('You are pay successfully!');\n";
        echo "window.location='print_receipt.php'";
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
