<?php
require_once(__DIR__ . '/UserRepo.php');

class CoinFlip
{
    public static function flipCoin($selectedSide, $bet)
    {
        $random = rand(0, 10);
        $side = "";
        if ($random % 2 == 0) {
            $side = "head";
        } else {
            $side = "tail";
        }

        if ($selectedSide == $side) {
            UserRepo::addUserBalane($bet);
            return json_encode(["result" => "win", "prize" => $bet * 2, "side" => $side]);
        }

        UserRepo::addUserBalane($bet * -1);
        return json_encode(["result" => "lose", "prize" => 0, "side" => $side]);
    }
}
