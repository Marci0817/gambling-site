<!doctype html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="gambling-site" />
    <meta name="keywords" content="gambling, site" />
    <meta name="author" content="Mihály Marcell, Nyéki Máté Gyula" />
    <title>gambling-site</title>
    <script src="/scripts/cards.js"></script>
    <script src="/scripts/navbar.js" defer></script>
    <link rel="stylesheet" href="/styles/global.css" />
    <link rel="stylesheet" href="/styles/landing.css" />
</head>

<body>
    <nav id="navbar">
        <div id="nav-content">
            <a href="/" class="title font-display">Grandle.</a>
            <a href="/auth.php" class="btn">Get started.</a>
        </div>
    </nav>
    <div id="tagline">
        <h1 class="font-display">
            The most <b>sophisticated</b><br />
            gambling experience.
        </h1>
        <div id="cards-overlay">
        </div>
    </div>
    <div class="section">
        <h2 class="font-display section-title">Blackjack</h2>
        <p>
            Try yourself in the most popular card game (after poker) of all
            time. The rules are simple, but the game is complex. Beat the
            dealer and win big!
        </p>
        <a href="/auth.php" class="btn section-cta">Get started.</a>
    </div>
</body>
<script>
    const cardsOverlay = document.getElementById('cards-overlay');

    cardsOverlay.appendChild(createCard(14, 's'));
    cardsOverlay.appendChild(createCard(8, 'c'));
    cardsOverlay.appendChild(createCard(3, 's'));
</script>

</html>
