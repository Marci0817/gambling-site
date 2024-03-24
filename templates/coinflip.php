<?php
$title = "Coin-flip";

$styles = [
    "coinflip",
];

$scripts = [
    "coinflip" => ["defer"],
];
?>
<?php ob_start(); ?>
<?php include("./templates/navbar.php"); ?>
<div id="coinFlip">
    <div id="coin">
        <div class="side-a"></div>
        <div class="side-b"></div>
    </div>
    <div id="hudContainer">
        <h1>CoinFlip</h1>
        <p>Choose heads or tails and flip the coin!</p>
        <input type="number" min="1" id="bet" placeholder="Bet amount" />
        <h3>Choose a side</h3>
        <div id="sides">
            <img src="/assets/coins/head.png" alt="Heads" id="head" class="icon" onclick="selectSide('head')" />
            <img src="/assets/coins/tail.png" alt="Tails" id="tail" class="icon" onclick="selectSide('tail')" />
        </div>
        <button onclick="flipCoin()">Flip the coin</button>
    </div>
</div>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>
