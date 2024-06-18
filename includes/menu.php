<nav id="nav">
    <div class="container">
        <!-- Logo -->
        <a href="index.php" class="">
            <img class="navbar-brand" src="assets/images/logoheader1.png" alt="logo">
        </a>
        <!-- Navigation -->
        <ul class="navbar" id="navbar">
            <li class="navbar-item">
                <a class="navbar-link" href="index.php">Home</a>
            </li>
            
            <li class="navbar-item">
                <a class="navbar-link" href="about.php">About Us</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
        <ul class="sign-btn">
            <?php
            if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
                $username = $_SESSION['username'];
                ?>
                
                <!-- <li class='navbar-item'>
                    <a class='navbar-link' href='#'><i class='ri-search-line'></i></a>
                </li> -->
                <div class="login-menu subnav">
                    <span class='navbar-link'>
                        <?php echo $username; ?>
                    </span>
                    <ul class="subnav-content">
                        <!-- <li><a href="account-setting.php">Account Setting</a></li> -->
                        <!-- <li><a href="my-orders.php">My Order</a></li> -->
                        <li class="logout"><a href="logout.php"> Log Out</a></li>
                    </ul>
                </div>

                <?php
            } else {
                echo "<li class='navbar-item'>
                                    <a class='navbar-link' href='signin.php'><i class='ri-user-line'></i></a>
                                </li>
                               
                               ";
            }
            ?>

        </ul>
    </div>
</nav>