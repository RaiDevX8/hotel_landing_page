<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'quality6'); // Update database connection details

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve and sanitize user inputs
$fname = isset($_POST['first-name']) ? mysqli_real_escape_string($con, $_POST['first-name']) : "";
$lname = isset($_POST['last-name']) ? mysqli_real_escape_string($con, $_POST['last-name']) : "";
$password = isset($_POST['password']) ? mysqli_real_escape_string($con, $_POST['password']) : "";
$email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : "";
$address = isset($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : "";
$date = isset($_POST['birth-date']) ? mysqli_real_escape_string($con, $_POST['birth-date']) : "";
$phone = isset($_POST['phone']) ? mysqli_real_escape_string($con, $_POST['phone']) : "";

// Check if required fields are not empty
if (!empty($fname) && !empty($lname) && !empty($password) && !empty($email) && !empty($address) && !empty($date) && !empty($phone)) {
    // Check if a user with the same email already exists
    $checkEmailQuery = "SELECT id FROM user_registration WHERE email = '$email'";
    $checkEmailResult = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) == 0) {
        // No existing user with the same email, insert data into the database
        $insertQuery = "INSERT INTO user_registration (first_name, last_name, password, email, address, birth_date, phone) VALUES ('$fname', '$lname', '$password', '$email', '$address', '$date', '$phone')";

        if (mysqli_query($con, $insertQuery)) {
            header('location: login.php');
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
        }
    } else {
        echo "A user with this email already exists. Registration failed.";
    }
} else {
    echo "Some required fields are empty. Registration failed.";
}

mysqli_close($con);
?>
