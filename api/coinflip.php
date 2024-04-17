<?php
include("../utils/CoinflipGame.php");

if (isset($_POST['side']) && $_POST['bet']) {
    $selectedSide = $_POST['side'];
    $bet = $_POST['bet'];

    $side = CoinFlip::flipCoin($selectedSide, $bet);

    echo $side;
}
