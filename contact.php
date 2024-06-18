<!DOCTYPE html>
<html lang="en">

<head>

    <?php
     include 'includes/config.php'; // Database Connection
    include 'includes/header.php';
    session_start(); // Start the session
    ?>
    <link rel="stylesheet" href="assets/css/contactus.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <?php include 'includes/menu.php'; ?>
    </header>
    <?php
    // if (isset($_GET['vehicle_id'])) {
    //     $productID = $_GET['vehicle_id'];

    //     // Retrieve the existing brand data from the database
    //     $sql = "SELECT * FROM product WHERE vehicle_id = $productID";
    //     $result = $conn->query($sql);
    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         // Display the update form with pre-filled values
    ?> 
    <section class="about-us" >
        <div class="container" style="margin-top:3%;">
            <h1>Contact Us</h1>
        </div>
    
        <div class="container">
            <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <i class="ri-map-pin-line"></i>
                        <div class="topic">Address</div>
                        <div class="text-one">Kanagawaken, Kawasakishi, </div>
                        <div class="text-two">Miyamaeku, miyazaki93-8</div>
                    </div>
                    <div class="phone details">
                        <i class="ri-phone-line"></i>
                        <div class="topic">FAX/TEL</div>
                        <div class="text-one">+044 382 1638</div>
                        
                    </div>
                    <div class="phone details">
                        
                    <i class="ri-smartphone-line"></i>
                        <div class="topic">Mobile</div>
                        <div class="text-two">+080 3219 8571</div>
                    </div>
                    <div class="email details">
                        <i class="ri-mail-line"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">skltd67@gmail.com</div>
                        <!-- <div class="text-two">info.codinglab@gmail.com</div> -->
                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <form action="send_message.php" method="POST">
                        <!-- <div class="input-box">
                            <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id']; ?>">
                            <input type="text" name="vehicle_name" value="<?php echo $row['vehicle_name']; ?>" placeholder="Vehicle Name" readonly>
                        </div> -->
                        <div class="input-box">
                            <input type="text" name="user_name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <input type="email" name="user_email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box message-box">
                            <textarea name="user_message" cols="30" rows="10" placeholder="Enter your message" required></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" class="btn" value="Send Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
    <?php
    //     } else {
    //         echo "Vehicle not found.";
    //     }
    // }
    ?>

   <!-- Footer Section -->
   <footer>
    <div class="container">
        <div class="grid">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                    <!-- <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li> -->
                </ul>
            </div>
            <div class="footer-col">
                <h4>Support </h4>
                <div class="contact">
                    <a href="#"><i class="ri-mail-line"></i> skltd67@gmail.com</a>
                    <a href="#"><i class="ri-phone-line"></i> +044 382 1638</a>
                    <a href="#"><i class="ri-smartphone-line"></i> +080 3219 8571 </a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Social Media</h4>
                <div class="social-icon">
                    <a href="#" title="facebook"><i class="ri-facebook-fill"></i></a>
                    <a href="#" title="instagram"><i class="ri-instagram-fill"></i></a>
                    <a href="#" title="twitter"><i class="ri-twitter-fill"></i></a>
                    <a href="#" title="linkedin"><i class="ri-linkedin-fill"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <img src="assets/images/logoheader1.png" alt="logo" class="footer-logo-img">
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 S K Automobile. Developed by sakila.</p>
        </div>

    </div>
</footer>


</body>

</html>