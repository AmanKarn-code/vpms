<!DOCTYPE html>
<html>
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

<body><nav class="navbar navbar-expand-lg navbar-light bg-light sticky" style="background-color:#ff990078 !important">
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
    // Include your database connection or initialize the connection here
    $email = $_GET['email'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedLocation = $_POST["areaParking"];
        $s2 = $selectedLocation;
        
        if ($selectedLocation != "location") {
            $sql = "SELECT Fair FROM parking WHERE ParkingName='" . $selectedLocation . "'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // echo '<p id="para">' . $row["Fair"] . ' Rs/hour </p>';
                // echo '<h3>'.$email.'</h3>';
                $sql51 = "UPDATE tblregusers SET Loc = '$s2' WHERE Email = '$email'";
                $result51 = $conn->query($sql51);
            } else {
                echo '<p id="para" style="text-align : center">Unknown price</p>';
            }
        } else {
            echo '<p id="para" style="text-align: center">Rs/hour</p>';
        }
    } else {
        echo '<p id="para" style="text-align: center">Rs/hour</p>';
    }
    ?>

<form method="post" class="form" style="border: none;
    margin: 4rem auto;
    background: #bdefffb3;">

    <?php

$conn = new mysqli("localhost", "root", "", "vpmsdb");
$sql = "SELECT * FROM parkingslots WHERE ParkingName='" . $selectedLocation . "'";
$result = $conn->query($sql);

$sql2 = "SELECT TotalSlots FROM parking WHERE ParkingName='" . $selectedLocation . "'";
$result2 = $conn->query($sql2);
echo "<h3 style='color: #ffee00;
text-align: center;
font-size: 2.5rem;'>" . $selectedLocation . "</h3>";
echo "<section style='display: flex;align-items: center;justify-content: center;flex-wrap: wrap; gap: 6px;'>";


// echo "<input type='text' readonly name='$selectedLocation' value='$selectedLocation'/>";

echo '<p id="para" style="width: 100%;
text-align: center;
/* margin: unset; */
font-family: cursive;
font-weight: bolder;">' . $row["Fair"] . ' Rs/hour  </p> <br />';

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
<div class="" style="width: 100%; text-align: center;">

    <button class="slotbook btn btn-primary " type="submit" name="book" style="width: 40%;">Book</button>
</div>
     <input type="hidden" name="selectedLocation2" value="<?php echo $selectedLocation; ?>">
                        </form>


                        <?php
                        // ob_start(); // Start output buffering


        $conn5 = new mysqli("localhost", "root", "", "vpmsdb");
        // $selectedLocation1 = $_POST["areaParking"];
        // echo '<script>alert('.$selectedLocation.')</script>';
        
        // echo "<h3 style='color:white;'>" . $s2 . "</h3>";
        // $sql51 = "UPDATE tblregusers SET Loc = '$s2' WHERE Email = '$email'";
        // $result51 = $conn5->query($sql51);
        // $l=$_GET["$selectedLocation"];
        if (isset($_POST['book'])) { 
            $selectedLocation2 = $_POST['selectedLocation2'];
            echo "<h3 style='color:black;'>" . $selectedLocation2 . "</h3>";

            // echo "<h3>" . $l . "</h3>";
            // Assuming you have sanitized or validated the email value before using it in the query
            // $email = 'Customer@gmail.com'; // Replace with the actual email value
            $selectedSlot = $_POST['radio']; // Get the selected radio button value

            // Update the SlotNo for the user with the specified email
            $sql5 = "UPDATE tblregusers SET SlotNo = '$selectedSlot' WHERE Email = '$email'";
            $result5 = $conn5->query($sql5);

            echo "$selectedSlot";
            // echo "$selectedLocation";

            // echo "<script>alert(".$selectedLocation.")</>";
            $sql6 = "UPDATE parkingslots SET $selectedSlot = 'Reserved' WHERE ParkingName = '$selectedLocation2'";
            $result6 = $conn5->query($sql6);
            if ($result5) {
                echo '<script>alert("Slot successfully updated"); window.location.href = "../login.php";</script>';
                // ob_end_flush(); // Flush the output buffer and send the content to the browser

                // header("location: users/login.php");
                exit();
            } 
            // else {
            //     echo 'Error updating slot: ' . $conn5->error;
            // }
            
        }
        // ob_end_flush(); // In case the condition above is not met, still flush the buffer
        ?>


<footer class="footer" style="position: fixed;
  left: 0;
  bottom: 0;text-align: center;background-color: #19191abb;
  width: 100%; padding: 2px;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
</body>
</html>
