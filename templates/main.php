<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="gambling-site" />
    <meta name="keywords" content="gambling, site" />
    <meta name="author" content="Mihály Marcell, Nyéki Máté Gyula" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles/global.css">
    <script src="/scripts/render.js"></script>
    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="/styles/<?= $style ?>.css">
    <?php endforeach; ?>

    <?php foreach ($scripts as $script => $opts) : ?>
        <script src="/scripts/<?= $script ?>.js" <?= implode(" ", $opts); ?>></script>
    <?php endforeach; ?>
</head>

<body>
    <?= $slot ?>
</body>

</html>
