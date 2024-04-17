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
