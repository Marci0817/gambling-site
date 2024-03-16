<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="gambling-site" />
    <meta name="keywords" content="gambling, site" />
    <meta name="author" content="Mihály Marcell, Nyéki Máté Gyula" />
    <title>CoinFlip</title>

    <link rel="stylesheet" href="/styles/global.css" />
    <link rel="stylesheet" href="/styles/coinflip.css" />

    <script src="/scripts/coinflip.js" defer></script>
</head>

<body>
    <div id="coinFlip">
        <div id="imageContainer">
            <img src="/assets/coins/head.png" id="flipHead" />
        </div>
        <div id="hudContainer">
            <h1>CoinFlip</h1>
            <p>Choose heads or tails and flip the coin!</p>
            <input type="number" min="1" id="bet" placeholder="Bet amount" />
            <h3>Choose a side</h3>
            <div id="sides">
                <img src="/assets/coins/head.png" id="head" class="icon" onclick="selectSide('head')" />
                <img src="/assets/coins/tail.png" id="tail" class="icon" onclick="selectSide('tail')" />
            </div>
            <button onclick="flipCoin()">Flip the coin</button>
        </div>
    </div>
</body>

</html>