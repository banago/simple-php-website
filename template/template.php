<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php pageTitle(); ?> | <?php siteName(); ?></title>
    <style type="text/css">
        .wrap { max-width: 720px; margin: 50px auto; padding: 30px 40px; text-align: center; box-shadow: 0 4px 25px -4px #9da5ab; }
        article { text-align: left; padding: 40px; line-height: 150%; }
    </style>
</head>
<body>
<div class="wrap">

    <header>
        <h1 class="site-name"><?php siteName(); ?></h1>
        <nav class="menu">
            <?php navMenu(); ?>
        </nav>
    </header>

    <article>        
        <?php pageContent(); ?>
    </article>

    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>.<br><?php siteVersion(); ?></small></footer>

</div>
</body>
</html>
