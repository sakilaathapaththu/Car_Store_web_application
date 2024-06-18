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
            <h2>Registered Users</h2>
            <br>
            <table id="customers">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Reg Date</th>
                </tr>
                <tr>
                    <?php
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td>
                                <?php echo $row['user_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['username']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['full_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                            <td>
                                <?php echo $row['city']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                           
                            <td>
                                <?php echo $row['reg_date']; ?>
                            </td>
                        </tr>
                        <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>
                </tr>

            </table>
        </main>

    </div>
</body>

</html>