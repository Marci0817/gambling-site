<?php
require_once("templates/auth.php");
require_once("./utils/Auth.php");

// Login
if (isset($_POST["login"])) {
    if (Auth::login($_POST["username"], $_POST["password"])) {
        header("Location: profile.php");
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}

// Register
if (isset($_POST["register"])) {
    if (Auth::register($_POST["username"], $_POST["password"], $_POST["password2"])) {
        header("Location: blackjack.php");
    } else {
        echo "<script>alert('Failed to register')</script>";
    }
}
