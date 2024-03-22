<?php
$title = "Blackjack";

$styles = [
    "global",
    "blackjack",
];

$scripts = [
    "cards" => [],
    "blackjack" => ["defer"],
];
?>

<?php ob_start(); ?>
<div id="settings">
    <input type="checkbox" name="soundOnOff" id="soundOnOff" checked />
    <label for="soundOnOff">Sounds on</label>
</div>
<div id="playerInteractionHud">
    <div id="startButton">
        <button class="startButton" onclick="startNewGame()">
            Start to play
        </button>
    </div>
    <div id="playerInteractions" class="hidden">
        <button onclick="playerAction('hit')" class="hit">Hit</button>
        <button onclick="playerAction('stand')" class="stand">
            Stand
        </button>
        <button onclick="playerAction('double')" class="double">
            Double
        </button>
        <button onclick="playerAction('split')" class="split">
            Split
        </button>
    </div>
</div>
<div>
    <div id="dealerBoard">
        <div id="dealerCardBoard">

        </div>
    </div>

    <div id="playerBoard">
        <div id="playerCardHud">
            <p id="playerCardCount">11</p>
        </div>
        <div id="playerCardBoard">

        </div>
        <div>
            <p id="playerChips">0</p>
        </div>
    </div>
</div>

<div class="bottomHud">
    <button id="hideButton" class="hide" onclick="showCoins()">Hide coins</button>
    <div id="coinsHud" class="coins">
        <img src="/assets/coins/1.webp" alt="1 coin" onclick="addCredit(1)" title="1 credit" />
        <img src="/assets/coins/5.webp" alt="5 coin" onclick="addCredit(5)" title="5 credit" />
        <img src="/assets/coins/10.webp" alt="10 coin" onclick="addCredit(10)" title="10 credit" />
        <img src="/assets/coins/25.webp" alt="25 coin" onclick="addCredit(25)" title="25 credit" />
        <br />
        <img src="/assets/coins/100.webp" alt="100 coin" onclick="addCredit(100)" title="100 credit" />
        <img src="/assets/coins/1000.webp" alt="1000 coin" onclick="addCredit(1000)" title="1000 credit" />
        <img src="/assets/coins/5000.webp" alt="5000 coin" onclick="addCredit(5000)" title="5000 credit" />
        <img src="/assets/coins/10000.webp" alt="10000 coin" onclick="addCredit(10000)" title="10000 credit" />
    </div>
</div>
<script>
    /* Table initialization */
    for (let i = 0; i < 2; i++) {
        document.getElementById("playerCardBoard").appendChild(createCardBack());
        document.getElementById("dealerCardBoard").appendChild(createCardBack());
    }
</script>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>