<?php

require_once("./utils/HistoryRepo.php");
require_once("./utils/UserRepo.php");
$leaderboard = UserRepo::getLeaderboard();
$gamesPlayed = HistoryRepo::getGamesPlayed();
$casinoStats = HistoryRepo::getCasinoStats()[0];

require_once("templates/admin.php");

if (!Auth::isUserAdmin()) {
    header("Location: /");
}
