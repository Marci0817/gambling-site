<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/utils/Auth.php");

if (!isset($_SESSION["username"]) && $_SERVER["REQUEST_URI"] !== "/index.php" && $_SERVER["REQUEST_URI"] !== "/") {
    header("Location: /auth.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /');
    //Auth::logout();
}
?>
<nav id="navbar">
    <div id="nav-content">
        <a href="/" class="title font-display">Grandle.</a>
        <div class="right">
            <?php if (isset($_SESSION["username"])) { ?>
                <a href="/blackjack.php">Blackjack</a>
                <a href="/coinflip.php">Coin-flip</a>
                <a href="/deposit.php" class="deposit btn">Deposit</a>
                <div class="profile">
                    <img src="/assets/profile.jpg" alt="avatar">
                    <a href="/profile.php" class="viewProfile">
                        <p id="username"><?php echo $_SESSION["username"] ?></p>
                        <p id="balance">0 $</p>
                        <form method="POST" action="">
                            <input type="submit" id="logout" value="logout" name="logout" class="reset-btn" />
                        </form>
                    </a>
                </div>
            <?php } else { ?>
                <a href="/auth.php">Get started.</a>
            <?php } ?>
        </div>
    </div>
</nav>
