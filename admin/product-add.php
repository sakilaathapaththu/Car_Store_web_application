<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include '../includes/config.php'; // Database Connection
  include '../includes/header.php';
  session_start(); // Start the session
  $username = $_SESSION['username'];
  ?>
  <link rel="stylesheet" href="assets/admin-style.css">
</head>

<body>

  <div class="admin">
    <header class="admin__header">
      <a href="#" class="logo">
        <h1>S K Automobile</h1>
      </a>
      <div class="toolbar">
      <h3> Hello, <?php echo $username; ?></h3>
        <a href="../logout.php" class="logout">
          Log Out
        </a>
      </div>
    </header>
    <nav class="admin__nav">
      <ul class="menu">
        <!-- <li class="menu__item">
          <a class="menu__link" href="dashboard.php">Dashboard</a>
        </li> -->
        <li class="menu__item">
          <a class="menu__link" href="products.php">Products</a>
        </li>
        <!-- <li class="menu__item">
          <a class="menu__link" href="brands.php">Brands</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="category.php">Category</a>
        </li> -->
        <li class="menu__item">
          <a class="menu__link" href="users.php">Users</a>
        </li>
        <li class="menu__item">
          <a class="menu__link" href="../logout.php">Log out</a>
        </li>
      </ul>
    </nav>
    <main class="admin__main">
      <h2>Add Product</h2>
      <form action="product-process.php" method="POST" enctype="multipart/form-data">
        <label for="pname">Vehicle Name:</label>
        <input type="text" id="pname" name="pname" placeholder="Enter Product Name">

        <label for="price">Vehicle Price:</label>
        <input type="text" id="price" name="price" placeholder="Enter Product Price">

        <label for="qty">Vehicle Description:</label>  
        <textarea id="description" name="description" placeholder="Enter Description"></textarea>
        
        <label for="pCode">Mileage</label>
        <input type="text" id="mileage" name="mileage" placeholder="Enter Mileage">

        <label for="pCode">Engine(cc)</label>
        <input type="text" id="engine" name="engine" placeholder="Enter Engine(cc)">

        <label for="pCode">Year Of Mamanufactured</label>
        <input type="number" id="YOM" name="YOM" placeholder="Enter YOM">

        <label for="fuelType">Fuel Type:</label>
        <select id="fuelType" name="fuelType">
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
            <option value="hybrid">Hybrid</option>
        </select>

        <label for="gear">Gear:</label>
        <select id="gear" name="gear">
            <option value="auto">Automatic</option>
            <option value="manual">Manual</option>
        </select>


        <label for="img1">Vehicle Image 01:</label>
        <input type="file" id="img1" name="img1">

        <label for="img2">Vehicle Image 02:</label>
        <input type="file" id="img2" name="img2">

        <label for="img3">Vehicle Image 03:</label>
        <input type="file" id="img3" name="img3">

        <label for="img4">Vehicle Image 04:</label>
        <input type="file" id="img4" name="img4">

        <label for="img5">Vehicle Image 05:</label>
        <input type="file" id="img5" name="img5">



        <label for="brand">Brand:</label>
        <?php
        // Retrieve brands from the database
        $sql_brand = "SELECT * FROM brands";
        $sql_brand_run = $conn->query($sql_brand);

        // Check if there are any brands
        if ($sql_brand_run->num_rows > 0) {
          ?>
          <select name="brand" id="brand">
            <?php
            // Loop through each brand
            while ($row_brand = $sql_brand_run->fetch_assoc()) {
              $brandName = $row_brand['name'];
              ?>
              <option value="<?php echo $brandName; ?>"><?php echo $brandName; ?></option>
              <?php
            }
            ?>
          </select>
          <?php
        } else {
          echo "No brands found.";
        }
        ?>
        <label for="category">Category:</label>
        <?php
        // Retrieve brands from the database
        $sql_brand = "SELECT * FROM category";
        $sql_brand_run = $conn->query($sql_brand);

        // Check if there are any brands
        if ($sql_brand_run->num_rows > 0) {
          ?>
          <select name="category" id="category">
            <?php
            // Loop through each brand
            while ($row_brand = $sql_brand_run->fetch_assoc()) {
              $brandName = $row_brand['name'];
              ?>
              <option value="<?php echo $brandName; ?>"><?php echo $brandName; ?></option>
              <?php
            }
            ?>
          </select>
          <?php
        } else {
          echo "No brands found.";
        }
        ?>

        <input type="submit" value="Submit" name="addItem">
      </form>
    </main>

  </div>
</body>

</html>