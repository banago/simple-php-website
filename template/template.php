<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title><?php page_title(); ?></title>
    <link href="<?php site_url(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
	<link href="<?php site_url(); ?>/css/style.css" rel="stylesheet" type="text/css" /> 
	<script src="<?php site_url(); ?>/js/jquery.min.js"></script>
	<script src="<?php site_url(); ?>/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

	<div class="sidebar text-white">
		<h1 style="padding: 0px 10px; text-align: center;"><?php site_name(); ?></h1><hr/>
		<?php sidebar_menu(); ?>
	</div>

    <div class="main">
        <?php page_content(); ?>
    </div>
	
	<div class="footer bg-light text-dark">
		<small>&copy;<?php echo date('Y'); ?> <?php batch_name(); ?>.<br><?php trainer_name(); ?></small>
	</div>
	
</div>
</body>
</html>