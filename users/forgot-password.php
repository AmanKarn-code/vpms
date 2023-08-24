<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "select ID from tblregusers where  Email='$email' and MobileNumber='$contactno' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {

        echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>

    <title>VPMS-Forgot Page</title>


    <link rel="stylesheet" href="../style.php">


</head>

<body class="bg-dark">


    <div class="container">
        <nav class="navbar" style="background-color: #cccccc86; position:sticky">
            <div class="logo">
                <a href="./dashboard.php">Car Parking</a>
            </div>
            <ul class="nav-links">
                <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./dashboard.php">Home</a></li>
                <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./dashboard.php#about">About</a></li>
                <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./dashboard.php#services">Services</a></li>
                <!-- <li><a href="register.html">Register</a></li> -->
                <li><a style="color: #333; " onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./signup.php">Register</a></li>
            </ul>
        </nav>
        <div class="logo" style="background-color: #8eb4ddbb;margin:1rem auto; width: 80%; padding: 1rem 0rem; display: flex; align-items: center; justify-content: space-around;">
            <section style="display: flex; flex-direction: column; width:41%">
                <p id="submitted"></p>
                <img src="../assets/forgotpass.png" alt="">
            </section>
            <section>

               
                    <h2 style="color: green">Forgot Password</h2>
          


                <form method="post">

                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" autofocus required="true">

                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="contactno" placeholder="Mobile Number" required="true">

                    <label class="pull-right">
                        <a href="./allotingSystem.php">Signin</a>
                    </label>


                    <button type="reset" name="submit" class="btn">Reset</button>


                </form>
            </section>
        </div>
        <footer class="footer" style="position: sitcky; bottom: 0px; width: 100%; background-color: #19191abb;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
    </div>


</body>

</html>