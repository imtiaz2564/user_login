<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize the data (you can add more validation checks as needed)

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format');
    }

    // Sanitize email and password to prevent basic injection attacks
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    // Save the user data in a text file
    $data = "Email: $email, Password: $password\n";
    $file = fopen('users.txt', 'a'); // Open the file in append mode
    fwrite($file, $data);
    fclose($file);

    // Send a message to the user
    $message = "Thank you for registering!\nYour email: $email";
    // You can use PHP's mail() function to send an email here, or display the message on the webpage.
    // However, note that sending emails from a local server might not work without proper configuration.

    // Display a simple confirmation message on the webpage (optional)
    echo "Registration successful!<br>$message";
}
?>
