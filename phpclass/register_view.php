<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="register">
    <div class="container">
        <h2>User Registration</h2>
        <form action="register.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>