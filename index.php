<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php siteName(); ?> <?php siteVersion() ?> | <?php pageTitle(); ?></title>
    <style type="text/css">
        .wrap { max-width: 700px; margin: 50px auto; padding: 30px; text-align: center; box-shadow: 0 0 5px rgba(0,0,0,.5); }
        article { text-align: left; padding: 40px; }
    </style>
</head>
<body>
<div class="wrap">

    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <a href="/" title="Home">Home</a> |    
            <a href="/?page=by-ise">ISE</a> |
            <a href="/?page=by-prime">PRIME</a> |
            <a href="/?page=by-dev-ise">Dev ISE</a> |
            <a href="/?page=by-dev-prime">Dev PRIME</a> |
            <a href="/?page=by-dev-apic">Dev APIC</a>
        </nav>
    </header>    

    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent(); ?>
    </article>

    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>. All rights reserved.<?php siteVersion(); ?></small></footer>
</div>
</body>
</html>
