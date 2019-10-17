<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, intial-scale=1">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <div class="menu-hamburger">
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div id="header" class="header">
    <div class="row space" style="background:trasnparent"></div>
    <div class="row" style="background: rgba(256,256,256,0.6);">
      <div class="col-sm-2"></div>
      <div class="col-sm-1"><a href="<?php echo site_url('/nosotros') ?>"><p class="p-header">NOSOTROS</p></a></div>
      <div class="col-sm-1"><a href="<?php echo site_url('/materiales') ?>"><p class="p-header">MATERIALES</p></a></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-2"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri('images/logos/02_logo basico.png');?>"></a></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"><a href="<?php echo site_url('/inspiracion') ?>"><p class="p-header">INSPIRACIÓN</p></a></div>
      <div class="col-sm-1"><a href="<?php echo site_url('/contacto') ?>"><p class="p-header">CONTACTO</p></a></div>
      <div class="col-sm-2"></div>
    </div>
    <div class="row gradient"></div>
    </div>
    <script>
    function myFunction() {
      var x = document.getElementById("header");
      if (x.className === "header") {
        x.className += " menu-visible";
      } else {
        x.className = "header";
      }
    }
    </script>
  </header>
