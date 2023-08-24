<?php
session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');




if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "select ID from tbladmin where  Email='$email' && Password='$password' ");
  $ret = mysqli_fetch_array($query);

  $query2 = mysqli_query($con, "select ID,MobileNumber from tblregusers where  (Email='$email' || MobileNumber='$email') && Password='$password' ");
  $ret2 = mysqli_fetch_array($query2);
  if ($ret > 0) {
    $_SESSION['vpmsaid'] = $ret['ID'];
    header('location:admin/dashboard.php');
  } else if ($ret2 > 0) {
    $_SESSION['vpmsuid'] = $ret['ID'];
    $_SESSION['vpmsumn'] = $ret['MobileNumber'];
    echo "<script>alert(ID);</script>";
    // header('location:users/dashboard.php');
    header('location:users/sample99.php?email=' . urlencode($email));
  } else {
    echo "<script>alert('Invalid Details.');</script>";
  }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./style.php">
  <style>
    @media screen and (max-width:1150px){
      .register-box{
        flex-direction: column;
      }
    }
    @media screen and (max-width:750px){
      .register-box{
        position: absolute;
        top:12%;
        left: 10%;
      }
    }
  </style>
</head>

<body>



  <div class="main">
    <nav class="navbar" style="background-color: #cccccc86;">
      <div class="logo">
        <a href="./index.php">Car Parking</a>
      </div>
      <ul class="nav-links">
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php">Home</a></li>
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php#about">About</a></li>
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php#services">Services</a></li>
        <!-- <li><a href="register.html">Register</a></li> -->
        <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./users/signup.php">Register</a></li>
      </ul>
    </nav>
    <div class="register-box" style="background-color: #ddcc8ee0; width: 80%; margin:4.5rem auto; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-around;">
      <section style="display: flex; flex-direction: column; width:40%;">
        <p id="submitted"></p>
        <img src="./assets/login.png" alt="">
      </section>
      <section>
        <h1 style="text-align: center; padding-bottom: 20px;">Login your Account</h1>

        <form method="post" class="form" onsubmit=submitmsg()">
          <label>Email</label>
          <input class="" type="text" placeholder="Email" required="true" name="email">

          <label>Password</label>
          <input type="password" class="" name="password" placeholder="Password" required="true">

          <label class="">
            <a href="users/forgot-password.php">Forgotten Password?</a>
          </label>

          <label class="">
            <a href="users/signup.php">Create Account</a>
          </label>
          <button type="submit" name="login" class="btn btn-primary" style="">Sign in</button>

        </form>
      </section>
    </div>
    <footer class="footer" style="position: fixed;
  left: 0;
  bottom: 0;text-align: center;background-color: #19191abb;
  width: 100%; padding: 2px;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
</body>

</html>