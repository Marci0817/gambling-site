<?php

$title = "Deposit";

$styles = [
    "deposit"
];

$scripts = [
    "deposit" => ["defer"]
];
?>

<?php ob_start(); ?>
<?php require_once("./templates/navbar.php"); ?>
<div id="container">
    <div id="bubble-template" class="bubble">
        <p class="value"></p>
        <input type="text" />
    </div> 
</div>
<?php
$slot = ob_get_clean();
require_once("main.php");
?>
