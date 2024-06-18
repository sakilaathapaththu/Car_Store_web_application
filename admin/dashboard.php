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
      <h2>Dashboard</h2>
      <div class="row">
        <div class="card">
          <h3>Listed Products</h3>
          <h1>
            <?php
            $sql = "SELECT COUNT(*) AS total_product FROM product";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $totalRows = $row['total_product'];
              echo $totalRows;

            } else {
              echo "0 results";
            }

            ?>
          </h1>
          <a href="products.php">View All</a>
        </div>
        <div class="card">
          <h3>Listed Brands</h3>
          <h1>
            <?php
            $sql = "SELECT COUNT(*) AS total_brands FROM brands";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $totalRows = $row['total_brands'];
              echo $totalRows;

            } else {
              echo "0 results";
            }

            ?>
          </h1>
          <a href="brands.php">View All</a>
        </div>
        <div class="card">
          <h3>Listed Categories</h3>
          <h1>
            <?php
            $sql = "SELECT COUNT(*) AS total_category FROM category";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $totalRows = $row['total_category'];
              echo $totalRows;

            } else {
              echo "0 results";
            }

            ?>
          </h1>
          <a href="category.php">View All</a>
        </div>
        <div class="card">
          <h3>Registered Userss</h3>
          <h1>
            <?php
            $sql = "SELECT COUNT(*) AS total_users FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $totalRows = $row['total_users'];
              echo $totalRows;

            } else {
              echo "0 results";
            }

            ?>
          </h1>
          <a href="users.php">View All</a>
        </div>
      </div>


    </main>

  </div>
</body>

</html>