<?php
//Add styles and scipts
function config_files(){
  wp_enqueue_style('font-awsome','https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i&display=swap');
  wp_enqueue_style('font-awsome2','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');



  // adding bootstrap
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
  //adding personal styles.css
  wp_enqueue_style('style.css',get_template_directory_uri().'/style.css');


  // if (is_page('nosotros')){
  //   wp_enqueue_style('style-nosotros.css',get_template_directory_uri().'/css/style-nosotros.css');
  // }elseif (is_page('soluciones')){
  //   wp_enqueue_style('style-soluciones.css',get_template_directory_uri().'/css/style-soluciones.css');
  // }else{
  //   wp_enqueue_style('style-home.css',get_template_directory_uri().'/css/style-home.css');
  // }
}

add_action('wp_enqueue_scripts','config_files');

//Add some features to the theme
function theme_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support( 'custom-background');
}

add_action('after_setup_theme','theme_features');


/*Add Google captcha field to Comment form*/
function add_google_captcha(){
    echo '<div class="g-recaptcha" data-sitekey= "=== Your site key === "></div>';
}

add_filter('comment_form','add_google_captcha');
