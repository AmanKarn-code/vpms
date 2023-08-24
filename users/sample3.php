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


    <body>







        
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
                        <section style="border:1px solid white;    width: 60%;
    /* border: 1px solid white; */
    margin: auto;">



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
                                    $sql51 = "UPDATE tblregusers SET Loc = '$s2' WHERE Email = '$email'";
                                    $result51 = $conn->query($sql51);

                                } else {
                                    echo '<p id="para" style="text-align : center">Unknown price</p>';
                                }
                            } else {
                                echo '<p id="para" style="text-align>Rs/hour</p>';
                            }
                        } else {
                            echo '<p id="para" style="text-align>Rs/hour</p>';
                        }
                        "</section>"
                        ?>










                <form method="post" class="form" style="border : none">
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









                        <!-- Slot Code Here -->


                        <?php

                        $conn = new mysqli("localhost", "root", "", "vpmsdb");
                        $sql = "SELECT * FROM parkingslots WHERE ParkingName='" . $selectedLocation . "'";
                        $result = $conn->query($sql);

                        $sql2 = "SELECT TotalSlots FROM parking WHERE ParkingName='" . $selectedLocation . "'";
                        $result2 = $conn->query($sql2);
                        echo "<h3 style='color:#ffee00'>" . $selectedLocation . "</h3>";
                        echo "<section style='display: flex;align-items: center;justify-content: center;flex-wrap: wrap; gap: 6px;'>";
                        
                        
                        echo "<input type='text' readonly name='$selectedLocation' value='$selectedLocation'/>";

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
                            <button class="slotbook" type="submit" name="book" onclick="submitbtn()">Book</button>
                        </section>
                </form>
            </div>
        </div>
        </section>
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
        
        // echo "<h3 style='color:white;'>" . $s2 . "</h3>";
        // $sql51 = "UPDATE tblregusers SET Loc = '$s2' WHERE Email = '$email'";
        // $result51 = $conn5->query($sql51);
        echo "<h3 style='color:white;'>" . $selectedLocation . "</h3>";
        $l=$_GET["$selectedLocation"];
        if (isset($_POST['book'])) { 
            echo "<h3>hiii" . $l . "</h3>";
            // Assuming you have sanitized or validated the email value before using it in the query
            // $email = 'Customer@gmail.com'; // Replace with the actual email value
            $selectedSlot = $_POST['radio']; // Get the selected radio button value

            // Update the SlotNo for the user with the specified email
            $sql5 = "UPDATE tblregusers SET SlotNo = '$selectedSlot' WHERE Email = '$email'";
            $result5 = $conn5->query($sql5);

            echo "$selectedSlot";
            // echo "$selectedLocation";

            // echo "<script>alert(".$selectedLocation.")</>";
            $sql6 = "UPDATE parkingslots SET $selectedSlot = 'reserved' WHERE ParkingName = '$l'";
            $result6 = $conn5->query($sql6);
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
<!-- 
    <script>

        function submitbtn(){

        }

    </script> -->
    </html>
<?php } ?>