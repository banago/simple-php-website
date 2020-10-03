<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php page_title();?> | <?php site_name();?></title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?php site_url();?>/template/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="wrap">
        <header>
            <div class="row">
                <div class="col s12">
                    <?php social_icons()?>
                </div>
            </div>
            <h1><?php site_name();?></h1>
            <nav class="menu nav-wrapper">
                <?php nav_menu();?>
                </ul>
            </nav>
        </header>

        <article>
            <h2><?php page_title();?></h2>
            <?php page_content();?>
        </article>

        <footer>
            <div class="footer-copyright">
                <div class="container">
                    &copy;<?php echo date('Y'); ?> <?php site_name();?><br />
                    <small><?php site_version();?></small>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>