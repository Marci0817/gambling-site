<?php
include("templates/profile.php");
include './utils/Auth.php';

if (isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['newPassword2'])) {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $newPassword2 = $_POST['newPassword2'];

    $result = Auth::changePassword($oldPassword, $newPassword, $newPassword2);
    echo "<script>alert('" + $result["text"] + "')</script>";
}
