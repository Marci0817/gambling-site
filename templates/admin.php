<?php
$title = "Admin";

$styles = [
    "admin",
];

$scripts = [];
?>

<?php ob_start(); ?>
<?php require_once("./templates/navbar.php"); ?>
<div id="container">
    <div id="statsContainer">
        <div class="stats">
            <h2>Games played</h2>
            <table>
                <tr>
                    <th>Blackjack</th>
                    <th>Coinflip</th>
                    <th>Deposit</th>
                </tr>
                <tr>
                    <?php
                    foreach ($gamesPlayed as $key => $value) { ?>
                        <td><?php echo $value["games_played"] ?></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
        <div class="stats">
            <h2>Casino stats</h2>
            <table>
                <tr>
                    <th>All user</th>
                    <th>All user balance</th>
                    <th>Casino profit</th>
                    <th>All deposit</th>
                </tr>
                <tr>
                    <td><?php echo $casinoStats["allUser"] ?></td>
                    <td><?php echo $casinoStats["allBalance"] ?></td>
                    <td><?php echo $casinoStats["casinoProfit"] ?></td>
                    <td><?php echo $casinoStats["allDeposit"] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="history">
        <h2>Leaderboard</h2>
        <table>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Balance</th>
            </tr>
            <?php
            $rank = 1;
            foreach ($leaderboard as $entry) { ?>
                <tr>
                    <td><?php echo $rank++ ?></td>
                    <td><?php echo $entry["username"] ?></td>
                    <td><?php echo '$ ' . $entry["balance"] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    //script
</script>
<?php
$slot = ob_get_clean();
require_once("templates/main.php");
?>