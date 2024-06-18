<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        include 'includes/config.php'; // Database Connection
        include 'includes/header.php';
        session_start(); // Start the session
    ?>
    <!-- <link rel="stylesheet" href="styles.css"> -->

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        /* font-family: Arial, sans-serif; */
        background-color: #f5f5f5;
        color: #333;
        /* padding: 20px; */
      }

      .listing-container {
        max-width: 800px;
        
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h3 {
        text-align: center;
        margin-bottom: 20px;
        font-size:28px;
      }

      .listing-info {
        text-align: center;
        color: #777;
        margin-bottom: 20px;
      }

      .image-gallery {
        text-align: center;
        margin-bottom: 20px;
        
      }

      .primary-image {
        width: 80%;
        height: 500px;
        /* height: auto; */
        border-radius: 8px;
      }

      .thumbnail-wrapper {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
      }

      .thumbnail-image {
        width: 60px;
        height: auto;
        border-radius: 4px;
        cursor: pointer;
        transition: transform 0.3s;
      }

      .thumbnail-image:hover {
        transform: scale(1.1);
      }

      .details-section {
        margin-top: 20px;
      }

      .details-section p {
        margin: 10px 0;
      }

      .details-table {
        width: 100%;
        border-collapse: collapse;
      }

      .details-table th,
      .details-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      .details-table th {
        background-color: #f8f8f8;
      }

      @media (max-width: 600px) {
        .thumbnail-wrapper {
          flex-wrap: wrap;
        }

        .thumbnail-image {
          width: 45px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <?php 
            include 'includes/menu.php'; 
        ?>
    </header>
<br><br>
    <?php

            if (isset($_GET['vehicle_id'])) {
                $productID = $_GET['vehicle_id'];

                // Retrieve the existing brand data from the database
                $sql = "SELECT * FROM product WHERE vehicle_id = $productID";
                $result = $conn->query($sql); if ($result->num_rows > 0) { $row
    = $result->fetch_assoc(); // Display the update form with pre-filled values
    ?>

    <div class="listing-container" style="margin-top: 5%;margin-bottom:5%;">
      <h3><?php echo $row['vehicle_name']; ?></h3>
      
      <div class="image-gallery" >
            <img src="assets/images/uploads/<?php echo $row['vehicle_image_01']; ?>" alt="" class="primary-image" id="main-image"/>
            <div class="thumbnail-wrapper">
                <img src="assets/images/uploads/<?php echo $row['vehicle_image_01']; ?>" alt="Thumbnail 1" class="thumbnail-image" onclick="changeImage('assets/images/uploads/<?php echo $row['vehicle_image_01']; ?>')"/>
                <img src="assets/images/uploads/<?php echo $row['vehicle_image_02']; ?>" alt="Thumbnail 2" class="thumbnail-image" onclick="changeImage('assets/images/uploads/<?php echo $row['vehicle_image_02']; ?>')"/>
                <img src="assets/images/uploads/<?php echo $row['vehicle_image_03']; ?>" alt="Thumbnail 3" class="thumbnail-image" onclick="changeImage('assets/images/uploads/<?php echo $row['vehicle_image_03']; ?>')"/>
                <img src="assets/images/uploads/<?php echo $row['vehicle_image_04']; ?>" alt="Thumbnail 4" class="thumbnail-image" onclick="changeImage('assets/images/uploads/<?php echo $row['vehicle_image_04']; ?>')"/>
                <img src="assets/images/uploads/<?php echo $row['vehicle_image_05']; ?>" alt="Thumbnail 5" class="thumbnail-image" onclick="changeImage('assets/images/uploads/<?php echo $row['vehicle_image_05']; ?>')"/>
            </div>
        </div>
      <div class="details-section">
        <!-- <p><strong>Contact:</strong> 077 763 4242</p> -->
        <p><strong>Price:</strong> USD. <?php echo number_format($row['vehicle_price'], 2, '.', ','); ?></p>
        <p>
          <!-- <strong>Leasing Options:</strong> Starting from Rs. 1,396 per month -
          <a href="#">CRC Finance</a> -->
        </p>
        <table class="details-table">
          <tr>
            <th>Make</th>
            <td><?php echo $row['brand']; ?></td>
          </tr>
          <tr>
            <th>Model</th>
            <td><?php echo $row['vehicle_name']; ?></td>
          </tr>
          <tr>
            <th>Year of Manufacture</th>
            <td><?php echo $row['YOM']; ?></td>
          </tr>
          <tr>
            <th>Mileage</th>
            <td><?php echo $row['Mileage']; ?></td>
          </tr>
          <tr>
            <th>Transmission</th>
            <td><?php echo $row['Gear']; ?></td>
          </tr>
          <tr>
            <th>Fuel Type</th>
            <td><?php echo $row['FuelType']; ?></td>
          </tr>
          <tr>
            <th>Engine Capacity</th>
            <td><?php echo $row['Engine']; ?></td>
          </tr>
          <tr>
            <th>Description</th>
            <td><?php echo $row['description']; ?></td>
          </tr>
        </table>

      </div>
        <!-- <div style="margin-top:10px;">
            <p><strong> contact us click here .</strong>
            <a href="contact.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" title="contact">contact us</a>
            </p>
        </div> -->
    </div>
    <?php
                } else {
                    echo "vehicle not found.";
                }
            }
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
    <script>
        function changeImage(imageSrc) {
            document.getElementById('main-image').src = imageSrc;
        }
    </script>
  </body>
</html>
