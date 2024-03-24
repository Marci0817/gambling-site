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
<?php include("./templates/navbar.php"); ?>
<div id="container">

</div>
<?php
$slot = ob_get_clean();
include("main.php");
?>
