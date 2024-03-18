<?php
$title = "Profile";

$styles = [
    "profile"
];

$scripts = [];
?>

<?php ob_start(); ?>
<?php //include("navbar.php"); 
?>
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
            <form id="changePassword">
                <input type="password" placeholder="Old password" />
                <input type="password" placeholder="New password" />
                <input type="password" placeholder="New password again" />
                <button>Change password</button>
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
                    <td class="positive">+265$</td>
                    <td>25%</td>
                    <td>999+</td>
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
            <th>Result</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>2021.01.01</td>
            <td>Coinflip</td>
            <td>Win</td>
            <td>100</td>
        </tr>
        <tr>
            <td>2021.01.01</td>
            <td>Blackjack</td>
            <td>Lose</td>
            <td>5</td>
        </tr>
        <tr>
            <td>2021.01.01</td>
            <td>Coinflip</td>
            <td>Win</td>
            <td>1 544</td>
    </table>
</div>
<script>
    //script
</script>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>