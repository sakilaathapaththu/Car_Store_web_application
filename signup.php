<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'includes/header.php'; // Database Connection
    ?>
</head>
<body>

    <!-- Header Section -->
    <header>
        <?php 
            include 'includes/menu.php'; // Database Connection
        ?>
    </header>

    <!-- Signin Section -->
    <section class="signin">
        <div class="container">
            <div class="log-bar">
                <div class="login-form">
                    <h2>Signup</h2>
                    <form action="includes/signup-process.php" method="POST" onsubmit="return checkPassword()">
                        <div class="login_box">
                            <label for="fullName">Name:</label>
                            <input type="text" name="fullName" id="fullName" placeholder="Enter Your Name" required/>
                        </div>
                        <div class="login_box">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address" required/>
                        </div>
                        <div class="login_box">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" placeholder="Enter username" required/>
                        </div>
                        <div class="login_box">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required/>
                        </div>
                        <div class="login_box">
                            <label for="conPassword">Re-enter Password:</label>
                            <input type="password" name="conPassword" id="conPassword" placeholder="Re-enter Password" required/>
                        </div>
                        <div class="remember-forget">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forget password</a>
                        </div>
                        <button type="submit" class="btn" name="signup">Signup</button>
                        <hr>
                        <div class="register">
                            <p>Already have an account?<a href="signin.php" class="register-link">Signin</a></p>
                        </div>
                    </form>
                </div>
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

    <script>
        // Check Password
        function checkPassword() {
            const password = document.getElementById("password").value;
            const rePassword = document.getElementById("conPassword").value;

            if(password != rePassword) {
                alert("Password Mismatch!");
                return false;
            } else {
                alert("Success!");
                return true;
            }
        }
    </script>
    
</body>
</html>