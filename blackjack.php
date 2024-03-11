<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="gambling-site" />
        <meta name="keywords" content="gambling, site" />
        <meta name="author" content="Mihály Marcell, Nyéki Máté Gyula" />
        <title>Blackjack</title>

        <link rel="stylesheet" href="styles/global.css" />
        <link rel="stylesheet" href="styles/blackjack.css" />

        <script src="scripts/blackjack.js" defer></script>
    </head>

    <body>
        <label for="soundOnOff">Sounds on</label>
        <input type="checkbox" name="soundOnOff" id="soundOnOff" checked />
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
                    <img src="./assets/cards/cardback.webp" />
                    <img src="./assets/cards/cardback.webp" />
                </div>
            </div>

            <div id="playerBoard">
                <div id="playerCardHud">
                    <p id="playerCardCount">11</p>
                </div>
                <div id="playerCardBoard">
                    <img src="./assets/cards/cardback.webp" />
                    <img src="./assets/cards/cardback.webp" />
                </div>
                <div>
                    <p id="playerChips">0</p>
                </div>
            </div>
        </div>

        <div class="bottomHud">
            <div class="coins">
                <img
                    src="./assets/coins/1.webp"
                    alt="1 coin"
                    onclick="addCredit(1)"
                    title="1 credit"
                />
                <img
                    src="./assets/coins/5.webp"
                    alt="5 coin"
                    onclick="addCredit(5)"
                    title="5 credit"
                />
                <img
                    src="./assets/coins/10.webp"
                    alt="10 coin"
                    onclick="addCredit(10)"
                    title="10 credit"
                />
                <img
                    src="./assets/coins/25.webp"
                    alt="25 coin"
                    onclick="addCredit(25)"
                    title="25 credit"
                />
                <br />
                <img
                    src="./assets/coins/100.webp"
                    alt="100 coin"
                    onclick="addCredit(100)"
                    title="100 credit"
                />
                <img
                    src="./assets/coins/1000.webp"
                    alt="1000 coin"
                    onclick="addCredit(1000)"
                    title="1000 credit"
                />
                <img
                    src="./assets/coins/5000.webp"
                    alt="5000 coin"
                    onclick="addCredit(5000)"
                    title="5000 credit"
                />
                <img
                    src="./assets/coins/10000.webp"
                    alt="10000 coin"
                    onclick="addCredit(10000)"
                    title="10000 credit"
                />
            </div>
        </div>
    </body>
</html>
