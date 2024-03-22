<?php
$title = "fasz";

$styles = [
    "landing",
];

$scripts = [
    "cards" => [],
];
?>

<?php ob_start(); ?>
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
<script>
    const cardsOverlay = document.getElementById('cards-overlay');

    cardsOverlay.appendChild(createCard(14, 's'));
    cardsOverlay.appendChild(createCard(8, 'c'));
    cardsOverlay.appendChild(createCard(3, 's'));
</script>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>