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
    <h2>Hi, username</h2>
    <p>Balance: 1000</p>
    <h2>Change your password</h2>
    <form id="changePassword">
        <input type="password" placeholder="Old password" />
        <input type="password" placeholder="New password" />
        <input type="password" placeholder="New password again" />
        <button>Change password</button>
    </form>

    <div id="stats">
        <h2>Statistics</h2>
        <p>Profit</p>
        <p>Winrate</p>
        <p>Games played</p>
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
        </table>
    </div>
</div>
<script>
    //script
</script>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>