<!--file use to open single post -->
<?php
/*
Template Name:General
*/
get_header();
//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main" class="align-left">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          ?>
          <!-- <h2 class="align-left"> <?php the_title(); ?></h2> -->
          <?php
          the_content();

        }
      }
      ?>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
<?php
get_footer();
?>
