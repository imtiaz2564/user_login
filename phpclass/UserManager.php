<?php
class UserManager
{
    private $dataFile = 'users.txt';

    public function register($email, $password)
    {
        // Validate and sanitize the data (similar to the registration script)
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($password);

        if (!$email) {
            return 'Invalid email format';
        }

        // Save the user data in a text file
        $data = "Email: $email, Password: $password\n";
        $file = fopen($this->dataFile, 'a'); // Open the file in append mode
        fwrite($file, $data);
        fclose($file);

        return 'Registration successful!';
    }

    public function login($email, $password)
    {
        // Validate and sanitize the data (similar to the login script)
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($password);

        if (!$email) {
            return 'Invalid email format';
        }

        // Read user data from the text file
        $file = file($this->dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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
            return "Login successful! Welcome, $email.";
        } else {
            return 'Invalid email or password. Please try again.';
        }
    }
}
?>
