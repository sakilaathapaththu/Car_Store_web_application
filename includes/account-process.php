<?php
session_start(); // Start the session
include 'config.php'; // Database Connection

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    // Update the user profile in the database
    $userId = $_SESSION['userID']; // Assuming you have a user_id stored in the session
    $sql = "UPDATE users SET username = '$username', full_name = '$fullName', email = '$email', address = '$address', city = '$city', phone = '$phone' WHERE user_id = $userId";

    // Execute the SQL query and check for success
    if ($conn->query($sql) === TRUE) {
        // Update successful, update the session variables
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = $fullName;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['city'] = $city;
        $_SESSION['phone'] = $phone;

        // Redirect to a success page or display a success message
        echo "
                    <script>
                        alert('Update Successfully');
                        window.location.href = '../index.php'; 
                    </script>
                ";
    } else {
        // Error occurred while updating, handle the error accordingly
        echo "Error updating profile: " . $conn->error;
    }
}
?>