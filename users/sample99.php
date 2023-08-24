
<?php
session_start();


if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
    // $firstName = urldecode($_GET['firstName']);
    // echo "<h1>$email</h1> ";
    // echo "<scr;>alert(".$email.")</script>";

}

error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid'] == 1)) {
    header('location:logout.php');
} else { ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="../style.php">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <title>Document</title>
        <style>
            section {
                margin: 0.5rem 0px;
            }

            input {
                outline: none;
                padding: 2px;
                font-size: 16px;
            }

            select {
                padding: 5px;
                outline: none;
            }

            @media screen and (max-width: 770px) {
                #heading h1 {
                    font-size: 1.5rem !important;
                }

                #cont {
                    width: 100% !important;
                }
            }

            @media screen and (max-width: 500px) {
                .location {
                    display: flex;
                    /* gap: -5px; */
                    align-items: center;
                    justify-content: center;
                    margin: auto;
                    width: 59%;
                    flex-direction: column;
                }
                .form{
                    width: 90%;
                }
                .location label{
                    font-size: 13px;
                    width: 100vw;
                    text-align: center;
                }
                .slotselect label{
                    padding:10px 15px;
                }
               

            }
            @media screen and (max-width:400px) {
                .bookslot{
                    flex-direction: column;
                }
                #heading h1 {
                    font-size: 1.2rem !important;
                }

            }
        </style>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky" style="background-color:#ff990078 !important">
            <a class="navbar-brand" href="#">Car Parking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: absolute; right: 1rem;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="../index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./signup.php">Register</a>
                    </li>

                </ul>

            </div>
        </nav>


<?php
                $conn = new mysqli("localhost", "root", "", "vpmsdb");
                ?>





<?php
                        // $conn = new mysqli("localhost", "root", "", "vpmsdb");
                        "<section style='display: flex; align-items: center; gap: 1rem;'>";
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        ?>

                        <?php
                        $sql = "SELECT ParkingName FROM parking";
                        $result = $conn->query($sql);

                        $parkingNames = array();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $parkingNames[] = $row["ParkingName"];
                            }
                        }
                        ?>
<form action="sample100.php?email=<?php echo $email; ?>" method="post" style="border: none;
    margin: 9rem auto;
    background: #bdefffb3;">
                            <sectionv class="location" style="display: flex; gap:3px ">

                                <label>Select the area of parking</label>
                                <select name="areaParking" id="areaParking" onchange="this.form.submit();" style="padding: 10px; background:#edf2ff; border:none;">
                                    <option value="location">--Select location--</option>
                                    <?php

                                    foreach ($parkingNames as $named) {
                                        $selected = ($named === $selectedLocation) ? 'selected' : '';
                                        echo '<option value="' . $named . '">' . $named . '</option>';
                                    }
                                    ?>
                                </select>
                            </sectionv>
                        </form>
                        <footer class="footer" style="position: fixed;
  left: 0;
  bottom: 0;text-align: center;background-color: #19191abb;
  width: 100%; padding: 2px;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
                        <body>
<!-- 
    <script>

        function submitbtn(){

        }

    </script> -->
    </html>
                        <?php } ?>