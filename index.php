<?php 
include 'includes/config.php'; // Database Connection
include 'includes/header.php';
session_start(); // Start the session

// Handle the search form submission
$category = isset($_GET['category']) ? $_GET['category'] : '';
$car_name = isset($_GET['car_name']) ? $_GET['car_name'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';

// Pagination settings
$limit = 8; // Number of entries to show in a page.
if (isset($_GET["page"])) {
    $page  = $_GET["page"]; 
} else {
    $page=1; 
};
$start_from = ($page-1) * $limit;

$searchQuery = "SELECT * FROM product WHERE status = 0";

if (!empty($category)) {
    $searchQuery .= " AND category = '$category'";
}
if (!empty($car_name)) {
    $searchQuery .= " AND vehicle_name LIKE '%$car_name%'";
}
if (!empty($brand)) {
    $searchQuery .= " AND brand = '$brand'";
}

$total_pages_sql = "SELECT COUNT(*) FROM product WHERE status = 0";
if (!empty($category)) {
    $total_pages_sql .= " AND category = '$category'";
}
if (!empty($car_name)) {
    $total_pages_sql .= " AND vehicle_name LIKE '%$car_name%'";
}
if (!empty($brand)) {
    $total_pages_sql .= " AND brand = '$brand'";
}
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $limit);

$searchQuery .= " LIMIT $start_from, $limit";
$searchResult = mysqli_query($conn, $searchQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>

.search-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
    margin: auto;
    
}

.search-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.search-form {
    display: flex;
    flex-direction: column;
}

.search-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.search-row input,
.search-row select {
    width: calc(100% / 6 - 10px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.search-row button {
    width: 50%;
    padding: 10px;
    background-color:  #0041C2;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin: auto;
}

.search-row button:hover {
    background-color:  #fbb72c;
}

.pagination {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 5px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
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

    <!-- Shop Section -->
    <section class="shop">
        <div class="container">
            <div class="search-container" style="margin-top: 2%;">
                <form class="search-form" method="GET" action="">
                    <div class="search-row">
                        <select name="category">
                            <option disabled selected>Category</option>
                            <?php 
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                <?php }
                            } 
                            ?>
                        </select>

                        <input type="text" name="car_name" placeholder="Enter Car Name" style="width: 50%;">

                        <select name="brand">
                            <option disabled selected>Brand</option>
                            <?php 
                            $sql = "SELECT * FROM brands";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                <?php }
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="search-row">
                    </div>
                    <div class="search-row">
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>

            <!-- Product Cards -->
            <div class="grid">
                <?php 
                if ($searchResult->num_rows > 0) {
                    while ($row = $searchResult->fetch_assoc()) { ?>
                        <div class="product-card">
                            <div class="badge"><?php echo $row['brand']; ?></div>
                            <div class="product-tumb">
                                <img src="assets/images/uploads/<?php echo $row['vehicle_image_01']; ?>" alt="">
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">
                                    <?php echo $row['category']; ?>
                                </span>
                                <h4 style="height: 10%;">
                                    <?php echo $row['vehicle_name']; ?>
                                    <?php echo $row['YOM']; ?>
                                </h4>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                        USD. <?php echo number_format($row['vehicle_price'], 2, '.', ','); ?>
                                    </div>
                                    <div class="product-links">
                                        <a href="viewalldetails.php?vehicle_id=<?php echo $row['vehicle_id']; ?>" class="btn" title="More Details">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <p>No results found</p>
                <?php }
                ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php 
                for ($i=1; $i<=$total_pages; $i++) { ?>
                    <a href="index.php?page=<?php echo $i; ?>" <?php if ($i==$page) echo "class='active'"; ?>>
                        <?php echo $i; ?>
                    </a>
                <?php }; ?>
                <a href="index.php?page=<?php echo $page+1; ?>" <?php if ($page >= $total_pages) echo "class='disabled'"; ?>>Next</a>
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
<?php
$conn->close();
?>
