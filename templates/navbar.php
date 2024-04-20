<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    //Auth::logout();
}
?>
<nav id="navbar">
    <div id="nav-content">
        <a href="/" class="title font-display">Grandle.</a>
        <div class="right">
            <a href="/blackjack.php">Blackjack</a>
            <a href="/coinflip.php">Coin-flip</a>
            <a href="/deposit.php" class="deposit btn">Deposit</a>
            <div class="profile">
                <img src="/assets/profile.jpg" alt="avatar">
                <a href="/profile.php" class="viewProfile">
                    <p><?php echo $_SESSION["username"] ?></p>
                    <p id="balance">0</p>
                    <form method="POST" action="">
                        <input type="submit" value="logout" name="logout" class="reset-btn" />
                    </form>
                </a>
            </div>
        </div>
    </div>
</nav>