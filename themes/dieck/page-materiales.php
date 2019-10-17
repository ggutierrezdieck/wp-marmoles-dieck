<!--file use to open single post -->

<?php
get_header();

//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main"class="notmobile">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-4 text-left">
			<?php
			if(have_posts()){
				//Working with the posts. or the single home page if static pageis selected under settings
				while(have_posts()) {// runs through all the posts
					the_post(); //ges info about next posts ready
					echo "<h2>";
					the_title();
					echo "</h2>";
					the_content();
				}
			}
			?>
		</div>
	</div>
	<div class="row space"></div>
	<!--AREA DE MATERIALES-->
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8" style="padding:0;">

				<?php
				$materiales=new WP_Query(array(
					'posts_per_page'=> -1,
					'post_type'=>'Materiales',
					'order_by'=>'title',
					'order'=>'ASC',
				));
				$count=0;
				if($materiales->have_posts()){
					while($materiales->have_posts()){
						$materiales->the_post();
										echo '<div class="row" style="margin: 2em 0;">';
						if($count%2==0){
							?>
							<div class="col-sm-6" style="margin-bottom: 3em;">
								<a href="<?php the_permalink();?>">
									<div class="polaroid thumb-mat">
										<div class="thumb-mat" style="background: url('<?php the_post_thumbnail_url() ?>');background-size: cover;"></div>
										<div class="container th-red polaroid">
											<p>Conocer más</p>
										</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6">
								<a href="<?php the_permalink();?>">
									<h3 class="align-left"><?php the_title(); ?></h3>
									<p class="align-left">
										<?php echo get_the_content(''); ?>
									</p>
								</a>
							</div>
							<?php
						}else{
							?>
							<div class="col-sm-6">
								<a href="<?php the_permalink();?>">
									<h3 class="align-left"><?php the_title(); ?></h3>
									<p class="align-left">
										<?php echo get_the_content(''); ?>
									</p>
								</a>
							</div>
							<div class="col-sm-6"style="margin-bottom: 3em;">
								<a href="<?php the_permalink();?>">
									<div class="polaroid thumb-mat">
										<div class="thumb-mat" style="background: url('<?php the_post_thumbnail_url() ?>');background-size: cover;"></div>
										<div class="container th-red polaroid">
											<p>Conocer más</p>
										</div>
									</div>
								</a>
							</div>
							<?php
						}
						echo '</div>';
						$count=$count+1;

					}
				}
				wp_reset_postdata();
				?>

		</div>
		<div class="col-sm-2"></div>
	</div>
		<div class="row space"></div>
	<div class="row space"></div>
			<div class="row space"></div>

</div>
<div class="mobile">
	<?php
	if($materiales->have_posts()){
		while($materiales->have_posts()){
			$materiales->the_post();
				?>
				<div class="row" style="margin-bottom: 3em;">
					<a href="<?php the_permalink();?>" style="width:100%">
						<div class="polaroid thumb-mat">
							<div class="thumb-mat" style="background: url('<?php the_post_thumbnail_url() ?>');background-size: cover;"></div>
							<div class="container th-red polaroid">
								<p>Conocer más</p>
							</div>
						</div>
					</a>
				</div>
				<div class="row">
					<a href="<?php the_permalink();?>">
						<h3 class="align-left"><?php the_title(); ?></h3>
						<p class="align-left">
							<?php echo get_the_content(''); ?>
						</p>
					</a>
				</div>
				<?php
		}
	}
	?>
</div>

<?php

get_footer();
?>
