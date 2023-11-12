<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pickuploc = $_POST['pickuploc'];
    $destination = $_POST['destination'];
    $phone = $_POST['phone'];
    $servicetype = $_POST['servicetype'];
    $pickuptime = $_POST['pickuptime'];
    $bookingnumber = mt_rand(100000000, 999999999);
    $sql = "insert into tblbook(BookingNumber,Name,Email,PhoneNumber,PickupLoc,Destination,ServiceType,PickupTime)values(:bookingnumber,:name,:email,:phone,:pickuploc,:destination,:servicetype,:pickuptime)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pickuptime', $pickuptime, PDO::PARAM_STR);
    $query->bindParam(':servicetype', $servicetype, PDO::PARAM_STR);
    $query->bindParam(':destination', $destination, PDO::PARAM_STR);
    $query->bindParam(':pickuploc', $pickuploc, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':bookingnumber', $bookingnumber, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['bookingnumber'] = $result['bookingnumber'];
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        echo '<script>alert("Your vehicle breakdown assistance has been book successfully. Booking Number is "+"' . $bookingnumber . '")</script>';

        echo "<script>window.location.href ='index.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24/7 Onroad Vehicle Breakdown Services in Bengaluru | autodoc.com</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header class="sticky">
        <nav>
            <a href="#home" id="logo">Autodoc.</a>
            <ul id="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#request">Request a Service</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="drop">
                <button type="button" class="drop-btn btn">Admin/ Driver <i class="fa fa-angle-down"></i></button>
                <div class="drop-content">
                    <a href="driver/login.php">Driver Panel</a> <br>
                    <a href="admin/login.php">Admin Panel</a> <br>
                </div>
            </div>
        </nav>
    </header>


    <section class="hero" id="home">
        <div class="hero-container">
            <h1>24/7 Onroad Breakdown Assistance in Bangalore</h1>
            <p>Dont wait anymore. available Anytime anywhere in Bangalore.
            </p>
            <a href="#request"><button class="primary-btn btn">Make Your Request Now</button></a>
            <a href="track.php"><button id="trackbtn">Track Your Request</button></a>
        </div>
    </section>

    <section class="about" id="about">
        <h2>Who We Are ?</h2>
        <p class="section-desc">Autodoc- Onroad Vehicle Breakdown Assistance is a Web Application which is definitely a
            good solution for the people who seek help on the road in the middle of a journey or in the remote locations
            with major or minor mechanical issues of their vehicle. In order to avail our service, users can jus make a request by filling a simple request form <br> <br> The users need not login or register into the system. The users can specify the service centre as they prefer. Once the request is made they will be assigned to a trustworthy and
            experienced service provider from Autodoc. The Driver will be assigned by the administrator shortly. Once the request is assigned the driver from Autodoc will reach your given destination with the customised towing trucks within 30-40 minutes. Ousr service Provider will now assiat you to transport your vehicle to the specified location. </p>
    </section>

    <section class="features" id="features">
        <h2>Why Choose Us</h2>
        <div class="row">
            <div class="column">
                <i class="fas fa-history"></i>
                <h3>On-Time Service</h3>
                <p>Autodoc ensures you fast and on time service afer you make a request to us. You will connected with a
                    service provider who wil reach yor location and assist you, Team AUTODOC is able to reach you within 30-40
                    minutes.</p>
            </div>
            <div class="column">
                <i class="fas fa-tools"></i>
                <h3>Well-Trained Proffesionals</h3>
                <p>Autodoc Onroad assiatance will assign your request with a well-trained, trustworthy abd approved Service Providers. With 60+ customised tow trucks, Our drivers are able to your location as fast as possible.</p>
            </div>
            <div class="column">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Available across Bangalore</h3>
                <p> TEAM Autodoc provides a network of service providers who are available 24/7 across Bangalore for
                    your assistance. We provide you trusted and reliable service anytime anywhere in Bangalore when you
                    need it the most.</p>
            </div>
        </div>

    </section>

    <section class="services" id="services">
        <h2>What Do We Offer</h2>
        <div class="serv-row">
            <div class="serv-column">
                <div class="card" style="margin-left: 21rem;">
                    <div class="serv-icon"><i class="fas fa-motorcycle"></i></div>
                    <h3>Two Wheeler Tow</h3>
                    <p>Your bike has broken down and you need a two-wheeler towing vehicle at your location and a reliable bike towing service who can help you. You are frantically looking up the best bike towing in Bengaluru. Dont worry! AUTODOC breakdown assitance is always nearby and available 24 hours a day.</p>
                    <a href="#request"><button class="serv-btn btn" style="padding: 1rem 5rem; margin-top: 30px;">Starts at Rs. 300 + Rs. 30/Km</button></a>
                </div>

            </div>
            <div class="serv-column">
                <div class="card" style="margin-left: 21rem;">
                    <div class="serv-icon"><i class="fas fa-car"></i></div>
                    <h3>Four Wheeler Tow</h3>
                    <p>Your car has broken down and you need a four-wheeler towing vehicle at your location and a reliable car towing service who can help you. You’re frantically looking up the best car towing in Bangalore. Don’t worry! AUTODOC breakdown assistance is always nearby and available 24 hours a day.</p>
                    <a href="#request"><button class="serv-btn btn" style="padding: 1rem 5rem; margin-top: 30px;">Starts at Rs. 700 + Rs. 50/Km</button></a>
                </div>

            </div>

        </div>
    </section>

    <section class="request" id="request">
        <h2>Make Your Request Here !!</h2>
        <div class="form-body">
            <div class="form-container">
                <form action="" class="decor" method="post">
                    <div class="form-inner">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" placeholder="Enter your name" name="name" required="true"> <br>
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" placeholder="Enter your email" name="email" required="true"> <br>
                        <label class="form-label">Phone</label>
                        <input class="form-control" type="tel" placeholder="Enter your phone number" name="phone" required="true" maxlength="10" minlength="10" pattern="[0-9]+"> <br>
                        <label class="form-label">Pickup Location</label>
                        <input class="form-control" type="text" placeholder="Enter your Location with a Landmark" name="pickuploc" required="true"> <br>
                        <label class="form-label">Destination</label>
                        <input class="form-control" type="text" placeholder="Enter a Destination" name="destination" required="true"> <br>
                        <label class="form-label">Service Type</label>
                        <select class="form-select" name="servicetype" required>
                            <option selected>Select your Service Type</option>
                            <option value="Two Wheeler Towing">Two Wheeler Towing</option>
                            <option value="Four Wheeler Towing">Four Wheeler Towing</option>
                        </select><br>
                        <label class="form-label">Pickup Time</label>
                        <input class="form-control" type="time" required="true" name="pickuptime"><br>
                        <div class="form-btn">
                            <button class="form-btn btn" name="submit">Get Assistance Now !!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer" id="contact">
        <div class="footer-content">
            <div class="foot-row">
                <div class="foot-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">What Do we Offer</a></li>
                        <li><a href="#request">Make a Request</a></li>
                        <li><a href="track.php">Track your Request</a></li>
                    </ul>
                </div>
                <div class="foot-column">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#services">Two Wheeler Towing</a></li>
                        <li><a href="#services">Four Wheeler Towing</a></li>
                    </ul>
                </div>
                <div class="foot-column">
                    <h4>Contact Address</h4>
                    <p><b> AUTODOC</b>- 24/7 Assistance</p>
                    <br>
                    <p>#41, 05th Cross, SGP Main Rd<br>
                        Near Reliance Digital Mart <br>
                        HSR Layout, Bangalore <br>
                        Karnataka, India </p>


                </div>
                <div class="foot-column">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    </div> <br> <br>
                    <p> <b>PHONE:</b> 8431777720<br>
                        <b>EMAIL:</b> autodocsupport@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>