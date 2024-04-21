<?php
require_once(__DIR__ . '/ConnectionHandler.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");

class HistoryRepo
{
    public static function addHistory($game, $amount)
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
        $stmt = $conn->prepare("SELECT * FROM history WHERE username = ? ORDER BY timestamp DESC LIMIT 50");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getGamePlayed()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as gamePlayed FROM history WHERE username = ?");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc()["gamePlayed"];
    }

    public static function getProfit()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT SUM(amount) as profit FROM history WHERE username = ? AND LOWER(game) != 'deposit'");
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return  $result->fetch_assoc()["profit"];
    }

    public static function getWinrate()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT ROUND((win.count / total.count) * 100) AS winrate FROM (select count(*) as count from history where username = ? AND amount > 0) win, (select count(*) as count from history where username = ?) total");
        $stmt->bind_param("ss", $_SESSION['username'], $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc()["winrate"];
    }

    public static function getGamesPlayed()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT game, count(*) AS games_played FROM history GROUP BY game");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getCasinoStats()
    {
        if (ConnectionHandler::getConnection() == null) {
            return ["result" => false, "error" => "Database connection failed"];
        }

        $conn = ConnectionHandler::getConnection();
        $stmt = $conn->prepare("SELECT userInfo.allUser ,balanceInfo.allBalance, totalProfit.casinoProfit, totalDepo.allDeposit FROM (SELECT COUNT(*) as allUser FROM users) userInfo, (SELECT SUM(balance) as allBalance FROM users) balanceInfo, (SELECT SUM(amount)*-1 as casinoProfit FROM history WHERE LOWER(game) != 'deposit') totalProfit, (SELECT SUM(amount) as allDeposit FROM history WHERE LOWER(game) = 'deposit') totalDepo");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
