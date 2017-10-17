<?php $functions = new Functions(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php $functions->pageTitle(); ?> | <?php $functions->siteName(); ?></title>
    <style type="text/css">
    </style>
    <link rel='stylesheet' type='text/css' href="../web/styles.css" />
</head>
<body>
<div class="wrap">
    <header>
        <h2><?php $functions->siteName(); ?></h2>
        <nav class="menu">
            <?php $functions->navMenu(); ?>
        </nav>
    </header>
    <article>
        <h3><?php $functions->pageTitle(); ?></h3>
        <?php $functions->pageContent(); ?>
    </article>
    <footer><small>&copy;<?php echo date('Y'); ?> <?php $functions->siteName(); ?>.<br><?php $functions->siteVersion(); ?></small></footer>
</div>
</body>
</html>