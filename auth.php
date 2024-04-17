<?php
include("templates/auth.php");
require("./utils/Auth.php");

// Login
if (isset($_POST["login"])) {
    echo "<script>alert('Invalid credentials')</script>";
    if (Auth::login($_POST["username"], $_POST["password"])) {
        header("Location: profile.php");
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}
