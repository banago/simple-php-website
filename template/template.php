<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php pageTitle(); ?> | <?php siteName(); ?></title>
    <style type="text/css">
    </style>
    <link rel='stylesheet' type='text/css' href="../web/styles.css" >
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
<div class="wrap">
    <header>
        <h3 id="site-title"><?php siteName(); ?></h3>
        <nav class="menu"><?php navMenu(); ?> </nav>
    </header>

    <article>
        <h3 id="title"><?php pageTitle(); ?></h3>
        <div id="page-content"><?php pageContent(); ?></div>
    </article>

    <footer>
        <div id="copy-right">&copy;<?php echo date('Y'); ?> <?php siteName(); ?>.<br><?php siteVersion(); ?></div>
    </footer>
</div>
</body>
</html>