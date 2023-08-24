<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
  $fname = $_POST['firstname'];
  $contno = $_POST['mobilenumber'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $ret = mysqli_query($con, "select Email from tblregusers where Email='$email' || MobileNumber='$contno'");
  $result = mysqli_fetch_array($ret);
  if ($result > 0) {
    echo '<script>alert("This email or Contact Number already associated with another account")</script>';
  } else {
    $query = mysqli_query($con, "insert into tblregusers(FirstName, MobileNumber, Email, Password) value('$fname','$contno', '$email', '$password' )");
    if ($query) {
    } else {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>

  <title>Signup</title>

  <script type="text/javascript">
    let para = document.getElementById("submitted");
    let submitbtn = document.getElementById("submitbtn");
    let password = document.getElementById("password")
    let repeatpassword = document.getElementById("repeatpassword")

    function checkpass() {
      if (password.value != repeatpassword.value) {
        alert('Password and Repeat Password field does not match');
        repeatpassword.focus();
        return false;
      }
      return true;
    }
  </script>
  <!-- <link rel="stylesheet" type="text/css" href="../css/signup.css"> -->
  <link rel="stylesheet" href="../style.php">
  <style>
   @media screen and (max-width: 1250px) {
  .register-box {
    flex-direction: column;
    margin: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-30%);
  left: 10%;
  }
}

@media screen and (max-width: 790px) {
  .register-box {
    /* flex-direction: column;
    margin: 0;
    position: absolute;
    top: 62%;
    transform: translateY(-50%);
    left: 11%; */
  }
}

  </style>
</head>

<body>

  <nav class="navbar" style="background-color: #cccccc86; position:sticky; z-index:5">
    <div class="logo">
        <a href="../index.php">Car Parking</a>
      </div>
      <ul class="nav-links">
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php">Home</a></li>
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php#about">About</a></li>
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php#services">Services</a></li>
        <!-- <li><a href="register.html">Register</a></li> -->
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../login.php">Login</a></li>
      </ul>
    </nav>
    <div class="container">
    <div class="" style="position: relative;
  height: 100vh;
  ">
    <div class="register-box" style="background-color: #8eb4ddbb; margin:1rem auto; width: 80%; padding: 1rem 0rem;  display: flex; align-items: center; justify-content: space-around;">
      <section style="display: flex; flex-direction: column;">
        <p id="submitted"></p>
        <img src="../assets/registration.png" alt="">
      </section>
      <section>
        <h1 style="text-align: center; padding-bottom: 20px;">Create an Account</h1>
        <form method="post" onsubmit="return checkpass();">

          <label>First Name</label>
          <input type="text" name="firstname" placeholder="Your First Name..." required="true" class="form-control">


          <label>Mobile Number</label>
          <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true" class="form-control">

          <label>Email address</label>
          <input type="email" name="email" placeholder="Email address" required="true" class="form-control">

          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" required="true" id="password" class="form-control">

          <label>Repeat Password</label>
          <input type="password" name="repeatpassword" id="repeatpassword" placeholder="Enter repeat password" required="true" class="form-control">
          <button id="submitbtn" type="submit" name="submit" class="btn btn btn-primary" style="padding: 6px ;background-color: #b1ebd8 ;border:0.5px solid grey;border-radius:5px;">REGISTER</button>
          <section style="display:flex; align-items:center; justify-content:space-around;">
            
          <label class="right">
            <a href="forgot-password.php">Forgotten Password?</a>
          </label>
          <label class="left">
            <a href="../login.php">Sign-In</a>
          </label>
        </section>
      </form>
    </section>
  </div>
  </div>
  </div>
  <footer class="footer" style="position: fixed;
  left: 0;
  bottom: 0;text-align: center;background-color: #19191abb;
  width: 100%; padding: 2px;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
  </div>

</body>

</html>