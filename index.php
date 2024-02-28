<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!---Custom CSS File--->
    <link rel="stylesheet" href="style.css" />
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<section class="container">
    <header>Registration Form</header>
    <form action="registration.php" method="post" class="form" onsubmit="return validateForm()" autocomplete="off">
     

     
<div class="column">    
    <div class="input-box">
        <label for="first-name">First Name:</label>
        <input type="text" name="first-name" id="first-name" placeholder="First Name" required aria-labelledby="first-name-label first-name-error" />
        <span class="error" id="first-name-error" role="alert" aria-live="polite" aria-atomic="true"></span>
    </div>

    <div class="input-box">
        <label for="last-name">Last Name:</label>
        <input type="text"name="last-name" id="last-name" placeholder="Last Name" required aria-labelledby="last-name-label last-name-error" />
        <span class="error" id="last-name-error" role="alert" aria-live="polite" aria-atomic="true"></span>
    </div>
</div>
        <div class="column">
            <div class="input-box">
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" placeholder="Enter email address" required aria-labelledby="email-label email-error" />
                <span class="error" id="email-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
            <div class="input-box">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" placeholder="Enter phone number" required aria-labelledby="phone-label phone-error" />
                <span class="error" id="phone-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
            <div class="input-box">
                <label for="birth-date">Birth Date:</label>
                <input type="date" name="birth-date" id="birth-date" required aria-labelledby="birth-date-label birth-date-error" />
                <span class="error" id="birth-date-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
        </div>
        <div class="gender-box">
            <h3>Gender</h3>
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="check-male" name="gender" checked aria-labelledby="check-male-label gender-error" />
                    <label for="check-male" id="check-male-label">Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="gender" aria-labelledby="check-female-label gender-error" />
                    <label for="check-female" id="check-female-label">Female</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-other" name="gender" aria-labelledby="check-other-label gender-error" />
                    <label for="check-other" id="check-other-label">Prefer not to say</label>
                </div>
                <span class="error" id="gender-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
        </div>
        <div class="input-box address">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" placeholder="Enter street address" required aria-labelledby="address-label address-error" />
            <span class="error" id="address-error" role="alert" aria-live="polite" aria-atomic="true"></span>
        </div>
        <div class="column">
            <div class="input-box">
                <label for="password">Password:</label>
                <input type="password"  name="password" id="password" placeholder="Enter password" required aria-labelledby="password-label password-error" />
                <span class="error" id="password-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
        
            <div class="input-box">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" placeholder="Confirm password" required aria-labelledby="confirm-password-label confirm-password-error" />
                <span class="error" id="confirm-password-error" role="alert" aria-live="polite" aria-atomic="true"></span>
            </div>
        </div>
        
        <div class="button-container">
           
            <button style="background-color: rgba(255, 20, 20, 0.646);" type="button" onclick="clearForm()">Clear</button>
            <button style="background-color: rgba(25, 204, 25, 0.758);" type="submit">Submit</button>
          </div>
          
        
    </form>
</section>
<script>
    function validateForm() {
        // Reset error messages
        clearErrors();

        let isValid = true;

        // First Name
        const firstName = document.getElementById("first-name").value;
        const firstNameError = document.getElementById("first-name-error");
        const namePattern = /^[A-Za-z]+$/;
        if (!namePattern.test(firstName.trim())) {
            firstNameError.textContent = "Please enter a valid first name (letters only).";
            firstNameError.style.color = "red";
            isValid = false;
        }

        // Last Name
        const lastName = document.getElementById("last-name").value;
        const lastNameError = document.getElementById("last-name-error");
        if (!namePattern.test(lastName.trim())) {
            lastNameError.textContent = "Please enter a valid last name (letters only).";
            lastNameError.style.color = "red";
            isValid = false;
        }

         // Email
         const email = document.getElementById("email").value;
        const emailError = document.getElementById("email-error");
        const emailPattern = /^[a-zA-Z0-9._-]+@(gmail\.com|outlook\.com)$/;
        if (!emailPattern.test(email.trim())) {
            emailError.textContent = "Please enter a valid email address ending with @gmail.com or @outlook.com.";
            emailError.style.color = "red";
            isValid = false;
        }

        // Phone Number (Indian format)
        const phone = document.getElementById("phone").value;
        const phoneError = document.getElementById("phone-error");
        const phonePattern = /^[6-9]\d{9}$/;
        if (!phonePattern.test(phone.trim())) {
            phoneError.textContent = "Please enter a valid Indian phone number.";
            phoneError.style.color = "red";
            isValid = false;
        }

        // Address
        const address = document.getElementById("address").value;
        const addressError = document.getElementById("address-error");
        if (address.trim() === "") {
            addressError.textContent = "Address is required.";
            addressError.style.color = "red";
            isValid = false;
        }

 // Password
 const password = document.getElementById("password").value;
    const passwordError = document.getElementById("password-error");
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(password)) {
        passwordError.textContent = "Password must be at least 8 characters and include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
        passwordError.style.color = "red";
        isValid = false;
    }

    // Confirm Password
    const confirmPassword = document.getElementById("confirm-password").value;
    const confirmPasswordError = document.getElementById("confirm-password-error");
    if (password !== confirmPassword) {
        confirmPasswordError.textContent = "Passwords do not match.";
        confirmPasswordError.style.color = "red";
        isValid = false;
    }

    // ... (remaining validation code remains the same)

    return isValid;
}






    function clearForm() {
    const form = document.querySelector(".form"); // Use querySelector to select the form by class
    form.reset();
    clearErrors();
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
