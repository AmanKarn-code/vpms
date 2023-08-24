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
                        <form id="parkingForm" style="border : none">
    <sectionv class="location" style="display: flex; gap:3px ">
        <label>Select the area of parking</label>
        <select name="areaParking" id="areaParking" style="padding: 10px; background:#edf2ff; border:none;">
            <option value="location">--Select location--</option>
            <?php
            foreach ($parkingNames as $named) {
                $selected = ($named === $selectedLocation) ? 'selected' : '';
                echo '<option value="' . $named . '"' . $selected . '>' . $named . '</option>';
            }
            ?>
        </select>
    </sectionv>
</form>

<div id="resultContainer"><!-- Display result here --></div>

<script>
document.getElementById("areaParking").addEventListener("change", function() {
    var selectedValue = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "sample3.php", true); // Replace with your server-side script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("resultContainer").innerHTML = xhr.responseText;
        }
    };
    xhr.send("areaParking=" + encodeURIComponent(selectedValue));
});
</script>


                        
    </html>
<?php } ?>