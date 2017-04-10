<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php siteName(); ?> <?php siteVersion() ?> | <?php pageTitle(); ?></title>
    <style type="text/css">
        .wrap { max-width: 700px; margin: 50px auto; padding: 30px; text-align: center; box-shadow: 0 0 5px rgba(0,0,0,.5); }
        article { text-align: left; padding: 40px; }
        .container {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
        }

        .container a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            cursor: pointer;
            font-size: 16px;    
            border: none;
            outline: none;
            color: white;
            padding: 10px 16px;
            background-color: inherit;
        }

        .container a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>
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
                <div class="dropdown_1">
                    <button class="dropbtn" onclick="myFunction(1)">DEV</button>
                    <div class="dropdown-content" id="myDropdown_1">
                        <a href="/?page=by-dev-ise">Dev ISE</a>
                        <a href="/?page=by-dev-prime">Dev PRIME</a>
                        <a href="/?page=by-dev-apic">Dev APIC</a>    
                    </div>               
                </div>
                <div class="dropdown_2">
                    <button class="dropbtn" onclick="myFunction(2)">DEV</button>
                    <div class="dropdown-content" id="myDropdown_2">
                        <a href="/?page=by-dev-ise">Dev ISE2</a>
                        <a href="/?page=by-dev-prime">Dev PRIME2</a>
                        <a href="/?page=by-dev-apic">Dev APIC2</a>    
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
    if (d1 = 1) {
        document.getElementById("myDropdown_1").classList.toggle("show");
    }else if (d1 = 2) {
        document.getElementById("myDropdown_2").classList.toggle("show");
    }
    
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown_1 = document.getElementById("myDropdown_1");
    var myDropdown_2 = document.getElementById("myDropdown_2");
      if (myDropdown_1.classList.contains('show')) {
        myDropdown_1.classList.remove('show');
      }else if (myDropdown_2.classList.contains('show')) {
          myDropdown_2.classList.remove('show');
      }
  }
}
</script>
</body>
</html>
