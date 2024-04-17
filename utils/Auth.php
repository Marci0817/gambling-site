<?php

require_once(__DIR__ . '/ConnectionHandler.php');
session_start();

class Auth
{

    public static function login($username, $password)
    {
        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {
            $_SESSION["username"] = $username;
            return true;
        }
        return false;
    }
}
