<?php
include 'connectToDb.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Authenticate the user against the database
    $result = $conn->query("SELECT password FROM admins WHERE username = '$username'");
    $pass = $result->fetch_assoc();

    if ($pass && $pass['password'] == $password) {
        $_SESSION["username"] = $username;
        header("location:dash.php");
    } else {
        echo "Incorrect Credentials. Please <a href='login.php'>try again.</a>";
    }
    $conn->close();
}