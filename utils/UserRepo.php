<?php

require_once(__DIR__ . '/ConnectionHandler.php');

class UserRepo
{

    public static function addUserBalane($balance)
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
}
