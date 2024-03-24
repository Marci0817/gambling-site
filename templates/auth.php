<?php
$title = "Login register page";

$styles = [
    "auth"
];

$scripts = [
    "auth" => ["defer"]
];
?>

<?php ob_start(); ?>
<div class="">
    <form id="loginForm" action="/auth.php" method="post">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username" required autocomplete="username" />
        <input type="password" name="password" placeholder="Password" required autocomplete="current-password" />
        <button class="btn" type="submit" name="login">Login</button>
        <p class="note">
            Are you not registered yet?
            <button type="button" class="reset-btn" onclick="selectForm('register')">
                Register
            </button>
        </p>
    </form>

    <form id="registerForm" action="/auth.php" method="post" class="hidden">
        <h1>Register</h1>
        <input type="text" name="username" placeholder="Username" required autocomplete="username" />
        <input type="password" name="password" placeholder="Password" required autocomplete="new-password" />
        <input type="password" name="password2" placeholder="Password again" required autocomplete="new-password" />
        <button class="btn" type="submit" name="register">
            Register
        </button>
        <p class="note">
            Do you have an account?
            <button type="button" class="reset-btn" onclick="selectForm('login')">
                Login
            </button>
        </p>
    </form>
</div>
<?php
$slot = ob_get_clean();
include("templates/main.php");
?>
