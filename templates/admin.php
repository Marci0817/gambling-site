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
    <p>asd</p>
</div>
<script>
    //script
</script>
<?php
$slot = ob_get_clean();
require_once("templates/main.php");
?>