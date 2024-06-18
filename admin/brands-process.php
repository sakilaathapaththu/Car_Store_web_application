<?php
include '../includes/config.php'; // Database Connection

if(isset($_POST['addBrand'])) {
    // Retrieve the form data
    $brandName = $_POST['bName'];
    $description = $_POST['desc'];

    // Insert the brand data into the database
    $sql = "INSERT INTO brands (name, description, created_at) VALUES ('$brandName', '$description', NOW())";

    if(mysqli_query($conn, $sql)) {
        // Brand added successfully
        echo "Brand added successfully!";echo "
        <script>
            alert('Brand added successfully!');
            window.location.href = 'brands.php'; 
        </script>
    ";
    } else {
        // Error occurred while adding the brand
        echo "
            <script>
                alert('Error:'. mysqli_error($conn));
                window.location.href = 'brands.php'; 
            </script>
        ";
    }


} elseif (isset($_POST['editBrand'])) {
    // Retrieve form data
    $brandName = $_POST["bName"];
    $description = $_POST["desc"];

    // Retrieve the brand ID from the form or any other source
    $brandID = $_POST["brandID"];

    // Perform the update query
    $sql = "UPDATE brands SET name = '$brandName', description = '$description', updated_at = NOW() WHERE brand_id = '$brandID'";

    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Brand updated successfully.');
                window.location.href = 'brands.php'; // Redirect to the brands page
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error updating brand.');
                window.location.href = 'brands.php'; // Redirect to the brands page
            </script>
        ";
    }
} elseif (isset($_GET['brand_id'])) { // Delete Brand ================================================================================
    $brandID = $_GET['brand_id'];

    // Perform the delete operation
    $sql = "DELETE FROM brands WHERE brand_id = $brandID";
    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Brand deleted successfully.');
                window.location.href = 'brands.php'; 
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting Brand');
            window.location.href = 'brands.php'; 
        </script>
    ";
    }
}

// Close the database connection
mysqli_close($conn);
?>
