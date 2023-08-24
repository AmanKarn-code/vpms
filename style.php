/* Reset some default styles */
<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '0.7em';
$border = '1px solid';
?>

  @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@400;500&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
}
nav{
    background-color:#ff990078 !important;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}
.Reserved label{
    background-color:red !important;
    color:white !important;
}
.Reserved label:hover {
  background-color:  red !important;
  cursor: not-allowed;
}
.slotselect input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}
.slotselect label {
    display: inline-block;
    background-color: #ddd;
    padding: 10px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    <!-- border: 2px solid #444; -->
    border-radius: 4px;
    cursor:pointer;
    font-weight:bold;
}
.slotselect label:hover {
  background-color:  #0d6efd;
}
.slotselect input[type="radio"]:focus + label {
    <!-- border: 2px dashed #444; -->
}
.slotselect input[type="radio"]:checked + label {
    background-color: #80ff07;
    border-color: #4c4;
}

a{
    text-decoration: none;
    font-family: 'Dosis', sans-serif;
    font-weight:700 !important;
}
/* Navbar styles */
.navbar {
    position: absolute;
    z-index: 1000;
    background-color: transparent;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    padding: 10px 20px;
    top: 0;
    
}

/* Sticky navbar styles */
.navbar.sticky {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    /* Add any additional styles you want for the sticky navbar */
    /* For example, you can change its background color, opacity, etc. */
    background-color:#ff990078;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}
.navbar .logo a {
    color: #0f0f0f;
    font-size: 24px;
    text-decoration: none;
}

.navbar .nav-links {
    list-style: none;
    display: flex;
}

.navbar .nav-links li {
    margin-right: 20px;
}

.navbar .nav-links li a {
    color: black;
    /* color: #fff; */
    text-decoration: none;
    transition: color 0.3s ease;
    font-weight: bold !important;
}

.navbar .nav-links li a:hover {
    color: #0f0f0f;
    font-weight: bold;
}

/* Hero section styles */
.hero {
    background-image: url('path-to-your-image/hero-background.jpg'); /* Replace with your hero image path */
    background-color: #ff990091;
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
    padding: 200px 0; /* Adjust as needed */
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
    line-height: 1.2;
}

.hero p {
    font-size: 18px;
    color: #f5f5f5;
    margin-bottom: 40px;
}

.cta-button.explore-button {
    display: inline-block;
    padding: 12px 30px;
    background-color: #ff9900;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-weight: bold;
    font-size: 18px;
}

.cta-button.explore-button:hover {
    background-color: #e68300;
}
/* About section styles */
.about-section {
    background-color: #f5f5f5a6;
    padding: 80px 0;
    text-align: center;
}

.about-section h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
}

.about-section p {
    font-size: 18px;
    color: #666;
}

/* Services section styles */
/* ... (your previous CSS code) ... */

/* Updated services section styles */
.services-section {
    background-color: #767d7eb3 !important;
    padding: 80px 0;
    text-align: center;
}

.services-section h2 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
}

.service-card {
    background-color: #f5f5f5;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    margin: 16px;
    display: inline-block;
    vertical-align: top;
    width: calc(33.33% - 40px); /* Distribute equally in 3 columns */
}

.service-card img {
    max-width: 65%;
    margin-bottom: 20px;
}

.service-card h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.service-card p {
    font-size: 16px;
    color: #666;
}

.service-card:hover {
    transform: translateY(-10px);
    background-color: #e0e0e0;
}

/* Footer styles */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

/* Add animations (customize as needed) */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Apply animations to elements */
.hero h1,
.hero p,
.cta-button,
.about-section,
.services-section,
.service,
.footer {
    animation: fadeIn 1s ease;
}
body {
    font-family: 'Roboto', sans-serif;
    /* font-family: 'Roboto', sans-serif; */
    margin: 0;
    padding: 0;
    background-image: url('https://wallpaperaccess.com/full/1179716.jpg'); /* Replace with the correct image path */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Styling for car images */
.car-images {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

.car-images img {
    width: 200px;
    height: auto;
    margin: 0 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.car-images img:hover {
    transform: scale(1.05);
}

/* Adding more color variations */
.hero {
    /* background-color: #ff9900; */
    color: #fff;
}

.cta-button {
    background-color: #333;
    color: #fff;
}

.cta-button:hover {
    background-color: #222;
}

.about-section {
    background-color: #837c7ca6;
}

.services-section {
    background-color: #ffffffb3;
}

.service {
    background-color: #ff9900;
}

.service:hover {
    background-color: #e68300;
}

.footer {
    background-color: #333;
    color: #fff;
}

/* Custom animations */
@keyframes slideInFromLeft {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

.car-images img {
    animation: slideInFromLeft 0.8s ease;
}

@keyframes fadeInUp {
    0% {
        transform: translateY(20px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}


<!-- making responsive -->

#para{
    color:#ffee00;
    font-weight:bold;
}
.about-section p,
.services-section h2,
.service {
    animation: fadeInUp 1s ease;
}
.slotbook{
    cursor: pointer;
    padding: 8px;
    margin-top: 1rem;
    border: 1px solid;
    border-radius: 15px;
}
.slotbook:hover{
    background-color:#80ff07;
}


body {
    font-family: Arial, sans-serif;
  }
  form { 
    width: 130%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  label, input {
    display: block;
    margin-bottom: 7px;
    font-family: cursive;
  }
  input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
  }
  input[type="submit"], input[type="reset"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    cursor: pointer;
  }
  input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #0056b3;
  }




  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  label, input {
    display: block;
    margin-bottom: 10px;
    font-family: cursive;
  }
  input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
  }
  input[type="submit"], input[type="reset"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    cursor: pointer;
  }
  input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #0056b3;
  }