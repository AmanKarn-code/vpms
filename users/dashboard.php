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



        <div class="container animated fadeIn">
            <div id="cont" style="background-color:#646461d4; width:80%; padding:1rem; color:bisque; margin: 5rem auto 1.5rem auto;">
                <div id="heading" style="margin:16px 0px;border-bottom: 1px solid darkgoldenrod; text-align: center;">
                    <h1>Get Your Vehicle Perfect space</h1>
                </div>

                <?php
                $conn = new mysqli("localhost", "root", "", "vpmsdb");
                ?>



                <form method="post" class="form">
                    <!-- parking slot -->
                    <div class="parking_slot" style="display: flex; flex-direction: column; align-items: center; width:95% ;margin:auto;">

                        <?php
                        // Assuming you have established a database connection earlier as "$conn"

                        $sql8 = "SELECT FirstName FROM tblregusers WHERE Email='" . $email . "'";
                        $result8 = $conn->query($sql8); // Changed "$result2" to "$result8"

                        if ($result8) {
                            if ($result8->num_rows > 0) {
                                $row = $result8->fetch_assoc();
                                $firstNameFromDB = $row['FirstName'];

                                echo "<label style='colur:green;'>{$firstNameFromDB}</label>";
                            } else {
                                echo "<label style='colur:green;'>First name not found in the database.</label>";
                            }
                        } else {
                            echo "Error executing the query: " . $conn->error;
                        }
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

                        <form action="" method="post">
                            <sectionv class="location" style="display: flex; gap:3px ">

                                <label>Select the area of parking</label>
                                <select name="areaParking" id="areaParking" onchange="this.form.submit();" style="padding: 10px; background:#edf2ff; border:none;">
                                    <option value="location">--Select location--</option>
                                    <?php
                                    foreach ($parkingNames as $named) {
                                        echo '<option value="' . $named . '">' . $named . '</option>';
                                    }
                                    ?>
                                </select>
                            </sectionv>
                        </form>

                        <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $selectedLocation = $_POST["areaParking"];
                            $s2 = $selectedLocation;
                            if ($selectedLocation != "location") {
                                $sql = "SELECT Fair FROM parking WHERE ParkingName='" . $selectedLocation . "'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '<p id="para">' . $row["Fair"] . ' Rs/hour </p>';
                                } else {
                                    echo '<p id="para">Unknown price</p>';
                                }
                            } else {
                                echo '<p id="para">Rs/hour</p>';
                            }
                        } else {
                            echo '<p id="para">Rs/hour</p>';
                        }
                        "</section>"
                        ?>




                        <!-- Slot Code Here -->


                        <?php

                        $conn = new mysqli("localhost", "root", "", "vpmsdb");
                        $sql = "SELECT * FROM parkingslots WHERE ParkingName='" . $selectedLocation . "'";
                        $result = $conn->query($sql);

                        $sql2 = "SELECT TotalSlots FROM parking WHERE ParkingName='" . $selectedLocation . "'";
                        $result2 = $conn->query($sql2);
                        echo "<h3 style='color:#ffee00'>" . $selectedLocation . "</h3>";
                        echo "<section style='display: flex;align-items: center;justify-content: center;flex-wrap: wrap; gap: 6px;'>";
                        if ($result2) {
                            if ($result2->num_rows > 0) {
                                $row2 = $result2->fetch_assoc();
                                $totalSlots = $row2['TotalSlots'];


                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        $row3 = $result->fetch_assoc();

                                        for ($no = 1; $no <= $totalSlots; $no++) {
                                            $slots = "Slot$no";
                                            $status = $row3[$slots];

                                            echo "<section class='slotselect " . $status . "' ' style='display: flex;align-items: baseline;justify-content: space-around;'>
                                                
                                                <input type='radio' class='" . $status . "' id='" . $slots . "' name='radio' value='" . $slots . "'>
                                                <label for='" . $slots . "' class='" . $status . "' style='color:black;'>" . $slots . "</label>
                                                
                                                
                                                </section>";
                                        }
                                        echo "<br />";
                                    }
                                }
                            } else {
                                echo "No data found for $selectedLocation.";
                            }
                        } else {
                            echo "Query error: " . $conn->error;
                        }
                        // echo "<h3>" . $selectedLocation . "</h3>";
                        // $row=$result->fetch_assoc();



                        // if($result2->num_rows>0)
                        // {
                        //     while ($row=$result2->fetch_assoc())
                        //     {
                        //         $no = 1;

                        //         echo "<h3>hi</h3>";
                        //         while ( $no <= $result2 ) {
                        //             echo "<h3>hello</h3>";
                        //             echo "<h3>" . $row["Slot$no"] . "</h3>";
                        //             $no++;
                        //         }

                        //     }
                        // }
                        // else
                        // {
                        //     echo "There is no Record";
                        // }
                        $conn->close();

                        "</section>"
                        ?>
                        <!-- Slot Code End -->
                        <section style="display:flex;">
                            <label for="">Vehicle Number</label>
                            <input type="text">
                        </section>
                        <section class="bookslot" style="display: flex; align-items: center; gap:1rem;">
                            <div class="">
                                <label for="">from</label>
                                <input type="datetime-local">
                                <label for="">to</label>
                                <input type="datetime-local" name="" id="">
                            </div>
                            <button class="slotbook" type="submit" name="book">Book</button>
                        </section>
                </form>
            </div>
        </div>
        <footer class="footer" style="position: fixed;
  left: 0;
  bottom: 0;text-align: center;background-color: #19191abb;
  width: 100%; padding: 2px;">
            <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
        </footer>
        </div>


        <?php

        $conn5 = new mysqli("localhost", "root", "", "vpmsdb");
        // $selectedLocation1 = $_POST["areaParking"];
        // echo '<script>alert('.$selectedLocation.')</script>';
        
        echo "<h3 style='color:white;'>" . $s2 . "</h3>";
        $sql51 = "UPDATE tblregusers SET Loc = '$s2' WHERE Email = '$email'";
        $result51 = $conn5->query($sql51);

        if (isset($_POST['book'])) {
            echo "<h3>" . $selectedLocation . "</h3>";
            // Assuming you have sanitized or validated the email value before using it in the query
            // $email = 'Customer@gmail.com'; // Replace with the actual email value
            $selectedSlot = $_POST['radio']; // Get the selected radio button value

            // Update the SlotNo for the user with the specified email
            $sql5 = "UPDATE tblregusers SET SlotNo = '$selectedSlot' WHERE Email = '$email'";
            $result5 = $conn5->query($sql5);

            echo "$selectedSlot";
            // echo "$selectedLocation";
            // echo "<h3>" . $selectedSlot . "</h3>";

            // echo "<script>alert(".$selectedLocation.")</>";
            // $sql6 = "UPDATE parkingslots SET $selectedSlot = 'reserved' WHERE ParkingName = '$selectedLocation'";
            // $result6 = $conn5->query($sql6);
            if ($result5) {
                echo '<script>alert("Slot successfully updated")</script>';
            } else {
                echo 'Error updating slot: ' . $conn5->error;
            }
        }
        ?>





        <?php
        $conn = new mysqli("localhost", "root", "", "vpmsdb");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $location = $_GET['location'];
        $sql = "SELECT Fair FROM parking WHERE ParkingName='" . $location . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["Fair"] . " Rs/hour";
        } else {
            echo "Unknown price";
        }

        $conn->close();
        ?>

    </body>

    </html>
<?php } ?>