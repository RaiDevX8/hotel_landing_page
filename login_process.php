<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'quality6'); // Update database connection details

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Validate and sanitize user inputs
$email = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Validate the email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

// Retrieve the user's data from the database using prepared statements
$stmt = $con->prepare("SELECT id, email, password FROM user_registration WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $db_email, $stored_password);
    $stmt->fetch();

    if ($password == $stored_password) {
        // Password is correct, create a session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $db_email;

        header('location: welcome.php');
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$stmt->close();
mysqli_close($con);
?>
