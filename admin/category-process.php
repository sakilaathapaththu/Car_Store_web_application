<?php
include '../includes/config.php'; // Database Connection

if(isset($_POST['addCategory'])) {
    // Retrieve the form data
    $categoryName = $_POST['cName'];
    $description = $_POST['desc'];

    // Insert the category data into the database
    $sql = "INSERT INTO category (name, description, created_at) VALUES ('$categoryName', '$description', NOW())";

    if(mysqli_query($conn, $sql)) {
        echo "
        <script>
            alert('Category added successfully!');
            window.location.href = 'category.php'; // Redirect to the brands page
        </script>
    ";
    } else {
        // Error occurred while adding the brand
        echo "
            <script>
                alert('Error Adding category.');
                window.location.href = 'category.php'; // Redirect to the brands page
            </script>
        ";
    }

} elseif (isset($_POST['editCategory'])) {
    // Retrieve form data
    $categoryName = $_POST["cName"];
    $description = $_POST["desc"];

    // Retrieve the category ID from the form or any other source
    $categoryID = $_POST["categoryid"];

    // Perform the update query
    $sql = "UPDATE category SET name = '$categoryName', description = '$description', updated_at = NOW() WHERE category_id = '$categoryID'";

    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Category updated successfully.');
                window.location.href = 'category.php'; // Redirect to the brands page
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error updating category.');
                window.location.href = 'category.php'; // Redirect to the brands page
            </script>
        ";
    }
} elseif (isset($_GET['category_id'])) { // Delete Brand ================================================================================
    $categoryid = $_GET['category_id'];

    // Perform the delete operation
    $sql = "DELETE FROM category WHERE category_id = $categoryid";
    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('category deleted successfully.');
                window.location.href = 'category.php'; 
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting category');
            window.location.href = 'category.php'; 
        </script>
    ";
    }
}

// Close the database connection
mysqli_close($conn);
?>
