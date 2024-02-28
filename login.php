<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
    <section class="container">
        <header>Login Form</header>
        <form action="login_process.php" method="post" class="form" onsubmit="return validateForm()" autocomplete="off">
            <div class="input-box">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username" required aria-labelledby="username-label username-error" />
                <span class="error" id="username-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
            <div class="input-box">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required aria-labelledby="password-label password-error" />
                <span class="error" id="password-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
            <div class="button-container">
            <button style="background-color: rgba(25, 204, 25, 0.758); display: block; margin: 0 auto;" type="submit">Login</button>
            </div>
        </form>
    </section>
    
<script>
function validateForm() {
    // Reset error messages
    clearErrors();

    let isValid = true;

    // Username
    const username = document.getElementById("username").value;
    const usernameError = document.getElementById("username-error");
    if (username.trim() === "") {
        usernameError.textContent = "Username is required.";
        usernameError.style.color = "red";
        isValid = false;
    }

    // Password
    const password = document.getElementById("password").value;
    const passwordError = document.getElementById("password-error");
    if (password.trim() === "") {
        passwordError.textContent = "Password is required.";
        passwordError.style.color = "red";
        isValid = false;
    }

    return isValid;
}

function clearErrors() {
    const errors = document.querySelectorAll(".error");
    for (const error of errors) {
        error.textContent = "";
    }
}
</script>
</body>             
</html>
