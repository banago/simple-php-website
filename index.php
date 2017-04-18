<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php siteName(); ?> <?php siteVersion() ?> | <?php pageTitle(); ?></title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<div class="wrap">

    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <div class="container">
                <a href="/" title="Home">HOME</a>
                <a href="/?page=by-ise">ISE</a>
                <a href="/?page=by-prime">PRIME</a>
                <div class="dropdown">
                    <button class="dropbtn" onclick="myFunction(1)">DEV</button>
                    <div class="dropdown-content" id="myDropdown_1">
                        <a href="/?page=by-dev-ise">Dev ISE</a>
                        <a href="/?page=by-dev-authmain">Dev ISE Bypass</a>
                        <a href="/?page=by-dev-prime">Dev PRIME</a>
                        <a href="/?page=by-dev-apic">Dev APIC</a>    
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" onclick="myFunction(2)">UTILS</button>
                    <div class="dropdown-content" id="myDropdown_2">
                        <a href="/?page=by-dev-ise">N/A</a>
                        <a href="/?page=by-dev-prime">N/A</a>
                        <a href="/?page=by-dev-apic">N/A</a>    
                    </div>
                </div> 
            </div>
        </nav>
    </header>    

    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent(); ?>
    </article>

    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>. All rights reserved.<?php siteVersion(); ?></small></footer>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction(d1) {
    if (d1 == 1) {
        document.getElementById("myDropdown_1").classList.toggle("show");
        document.getElementById("myDropdown_2").classList.remove('show');
    } else if (d1 == 2) {
        document.getElementById("myDropdown_2").classList.toggle("show");
        document.getElementById("myDropdown_1").classList.remove('show');
    }
    
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown_1 = document.getElementById("myDropdown_1");
    var myDropdown_2 = document.getElementById("myDropdown_2");
      if (myDropdown_1.classList.contains('show')) {
          myDropdown_1.classList.remove('show');
      } else if (myDropdown_2.classList.contains('show')) {
          myDropdown_2.classList.remove('show');
      }
  }
}
</script>
</body>
</html>
