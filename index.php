<?php
include_once 'php/functions.php';
?>


<!DOCTYPE html>
<html lang="en">
 
<head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1, shrink-to-fit=no">
    <!-- link to css file-->
    <link rel="stylesheet" href="index.css">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
 <!--Page title-->
    <title>CyberSeed</title>
</head>
 
<body>

    <!-- Menu on top  -->
    <nav>
        <ul class="nav-flex-row">
            <li class="nav-item"><a href="index.php"><strong>Home</strong></a>
                <?php 
                if(isset($_SESSION['userid'])){ 
                    echo "<li class='nav-item'><a href='devices.php'><strong>Devices</strong></a></li>"; 
                }
                ?>
            <li class="nav-item">
                <a href="register.php"><Strong>Register</Strong></a>
            </li>
            <li class="nav-item"><a href="login.php"><Strong>Login</Strong></a></li>
            </li>
            <li class="nav-item"><a href="php/logout.php"><Strong>Logout</Strong></a></li>
        </ul>
    </nav>
    <section class="section-intro">
        <header>
            <h1> Welcome To Cyberseed</h1>
           
        </header>
        
    </section>
 <!--About section-->

    <section class="about-section">
        <article>
            <h3>
                What is CyberSeed?
            </h3>
 
             
<p>
             CyberSeed is a project designed by KAPN Productions with the purpose to help farm owners, flower shops and individuals take care of their plants. Taking care of the plants can be tedious, and even more so when each of them requires different care depending on the type. CyberSeed intends to notify the owner of the plants through their electronic device how their plants are doing. This will help the users take care of their specific plant or plants the proper way, improving their chances of growth. We aim to create such a device; a smart add on that will send you a message whenever a plant needs water or sunlight, and vitamins through the pH level the soil has.</p>  

           <p> KAPN Productions is formed by a team of computer engineers’ students at the University of Puerto Rico- Mayaguez Campus (UPRM) with the necessary skills to make CyberSeed a reality. Our team is led by Blas A. Ayala who possesses outstanding skills with microcontrollers, Kelvin Gonzalez who has worked creating front-end sites, Nashali Rivera with skills with front and back-end and creating connections between them, and Paola Velez who has experience working with databases. The team assembled for the class ICOM5047 (CAPSTONE). It is here, at the end of the semester where CyberSeed will be reviewed. 

             </p>
 
        </article>
    </section>
 
    <!-- carousel section of photos -->
    <div id="carouselExampleControls"
        class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/photo1.jpg"
                    class="d-block w-100" alt="food">
            </div>
            <div class="carousel-item">
                <img src="images/photo2.jpg"
                    class="d-block w-100" alt="food">
            </div>
            <div class="carousel-item">
                <img src="images/photo3.jpg"
                    class="d-block w-100" alt="food">
            </div>
        </div>
        <a class="carousel-control-prev"
            href="#carouselExampleControls"
            role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"
                aria-hidden="true">
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next"
            href="#carouselExampleControls"
            role="button" data-slide="next">
            <span class="carousel-control-next-icon"
                aria-hidden="true">
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
 
 <!--Last part of the page-->
    <div class="container">
        <div class="row-flex">
            <div class="flex-column-form">
                <h3>
                   Register
                </h3>
                <form class="media-centered" method="get" action="register.php">
                    <div class="form-group">
                         
<p>
                            Create your CyberSeed account
                        </p>
 
                         
                        <input type="email" class="form-control"
                            id="exampleInputName1"
                            aria-describedby="nameHelp"
                            placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <input type="" class="form-control"
                            id="exampleInputphoneNumber1"
                            placeholder="Enter your phone number">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </form>
            </div>
            <div class="opening-time">
                <h3>
                    Designed by
                </h3>
                 
<p>
                    <span>Kelvin S Gonzalez Aquino</span>
                    <span>Paola Velez</span>
                    <span>Blas A Ayala</span>
                    <span>Nashali Rivera</span>
                </p>

            </div>
            <div class="contact-address">
                <h3>
                    Contact our Team
                </h3>
                 
<p>
                    <span>Kelvin.gonzalez8@upr.edu</span>
                    <span>paola.velez6@upr.edu</span>
                    <span>blas.ayala@upr.edu</span>
                    <span>nashali.rivera1@upr.edu</span>
                    
                </p>
 
            </div>
        </div>
    </div>
 
 
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity=
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
     
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity=
"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous">
    </script>
     
    <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity=
"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
    </script>
</body>
 
</html>