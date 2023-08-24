<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tblregusers set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    
    <title>Reset Password</title>
   

   
    <link rel="stylesheet" href="../css/forgot-password.css">

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>

        <div class="container">
                <div class="login-logo">
                    <a href="./dashboard.php">
                       <h2 style="color: green">Reset Password</h2>
                    </a>
                </div>
                <div class="form">
                    <form action="" method="post" name="changepassword" onsubmit="return checkpass();">
                         <p style="font-size:16px; color:red" align="center"> <?php if($msg){
                            echo $msg;
                            }  ?> </p>
                        <div class="fields">
                            <label>New Password</label>
                           <input type="password" class="form-control" name="newpassword" placeholder="New Password" required="true">
                        </div>
                        <div class="fields">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="true">
                        </div>
                        <div class="fields">
                            
                            <label class="pull-right">
                                <a href="../login.php">Signin</a>
                            </label>

                        </div>
                        <button type="submit" name="submit" class="btn">Reset</button>
                       
                       
                    </form>
                </div>
        </div>


</body>
</html>
