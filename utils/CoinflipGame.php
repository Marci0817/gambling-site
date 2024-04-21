<?php
require_once(__DIR__ . '/UserRepo.php');
require_once(__DIR__ . '/HistoryRepo.php');

class CoinFlip
{
    public static function flipCoin($selectedSide, string $bet)
    {
        if (!UserRepo::subtractBalance($bet)) {
            return json_encode(["result" => "error", "message" => "You don't have enough balance to bet that amount"]);
        }

        $random = rand(0, 10);
        $side = "";
        if ($random % 2 == 0) {
            $side = "head";
        } else {
            $side = "tail";
        }

        if ($selectedSide == $side) {
            $prize = UserRepo::mul($bet, "2");
            UserRepo::addUserBalance($prize);
            HistoryRepo::addHistory("Coinflip", $bet);
            return json_encode(["result" => "win", "prize" => $prize, "side" => $side]);
        }

        HistoryRepo::addHistory("Coinflip", "-" . $bet);
        return json_encode(["result" => "lose", "prize" => 0, "side" => $side]);
    }
}
