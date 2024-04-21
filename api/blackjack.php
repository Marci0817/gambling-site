<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/UserRepo.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/BlackjackGame.php");

$req = json_decode(file_get_contents("php://input"), true);


$game = null;

if (isset($_SESSION["currentBlackjackGame"])) {
    $game = unserialize($_SESSION["currentBlackjackGame"]);
} else if ($req != null) {
    $bet = $req["bet"];
    if (UserRepo::subtractBalance($bet)) {
        $game = new BlackjackGame($bet);
    } else {
        die("nemjo");
    }
}

if ($game == null) {
    reply([
        "state" => "NONE",
    ]);
}

if (isset($req["action"])) {
    switch ($req["action"]) {
        case "hit":
            $game->hit();
            break;
        case "stand":
            $game->stand();
            break;
    }
}

$_SESSION["currentBlackjackGame"] = serialize($game);

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
        UserRepo::addUserBalance($game->getBet());
    } else {
        $state = "WIN";
        UserRepo::addUserBalance(UserRepo::mul($game->getBet(), "2"));
    }

    unset($_SESSION["currentBlackjackGame"]);
}

reply([
    "bet" => $game->getBet(),
    "dealerHand" => $game->getDealerHand(),
    "playerHand" => $game->getPlayerHand(),
    "state" => $state,
]);

function reply(array $body)
{
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($body);
    die();
}
