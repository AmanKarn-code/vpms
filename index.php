<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid']==1)) {
  header('location:logout.php');
  } else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Parking Reservation</title>
    <link rel="stylesheet" href="./style.php" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Link to your custom stylesheet -->
    <style>
      @media screen and (max-width:1000px){
        .aboutnone{
          display: none;
        }
        .service-card{
          padding: 10px;
          width: 60%;
        }
        .navabs{
          position: sticky !important;
        }
      }
      @media screen and (max-width:850px){
      .servicenone{
        display: none;
      }
      .service-card h3{
        font-size: 16px;
      }
      }
      @media screen and (max-width:700px){
        .services{
          display:flex;
          flex-direction: column;
    align-items: center;
    justify-content: center;
        }
        .service-card a img{
          padding-bottom: 20px !important;
        }
      }
      @media screen and (max-width:550px){
        .aboutnonel{
          display: none;
        }
        .aboutres{
          flex-direction: column;
        }
        .aboutdesc{
          width: 80% !important;
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

            <div class="collapse navabs navbar-collapse" id="navbarSupportedContent" style="position: absolute; right: 1rem;">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./users/signup.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onMouseOver="this.style.color='#6e3e3e'" onMouseOut="this.style.color='#333'" href="./login.php">Login</a>
                    </li>

                </ul>

            </div>
        </nav>

   

    <header class="hero">
        <h1>Welcome to Car Parking Reservation</h1>
        <p>Reserve your parking spot hassle-free.</p>
        <a href="#services" class="cta-button explore-button">Explore Services</a>
    </header>

    <section id="about" class="about-section">
      <section class="aboutres"
        style="
          background-color: #f0f8ffc2;
          padding: 4rem 0rem;
          display: flex;
          gap: 2rem;
          align-items: center;
          justify-content: center;
          width: 80%;
          margin: auto;
          border: 1px solid grey;
          border-radius: 92px;
        "
      >
        <img src="./assets/about.png" alt="about" style="width: 40%" />

        <section style="width: 40%" class="aboutdesc">
          <h2>About Us</h2>
          <p style="font-size: 16px; text-align: left">
            We provide convenient and secure car parking reservation services.
          </p>
          <p style="font-size: 16px; text-align: left">
            Revolutionizing urban mobility, a car parking reservation website
            redefines convenience. <span class="aboutnonel">

              in advance, gaining peace of mind and avoiding last-minute hassles.
              Real-time availability updates aid in informed decisions, while
              instant confirmations and online payments ensure a seamless
              experience.
            </span> Users can effortlessly secure parking spots
            <span class="aboutnone">
              By reducing traffic congestion and enhancing parking
              management, this platform doesn't just simplify travel planning—it
              transforms it. Navigating busy city centers or event venues becomes
              stress-free, promoting efficient commuting. With just a few clicks,
              this innovative solution optimizes parking, making it an
              indispensable tool for modern-day travelers seeking both ease and
              efficiency.
            </span>
          </p>
          <!-- Additional information about your company here -->
        </section>
      </section>
    </section>

    <section id="services" class="services-section">
      <section
        style="
          width: 80%;
          margin: auto;
          background-color: #ffffffa6;
          padding: 10px 20px;
          border: 1px solid transparent;
          border-radius: 10px;
          padding: 2rem;
        "
      >
      <div class="services">

        <h2>Our Services</h2>
        <div class="service-card">
            <a href="./users/sample99.php">

                <img src="./assets/easyReser.png" alt="Easy Reservation" style="padding-bottom: 40px;">
                <h3>Easy Reservation</h3>
                <p class="servicenone">Effortlessly book your parking spot online and save your time.</p>
            </a>
        </div>
        <div class="service-card">
            <a href="#">
                <img src="./assets/safeandsecure.png" alt="Safe and Secure">
                
                <h3>Safe and Secure</h3>
                <p class="servicenone">Your vehicle's safety is our top priority with 24/7 monitoring.</p>
            </a>
        </div>
        <div class="service-card">
            <a href="#">

                <img src="./assets/247.png" alt="24/7 Customer Support">
                <h3>24/7 Customer Support</h3>
                <p class="servicenone">We're here to assist you around the clock for any inquiries.</p>
            </a>
        </div>
    </section>
    
        <!-- Additional services you offer -->
      </section>
    </div>
      
    <footer class="footer">
      <p>&copy; 2023 Car Parking Reservation. All rights reserved.</p>
    </footer>
    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
    
            // Change the value (e.g., 100) to adjust when the navbar becomes sticky
            if (window.scrollY > 580) {
                navbar.classList.add('sticky');
            } else {
                navbar.classList.remove('sticky');
            }
        });
    </script>
  </body>
</html>

<?php } ?>