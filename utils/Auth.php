<?php

require_once(__DIR__ . '/ConnectionHandler.php');
session_start();

class Auth
{

    public static function login($username, $password): bool
    {
        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    public static function register($username, $password, $password2): bool
    {
        if ($password !== $password2) {
            return false;
        }

        $conn = ConnectionHandler::getConnection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            return false;
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();

        $_SESSION['username'] = $username;
        return true;
    }

    public static function changePassword($oldPassword, $newPassword, $newPassword2)
    {
        if ($newPassword !== $newPassword2) {
            return ["result" => false, "text" => "Passwords do not match"];
        }

        if (strlen($newPassword) < 8) {
            return ["result" => false, "text" => "Password must be at least 8 characters long"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($oldPassword, $user['password_hash'])) {
            $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE username = ?");
            $stmt->bind_param("ss", $hashed_password, $_SESSION['username']);
            $stmt->execute();
            return ["result" => true, "text" => "Password changed successfully"];
        }
        return ["result" => false, "text" => "Something went wrong"];
    }

    public static function logout(): void
    {
        session_destroy();
        header('Location: /');
    }
}
