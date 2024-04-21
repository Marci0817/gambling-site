<?php
require_once("./utils/HistoryRepo.php");

$allHistory = HistoryRepo::getHistory();
$gamePlayed = HistoryRepo::getGamePlayed();
$profit = HistoryRepo::getProfit();
$winRate = HistoryRepo::getWinRate();

require_once("templates/profile.php");
require_once("./utils/Auth.php");


if (isset($_POST['changePasswordSubmit'])) {
    $result = Auth::changePassword($_POST['oldPassword'], $_POST['newPassword'], $_POST['newPassword2']);
    echo "<script>alert('" . $result["text"] . "')</script>";
}
