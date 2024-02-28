<?php
session_start(); // Start the session

$user_email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the index.html page or any other page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <p>Welcome <?php echo $user_email !== null ? $user_email : "Guest"; ?></p>
    <form action="welcome.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
