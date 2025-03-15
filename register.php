<?php 
include("configure.php"); // Ensure this file exists and is correctly named

if(isset($_POST['submit'])){
    $username = $_POST['Username'];
    $email = $_POST['Email']; // Ensure form fields match variable names
    $age = $_POST['Age'];
    $password = $_POST['Password'];

    // Verifying if the email is unique
    $verify_query = mysqli_query($conn,"SELECT Email FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) != 0 ){
        echo "<div class='message'>
                  <p>This email is used, Try another One Please!</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        // Fixed variable names and removed the extra comma in INSERT INTO statement
        mysqli_query($conn, "INSERT INTO users (Username, Email, Age, Password) 
                             VALUES ('$username', '$email', '$age', '$password')") 
                             or die("Error Occurred");

        echo "<div class='message'>
                  <p>Registration successfully!</p>
              </div> <br>";
        echo "<script>window.location.href='signin.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registerlogin.css">
</head>
<body>
<div class="header">
    <h3>PeluangKarir</h3>
</div>

<div class="container">
    <div class="box">
        <div class="form-box">
            <header>Register</header>
            <div id="error-message" class="error-message"></div>
            <form action="register.php" method="post">
                <div class="field input">
                    <label for="Username">Username</label>
                    <input type="text" name="Username" id="Username" required>
                </div>

                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="email" name="Email" id="Email" required>
                </div>

                <div class="field input">
                    <label for="Age">Age</label>
                    <input type="number" name="Age" id="Age" required>
                </div>

                <div class="field input">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password" required>
                </div>

                <div class="field input">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>

                <div class="links">
                    Already have an account? <a href="signin.html">Sign In here</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    © 2025 PeluangKarir. All rights reserved.
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let errorMessage = "<?= $error_message ?? '' ?>";
        if (errorMessage) {
            document.getElementById("error-message").innerText = errorMessage;
        }
    });
</script>

</body>
</html>
