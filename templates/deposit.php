<?php
$styles = [
    "deposit"
];

$scripts = [
    "deposit" => ["defer"]
];
?>

<?php ob_start(); ?>
<div id="container">

</div>
<?php
$slot = ob_get_clean();
include("main.php");
?>
