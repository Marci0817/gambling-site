<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="gambling-site" />
    <meta name="keywords" content="gambling, site" />
    <meta name="author" content="Mihály Marcell, Nyéki Máté Gyula" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles/global.css">
    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="/styles/<?= $style ?>.css">
    <?php endforeach; ?>

    <?php foreach ($scripts as $script => $opts) : ?>
        <script src="/scripts/<?= $script ?>.js" <?= implode(" ", $opts); ?>></script>
    <?php endforeach; ?>

    <!-- Navbar dependencies -->
    <script src="/scripts/navbar.js" defer></script>
    <link rel="stylesheet" href="/styles/navbar.css">
</head>

<body>
    <?php include("./templates/navbar.php"); ?>
    <?= $slot ?>
</body>

</html>