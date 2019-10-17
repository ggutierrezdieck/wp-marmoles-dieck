<!--file use to open single post -->

<?php
get_header();

//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main">
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-4 text-left">
					<?php
		      if (have_posts()) {
		        while (have_posts()) {
		          the_post();
		          echo '<h2  class="align-left" >' . get_the_title() . '</h2>';
		        }
		      }
					 wp_reset_postdata();
		      ?>
		</div>
		</div>
		<div class="row space"></div>
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-8">
						<div class="row">
							<?php
							$inspiracion=new WP_Query(array(
					      'posts_per_page'=> -1,
					      'post_type'=>'Inspiraciones',
					      'order_by'=>'title',
					      'order'=>'ASC',
					    ));
							$count=1;
							if($inspiracion->have_posts()){
					      while($inspiracion->have_posts()){
					        $inspiracion->the_post();
									?>
										<div class="col-sm-6 img-insp">
											<a href="<?php the_permalink() ?>">
												<div class="polaroid ">
												<div class="thumb-mat" style="background: url('<?php the_post_thumbnail_url(); ?>');background-size: cover;width: 100%;"></div>
												<div class="container cont-inspiracion th-red">
												<p style="margin:0;"><?php the_title();?></p>
												</div>
											</div>
										</a>
										</div>
										<?php
										if($count%2==0)	{
										 ?>
							</div>
							<div class="row space"></div>
								<div class="row">
									<?php
								}
								$count=$count+1;
								}
							}
						    wp_reset_postdata();
									?>


				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<div class="row space"></div>
	</div>
<?php

get_footer();
?>
