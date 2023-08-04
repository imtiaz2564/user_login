<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize the data (similar to the registration script)
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($password);

    // Read user data from the text file
    $file = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $validLogin = false;

    // Loop through each line in the file to check for matching email and password
    foreach ($file as $line) {
        list($savedEmail, $savedPassword) = explode(', ', $line);
        if ($savedEmail === "Email: $email" && $savedPassword === "Password: $password") {
            $validLogin = true;
            break;
        }
    }

    // Display the appropriate message based on the login status
    if ($validLogin) {
        echo "Login successful! Welcome, $email.";
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>
