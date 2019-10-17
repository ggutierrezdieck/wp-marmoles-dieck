<!--file use to open single post -->

<?php
get_header();

//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-4 text-left">
			<h2>Servicios</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">


				<?php
				$servicios=new WP_Query(array(
					'posts_per_page'=> -1,
					'post_type'=>'Servicios',
					'order_by'=>'title',
					'order'=>'ASC',
				));
				$count=0;
				if($servicios->have_posts()){
					while($servicios->have_posts()){
						$servicios->the_post();



								if($count%2==0){
									?>
									<div class="row">

					 		  <div class="col-sm-6 td-img">
					 		  <div class="row  ">
					 			<div class="col-sm-12">
									<div class="polaroid">
										<div class="thumb-serv" style="background: url('<?php the_post_thumbnail_url() ?>');background-size: cover;"></div>
									</div>
					 		   </div>
					 		   </div>
					 		   </div>
					 		   <div class="col-sm-6 td-grey">
					 		  <div class="row ">
					 			<div class="col-sm-12" style="padding: 6em 2em;">
									<h3 class="align-left"><?php the_title(); ?></h3>
									<p class="align-left">
										<?php echo get_the_content(); ?>
									</p>
					 		   </div>
					 		   </div>
					 			</div>

					 		   </div>
									<?php
								}else {
									?>
					 	     <div class="row">
					 		 <div class="col-sm-6 td-white">
					 		  <div class="row ">
					 			<div class="col-sm-12" >
									<h3 class="align-left"><?php the_title(); ?></h3>
									<p class="align-left">
																		<?php echo get_the_content(); ?>
									</p>
					 		   </div>
					 		   </div>
					 			</div>
					 		  <div class="col-sm-6 td-img">
					 		  <div class="row  ">
					 			<div class="col-sm-12">
									<div class="polaroid">
										<div class="thumb-serv" style="background: url('<?php the_post_thumbnail_url() ?>');background-size: cover;"></div>
									</div>
					 		   </div>
					 		   </div>
					 		   </div>


					 		   </div>

									<?php
								}
						$count=$count+1;
					}
				}
				wp_reset_postdata();
				?>
		</div>
		<div class="col-sm-2"></div>
	</div>
	<div class="row space"></div>

</div>
<!-- Google captcha script-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
jQuery("#submit").click(function(e){
	var data_2;
	jQuery.ajax({
		type: "POST",
		url: "<?php echo get_theme_file_uri("/google_captcha.php"); ?>",
		data: jQuery('#commentform').serialize(),
		async:false,
		success: function(data) {
			if(data.nocaptcha==="true") {
				data_2=1;
			} else if(data.spam==="true") {
				data_2=1;
			} else {
				data_2=0;
			}
		}
	});
	if(data_2!=0) {
		e.preventDefault();
		if(data_2==1) {
			alert("Please check the captcha");
		} else {
			alert("Please Don't spam");
		}
	} else {
		jQuery("#commentform").submit
	}
});
</script>
<?php

get_footer();
?>
