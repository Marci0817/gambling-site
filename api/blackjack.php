<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/BlackjackGame.php");

$game = new BlackjackGame("gabi", "1501.23");
$game->hit();
$game->stand();

$state = "ONGOING";

if ($game->isOver()) {
    $playerBust = $game->getPlayerHandValue() > 21;
    $dealerBust = $game->getDealerHandValue() > 21;
    $draw = $game->getDealerHandValue() == $game->getPlayerHandValue();
    $dealerHandHigher = $game->getDealerHandValue() > $game->getPlayerHandValue();

    if ($playerBust || ($dealerHandHigher && !$dealerBust)) {
        $state = "LOSE";
    } elseif ($draw) {
        $state = "DRAW";
    } else {
        $state = "WIN";
    }
}


header("Content-Type: application/json; charset=utf-8");
echo json_encode([
    "dealerHand" => $game->getDealerHand(),
    "playerHand" => $game->getPlayerHand(),
    "state" => $state,
]);
die();
