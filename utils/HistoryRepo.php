<?php
require_once(__DIR__ . '/ConnectionHandler.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");

class HistoryRepo
{
    public static function addHistory($game, $result, $amount)
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("INSERT INTO history (username, game, amount ) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_SESSION['username'], $game, $amount);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            return ["result" => true];
        }
        return ["result" => false];
    }

    public static function getHistory()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT * FROM history WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
