<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php pageTitle(); ?> | <?php siteName(); ?></title>
    <style type="text/css">
    </style>
    <link rel='stylesheet' type='text/css' href="../web/styles.css" />
</head>
<body>
<div class="wrap">
    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <?php navMenu(); ?>
        </nav>
    </header>
    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent(); ?>
    </article>
    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>.<br><?php siteVersion(); ?></small></footer>
</div>
</body>
</html>