<?php
include("templates/auth.php");
require("./utils/Auth.php");

// Login
if (isset($_POST["login"])) {
    if (Auth::login($_POST["username"], $_POST["password"])) {
        echo "<script>alert('Yoo')</script>";
        header("Location: profile.php");
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}

// Register
if (isset($_POST["register"])) {
    if (Auth::register($_POST["username"], $_POST["password"], $_POST["password2"])) {
        echo "<script>alert('Registered successfully')</script>";
    } else {
        echo "<script>alert('Failed to register')</script>";
    }
}
