<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section{
            margin: 0.5rem 0px;
        }
        input{
            outline: none;
            padding: 2px;
            font-size: 16px;
        }
        select{
            padding: 5px;
            outline: none;
        }
    </style>
</head>
<body>
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
        <div class="container" style="display: flex; align-items: center; justify-content: center; flex-direction: column; margin:1rem auto; background-color:#66c966bd; width:80%; padding:1rem;">
            <div class="header">
            <h1>Get Your Vehicle Perfect space</h1>
        </div>

        <!-- parking slot -->
        <div class="parking_slot" style="display: flex; flex-direction: column; align-items: center;">
            <section style="display: flex; align-items: center; gap: 1rem;">
                <p>Select type of your vehicle</p>
                <select name="" id="wheeler">
                    <option value="weeler">Select your wheeler</option>
                    <option value="4">4 wheeler</option>
                    <option value="2">2 wheeler</option>
                </select>
            </section>
            <section style="display: flex; align-items: center; gap: 1rem;">
                <p>Select the area of parking</p>
                <select name="" id="areaParking"onchange="price();">
                    <option value="weeler">Select location</option>
                    <option value="hospital">hospital</option>
                    <option value="air">air Port</option>
                    <option value="mall">Malls</option>
                </select>
                <p id="para">Rs/hour</p>
                </section>

            <section>
                <label for="">Your Name</label>
                <input type="text">
            </section>
            <section>
                <label for="">Vehicle name</label>
                <input type="text">
            </section>
            <section>
                <label for="">from</label>
                <input type="datetime-local">
                <label for="">to</label>
                <input type="datetime-local" name="" id="">
            </section>
            <button style="cursor: pointer; padding: 8px;" type="submit">Check for available slots</button>
        </div>
    </div>
    <footer class="footer" style="position: sitcky; bottom: 0px; width: 100%; background-color: #19191abb;">
    <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
  </footer>
</div>
    <script>
        let wheeler=document.getElementById("wheeler");
        let area=document.getElementById("areaParking");
        let para=document.getElementById("para");
        function price(){

            if(wheeler.value=="4" && area.value=="mall"){
                para.innerHTML="40 Rs/hour";
            }
           else if(wheeler.value=="4" && area.value=="hospital"){
               para.innerHTML="60 Rs/hour";
            }
           else if(wheeler.value=="4" && area.value=="air"){
                para.innerHTML="80 Rs/hour";
            }
           else if(wheeler.value=="2" && area.value=="mall"){
                para.innerHTML="20 Rs/hour";
            }
           else if(wheeler.value=="2" && area.value=="air"){
                para.innerHTML="40 Rs/hour";
            }
           else if(wheeler.value=="2" && area.value=="hospital"){
                para.innerHTML="60 Rs/hour";
            }
            else{
                para.innerHTML="Rs/hour"
            }
        }


    

    </script>
</body>
</html>