<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {








    if (isset($_POST['submit'])) {
        $parkingName = $_POST['parkingName'];
        $fair = $_POST['fair'];
        $address = $_POST['address'];
        $totalSlots = $_POST['totalSlots'];

        $ret = mysqli_query($con, "select ParkingId from parking where ParkingName='$parkingName' || Address='$address'");
        $result = mysqli_fetch_array($ret);
        if ($result > 0) {
            echo '<script>alert("This email or Contact Number already associated with another account")</script>';
        } else {
            $query = mysqli_query($con, "insert into parking(ParkingName, Fair, TotalSlots, Address) value('$parkingName', '$fair','$totalSlots', '$address' )");


            $columns = "ParkingName";
            $values = "'$parkingName'";

            for ($i = 1; $i <= $totalSlots; $i++) {
                $columns .= ", Slot$i";
                $values .= ", 'Unreserved'";
            }

            $query2 = "INSERT INTO parkingslots ($columns) VALUES ($values)";

            $result = mysqli_query($con, $query2);

            if ($result) {
                echo "Slots inserted successfully!";
            } else {
                echo "Error: " . mysqli_error($con);
            }

            if ($query) {
                echo '<script>alert("You have successfully registered")</script>';
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }










?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Parking</title>
        <link rel="stylesheet" href="../style.php">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .main {
                width: 90%;
                max-width: 400px;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                animation: fadeInUp 0.8s ease;
            }

            .center {
                text-align: center;
                margin-bottom: 20px;
                animation: bounce 1s infinite;
            }

            .btns a {
                background-color: #4CAF50;
                color: white;
                padding: 8px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            h2 {
                margin: 0;
                font-size: 24px;
                color: #333333;
            }

            .form {
                text-align: left;
                animation: fadeIn 1s ease;
                width: 94%;
                margin: auto 0px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
                color: #555555;
                display: block;
                margin-bottom: 5px;
            }

            input,
            textarea {
                outline: none;
            }

            input[type="text"],
            input[type="number"],
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #dddddd;
                border-radius: 5px;
                background-color: #f9f9f9;
                transition: border-color 0.3s ease, background-color 0.3s ease;
            }

            input[type="text"]:focus,
            input[type="number"]:focus,
            textarea:focus {
                border-color: #4CAF50;
                background-color: #ffffff;
            }
            .btns{
                display: flex;
                align-items: center;
                justify-content: space-around;
            }
            button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button[type="submit"]:hover {
                background-color: #45a049;
            }

            /* Define animations */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @media screen and (max-width: 480px) {
                .main {
                    width: 90%;
                }
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="center">
                <a href="#">
                    <h2>Create Parking</h2>
                </a>
            </div>
            <form method="post" class="form">
                <div class="form-group">
                    <label for="parkingName">Parking Name</label>
                    <input type="text" id="parkingName" name="parkingName" required>
                </div>
                <div class="form-group">
                    <label for="fair">Fair (in ₹)</label>
                    <input type="number" id="fair" name="fair" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="totalSlots">Total Slots</label>
                    <input type="number" id="totalSlots" name="totalSlots" required>
                </div>
                <div class="btns">
                    <button type="submit" name="submit">Submit</button>
                    <a href="./logout.php">Log Out</a>
                </div>
            </form>
        </div>
    </body>

    </html>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fairInput = document.getElementById("fair");
            const totalSlotsInput = document.getElementById("totalSlots");

            fairInput.addEventListener("input", function() {
                if (fairInput.value < 0) {
                    fairInput.value = 0;
                } else if (fairInput.value >= 100) {
                    fairInput.value = 100;
                    alert("Fair should be < ₹101");
                }

            });

            totalSlotsInput.addEventListener("input", function() {
                if (totalSlotsInput.value < 0) {
                    totalSlotsInput.value = 0;
                } else if (totalSlotsInput.value > 50) {
                    totalSlotsInput.value = 50;
                    alert("Value should be < 51");
                }
            });
        });
    </script>
    </body>

    </html>
<?php } ?>