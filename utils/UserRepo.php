<?php
require_once(__DIR__ . '/ConnectionHandler.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");

class UserRepo
{
    public static function mul(string $a, string $b): string {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT CAST(? AS DECIMAL(10,2)) * CAST(? AS DECIMAL(10,2)) AS res");
        $stmt->bind_param("ss", $a, $b);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc()["res"];
    }

    public static function addUserBalance($balance)
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("UPDATE users SET balance = balance + ? WHERE username = ?");
        $stmt->bind_param("ds", $balance, $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return ["result" => true];
        }
        return ["result" => false];
    }

    public static function getPlayerBalance(): string
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT balance FROM users WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc()['balance'];
    }

    public static function subtractBalance(string $amount): bool
    {
        $user = $_SESSION["username"];

        if (ConnectionHandler::getConnection() == null) {
            die("Database connection failed");
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("UPDATE USERS SET balance = balance - ? WHERE username = ? AND balance >= ?");
        $stmt->bind_param("sss", $amount, $user, $amount);
        
        return $stmt->execute() && $stmt->affected_rows == 1;
    }
}
