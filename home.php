<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Court</title>
    <link rel="icon" href="highcourt/assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            box-sizing: border-box;
            font-family:arial;
        }
        body{
            background: #b9e3ff;
        }
        a{
            text-decoration: none;
        }
        .outer{
            height: auto;
            width:80%;
            border:1px solid blue;
            margin:0px auto;
        }
        .header{
            height:120px;
            width: auto;
            background: #1BB0E4;
        }
        .header img{
            width: 100%;
            height: 100%;
            object-fit: fill;
        }
        .spacer{
            height: 5px;
            background: #f3f3f3;
        }
        .spacer-2{
            height: 1px;
            background: #f3f3f3;
        }
        /* Navbar container */
        .navbar {
            display: flex;
            justify-content: space-around;
            height: 50px;
            width: auto;
            padding: 0 5%;
            background-color: #004F76;
            line-height: 50px;
            overflow: hidden;
            font-family: Arial;
        }

        /* Links inside the navbar */
        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            text-decoration: none;
        }

        /* The dropdown container */
        .dropdown {
        float: left;
        overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit; /* Important for vertical align on mobile phones */
        margin: 0; /* Important for vertical align on mobile phones */
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover, .dropdown:hover .dropbtn {
            color: #FEDE5D;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #A8D0F2;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
        float: none;
        color: black;
        padding: 0;
        text-decoration: none;
        display: block;
        text-align: center;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            color: black;
            background-color: #f3f3f3;
            border: 2px solid black;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
        display: block;
        }
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            width:80%;
        max-width: 800px;
        position: relative;
        margin: auto;
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
        height: 0.5rem;
        width: 0.5rem;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        .active {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .text {font-size: 11px}
        }

        .footer{
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            font-size: 14px;
            background-color: #004F76;
            text-decoration: none;
        }
        .footer-col{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .col{
            width:200px;
        }
        .copyright{
            background-color: #011D51;
            padding:20px 10px;
            text-align: center;
           
        }
        a{
            color:#f2f2f2
        }
        .welcome{
            height: auto;
            width: auto;
            margin:5px 0px;
            padding:10px 10px;
            background: white;
            display: flex;
            flex-direction: column;
        }
        .welcome-header{
            background-color:#004F76;
            padding: 10px 30px;
            text-align: center;
            color:white;
        }
        
    </style>
</head>
<body>
<nav class="navbar">
    <a class="navbar-brand" href="#">Tirupur Court</a>
    <button type="button" class="btn"><a href="logout-user.php">Logout</a></button>
    </nav>
   <div class="outer">
       <div class="spacer"></div>
        <div class="header">
            <img src="highcourt\assets\images\banner_latest.jpg" alt="">
        </div>
        <div class="spacer"></div>
        <div class="navbar">
            <a href="#">Home</a>
            <a href="#">Tracking</a>
            <div class="dropdown">
                <button class="dropbtn">
                    Communication
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </button>
                <div class="dropdown-content">
                    <a href="./Communication/form.html">DISTRICT-HIGH COURT</a>
                    <a href="#">HIGHT-SUBORDINATE COURT</a>
                    <a href="#">SUBORDINATE-DISTRICT COURT</a>
                </div>
            </div>
            <a href="./notification/display.php" target="_blank">Notification</a>
            <a href="#">Tracking status</a>
            <a href="./filesystem/login.php">Report Generation</a>
        </div>
        <div class="spacer"></div>

        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 4</div>
              <img src="highcourt\assets\images\court.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 4</div>
              <img src="highcourt\assets\images\tirupur-court.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 4</div>
              <img src="highcourt\assets\images\TIRUPUR.jpg" style="width:100%">
            </div>
                 
            
            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span>
                <span class="dot"></span> 
            </div>
        </div>    
        <div class="welcome">
            <div class="welcome-header">
                <strong>WELCOME TO THE DISTRICT COURT OF TIRUPUR
                </strong>
            </div>
            <p>Welcome to the home page of Tiruppur.  It has gained universal recognition as the leading source 
               of Hosiery, Knitted Garments, Casual Wear and Sportswear. Tiruppur is an important trade center of 
               India. Tiruppur is a major source of Foreign Exchange for the country because of its exports. 
               Tiruppur has gained universal recognition as the leading source of Hosiery, Knitted Garments, 
               Casual Wear and Sportswear. The city accounts for 90 % of India's cotton knitwear export, worth an 
               estimated US$ 1 bn. Tiruppur is basically a traditional centre for cotton ginning.
            </p>
        </div>
                       
    </div>
    
    <script>
        let slideIndex = 0;
        showSlides();
        
        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
        </script>
</body>
</html>