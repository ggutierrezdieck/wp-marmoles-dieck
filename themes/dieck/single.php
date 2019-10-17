
<?php
get_header();



//Working with the posts. or the single home page if static pageis selected under settings
while(have_posts()) {// runs through all the posts
  the_post(); //ges info about next posts ready
  //We exit an enter php to combin use of php with html
  ?>
  <h2> <?php the_title(); ?></h2>
  <?php the_content(); ?>
  <img src="<?php the_post_thumbnail_url() ?>">
  <?php
}

get_footer();
?>
