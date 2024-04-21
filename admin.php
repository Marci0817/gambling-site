<?php
require_once("templates/admin.php");

if (!Auth::isUserAdmin()) {
    header("Location: /");
}
