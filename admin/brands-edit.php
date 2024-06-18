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
                <li class="menu__item">
                    <a class="menu__link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="products.php">Products</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="brands.php">Brands</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="category.php">Category</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="users.php">Users</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="../logout.php">Log out</a>
                </li>
            </ul>
        </nav>
        <main class="admin__main">
            <div class="add-form">
                <h2>Edit Brands</h2>
                <?php

                if (isset($_GET['brand_id'])) {
                    $brandId = $_GET['brand_id'];

                    // Retrieve the existing brand data from the database
                    $sql = "SELECT * FROM brands WHERE brand_id = $brandId";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        // Display the update form with pre-filled values
                        ?>
                        <form action="brands-process.php" method="POST">
                            <input type="hidden" id="brandID" name="brandID" value="<?php echo $row['brand_id']; ?>">

                            <label for="bName">Brand Name:</label>
                            <input type="text" id="bName" name="bName" value="<?php echo $row['name']; ?>">

                            <label for="desc">Description:</label>
                            <textarea name="desc" id="desc" cols="30" rows="3"><?php echo $row['description']; ?></textarea>

                            <input type="submit" value="Submit" name="editBrand">
                        </form>
                        <?php
                    } else {
                        echo "Brand not found.";
                    }
                }
                ?>

            </div>
        </main>

    </div>
</body>

</html>