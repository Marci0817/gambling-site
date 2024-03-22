<?php
if (isset($_POST["toggleLogin"])) {
    if (isset($_SESSION["user"]))
        session_destroy($_SESSION["user"]);
    else
        $_SESSION["user"] = 1;
}
?>
<?php if (isset($_SESSION["user"])) { ?>
    <nav id="navbar">
        <div id="nav-content">
            <a href="/" class="title font-display">Grandle.</a>
            <a href="/auth.php" class="btn">Get started.</a>
        </div>
        <form action="" method="post">
            <?php echo isset($_SESSION["user"]) ? "logined" : "nem"; ?>
            <input type="submit" name="toggleLogin" value="Simulate login" />
        </form>
    </nav>
<?php } else { ?>
    <nav id="navbar">
        <div id="nav-content">
            <a href="/" class="title font-display">Grandle.</a>
            <a href="/auth.php" class="btn">Get started.</a>
        </div>
        <form action="" method="post">
            <?php echo isset($_SESSION["user"]) ? "logined" : "nem"; ?>
            <input type="submit" name="toggleLogin" value="Simulate login" />
        </form>
    </nav>
<?php } ?>