<?php
$title = "Profile";

$styles = [
    "profile",
];

$scripts = [];
?>

<?php ob_start(); ?>
<?php require_once("./templates/navbar.php"); ?>
<div id="container">
    <div id="profileSection">
        <div id="userInformation">
            <img src="/assets/profile.jpg" alt="profile picture" />
            <div>
                <h1>Hi, <strong>Jhon Doe!</strong></h1>
                <p class="badge">Gambling aficionado</p>
            </div>
        </div>

        <div>
            <h2>Change your password</h2>
            <form id="changePassword" method="POST" action="">
                <input type="password" placeholder="Old password" id="oldPassword" name="oldPassword" />
                <input type="password" placeholder="New password" id="newPassword" name="newPassword" />
                <input type="password" placeholder="New password again" id="newPassword2" name="newPassword2" />
                <input type="submit" name="changePasswordSubmit" value="Change password" />
            </form>
        </div>
    </div>

    <div>
        <div id="statsContainer">
            <h2>Statistics</h2>

            <table id="stats">
                <tr>
                    <th>Profit</th>
                    <th>Winrate</th>
                    <th>Games played</th>
                </tr>
                <tr>
                    <td class=<?php echo $profit > 0 ? "positive" : "negative" ?>><?php echo "$ " . $profit  ?></td>
                    <td><?php echo $winRate . " %" ?></td>
                    <td><?php echo $gamePlayed ?></td>
                </tr>
            </table>

        </div>
    </div>
</div>
<div id="history">
    <h2>History</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Game</th>
            <th>Amount</th>
        </tr>
        <?php foreach ($allHistory as $history) { ?>
            <tr>
                <td><?php echo $history["timestamp"] ?></td>
                <td><?php echo $history["game"] ?></td>
                <td><?php echo $history["amount"] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<script>
    //script
</script>
<?php
$slot = ob_get_clean();
require_once("templates/main.php");
?>