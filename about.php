<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/header.php';
    session_start(); // Start the session
    ?>
    <link rel="stylesheet" href="assets/css/aboutus.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <?php
            include 'includes/menu.php';
        ?>
    </header>



    <section class="about-us" >
        <div class="about" style="margin-top:5%;">
            <h2>About Us</h2>
            <h5>Welcome to <span>S K Automobile</span></h5>
            <p>Welcome to S K Automobile, your premier destination for quality vehicles in Miyazaki, Japan. Founded with a passion for excellence and a commitment to customer satisfaction, we strive to provide you with the finest selection of vehicles coupled with exceptional service.</p>
            <h3>Our Vision</h3>
            <p>At S K Automobile, we envision a future where every customer finds their perfect vehicle effortlessly. Whether you're looking for a sleek sedan, a robust SUV, or a dependable truck, we have a diverse inventory to cater to your needs.</p>
            <h3>Meet Our CEO – Garumunige Sumith</h3>
            <p>Leading the charge at S K Automobile is our CEO, Garumunige Sumith. With a profound dedication to the automotive industry and years of experience, Garumunige Sumith brings visionary leadership to ensure that every aspect of your vehicle buying experience exceeds expectations.</p>
            <h3>Why Choose Us?</h3>
            <ul>
                <li><strong>Quality Selection:</strong> Each vehicle in our inventory is meticulously inspected to meet the highest standards of reliability and performance.</li>
                <li><strong>Customer-Centric Approach:</strong> We prioritize your satisfaction above all else, offering personalized service tailored to your preferences.</li>
                <li><strong>Transparent Transactions:</strong> Honesty and integrity are at the core of our business practices, ensuring clarity throughout your purchase journey.</li>
            </ul>
            <div class="contact-info">
                <h3>Location and Contact Information</h3>
                <p>Visit us at our showroom located in Miyazaki, Japan, to explore our wide range of vehicles firsthand.</p>
                <p>For inquiries, you can reach us at:</p>
                <p><strong>Phone:</strong> 080-3219-8571</p>
                <p><strong>Email:</strong> skltd67@gmail.com</p>
            </div>
        </div>
    </section>
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