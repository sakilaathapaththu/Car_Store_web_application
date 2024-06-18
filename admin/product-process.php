<?php
include '../includes/config.php'; // Database Connection

if (isset($_POST['addItem'])) {
    // Retrieve form data
    $productName = $_POST["pname"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $mileage = $_POST["mileage"];
    $engine = $_POST["engine"];
    $YOM = $_POST["YOM"];
    $fuelType = $_POST["fuelType"];
    $gear = $_POST["gear"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];

    // Set the target directory for uploading the images
    $targetDirectory = "../assets/images/uploads/";

    // Function to handle image upload and return the image name
    function uploadImage($imageField, $targetDirectory) {
        $image = $_FILES[$imageField]['name'];
        $imageTmp = $_FILES[$imageField]['tmp_name'];
        $uniqueImageName = uniqid() . '_' . $image;
        $targetFilePath = $targetDirectory . $uniqueImageName;

        if (move_uploaded_file($imageTmp, $targetFilePath)) {
            return $uniqueImageName;
        } else {
            return null;
        }
    }

    // Upload each image and get the unique names
    $productImgName1 = uploadImage('img1', $targetDirectory);
    $productImgName2 = uploadImage('img2', $targetDirectory);
    $productImgName3 = uploadImage('img3', $targetDirectory);
    $productImgName4 = uploadImage('img4', $targetDirectory);
    $productImgName5 = uploadImage('img5', $targetDirectory);

    // Ensure all images are uploaded successfully
    if ($productImgName1 && $productImgName2 && $productImgName3 && $productImgName4 && $productImgName5) {
        // SQL query to insert data into the product table
        $sql = "INSERT INTO product (vehicle_name, vehicle_price, description, Mileage, Engine, YOM, FuelType, Gear, vehicle_image_01, vehicle_image_02, vehicle_image_03, vehicle_image_04, vehicle_image_05, brand, category, created_at) 
                VALUES ('$productName', '$price', '$description', '$mileage', '$engine', '$YOM', '$fuelType', '$gear', '$productImgName1', '$productImgName2', '$productImgName3', '$productImgName4', '$productImgName5', '$brand', '$category', NOW())";

        // Execute the query (you'll need to add your database connection and execution logic here)
        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                alert('Product Added successfully.');
                window.location.href = 'products.php'; 
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Error Adding Product');
                window.location.href = 'products.php'; 
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Error uploading images');
            window.location.href = 'products.php'; 
        </script>
        ";
    }


} elseif (isset($_POST['editItem'])) {
    // Retrieve the form data
    $productID = $_POST["productID"];
    $productName = $_POST["pname"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $mileage = $_POST["mileage"];
    $engine = $_POST["engine"];
    $YOM = $_POST["YOM"];
    $fuelType = $_POST["fuelType"];
    $gear = $_POST["gear"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];
    $status = $_POST["status"];

    // Set the target directory for uploading the images
    $targetDirectory = "../assets/images/uploads/";

    // Function to handle image upload and return the image name
    function uploadImage($imageField, $targetDirectory) {
        $image = $_FILES[$imageField]['name'];
        $imageTmp = $_FILES[$imageField]['tmp_name'];
        if ($image != '') {
            $uniqueImageName = uniqid() . '_' . $image;
            $targetFilePath = $targetDirectory . $uniqueImageName;
            if (move_uploaded_file($imageTmp, $targetFilePath)) {
                return $uniqueImageName;
            }
        }
        return null;
    }

    // Upload each image and get the unique names
    $productImgName1 = uploadImage('img1', $targetDirectory);
    $productImgName2 = uploadImage('img2', $targetDirectory);
    $productImgName3 = uploadImage('img3', $targetDirectory);
    $productImgName4 = uploadImage('img4', $targetDirectory);
    $productImgName5 = uploadImage('img5', $targetDirectory);

    // Build the SQL SET part for updating images only if new images are uploaded
    $imageSet = "";
    if ($productImgName1) $imageSet .= ", `vehicle_image_01`='$productImgName1'";
    if ($productImgName2) $imageSet .= ", `vehicle_image_02`='$productImgName2'";
    if ($productImgName3) $imageSet .= ", `vehicle_image_03`='$productImgName3'";
    if ($productImgName4) $imageSet .= ", `vehicle_image_04`='$productImgName4'";
    if ($productImgName5) $imageSet .= ", `vehicle_image_05`='$productImgName5'";

    // SQL query to update the product data in the database
    $sql = "UPDATE `product` 
            SET `vehicle_name`='$productName',
                `vehicle_price`='$price',
                `description`='$description',
                `mileage`='$mileage',
                `engine`='$engine',
                `YOM`='$YOM',
                `fuelType`='$fuelType',
                `gear`='$gear',
                `brand`='$brand',
                `category`='$category',
                `status`='$status',
                `updated_at`=NOW() 
                $imageSet
            WHERE `vehicle_id`='$productID'";

    // Execute the query (you'll need to add your database connection and execution logic here)
    
    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Product updated successfully.');
                window.location.href = 'products.php'; 
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error updating Product');
                window.location.href = 'products.php'; 
            </script>
        ";
    }


} elseif (isset($_GET['vehicle_id'])) { // Delete Brand ================================================================================
    $productid = $_GET['vehicle_id'];

    // Perform the delete operation
    $sql = "DELETE FROM product WHERE vehicle_id = $productid";
    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Product deleted successfully.');
                window.location.href = 'products.php'; 
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting Product');
            window.location.href = 'products.php'; 
        </script>
    ";
    }
}

?>