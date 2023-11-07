<?php
include 'connectToDb.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the passwords match
    if ($password != $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    // Insert the data into the database
    $q = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $q);

    echo "User Registration Successful. <a href='login.php'>Login here.</a>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form method="post" class="needs-validation">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <div class="text-center">
                    <p>Already a member? <a href="login.php">Login here</a></p>
                </div>
        </form>
    </div>
</body>

</html>