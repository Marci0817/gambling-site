<?php
$title = "Blackjack";

$styles = [
    "blackjack",
];

$scripts = [
    "cards" => [],
    "blackjack" => ["defer"],
];
?>

<?php ob_start(); ?>
<?php require_once("./templates/navbar.php"); ?>
<div id="container">
    <div id="settings">
        <input type="checkbox" name="soundOnOff" id="soundOnOff" checked />
        <label for="soundOnOff">Sounds on</label>
    </div>
    <div id="table">
        <div id="dealerBoard">
            <div id="dealerCardBoard">

            </div>
        </div>

        <div id="playerBoard">

            <div id="playerCardBoard">

            </div>
            <div>
                <p id="playerChips">0</p>
            </div>
        </div>
    </div>
    <div id="playerInteractionHud">
        <div id="startButton" class="hidden">
            <button class="startButton" onclick="startNewGame()">
                Start to play
            </button>
        </div>
        <div id="playerInteractions" class="hidden">
            <button onclick="playerAction('hit')" class="hit">Hit</button>
            <button onclick="playerAction('stand')" class="stand">
                Stand
            </button>
        </div>
    </div>
    <div id="bottomHud">
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
    <div id="endScreen" class="hidden">
        <div>
            <h1 id="endTitle"></h1>
            <p id="endDescription"></p>
            <button onclick="location.reload()" class="btn">Play again?</button>
        </div>
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
require_once("templates/main.php");
?>