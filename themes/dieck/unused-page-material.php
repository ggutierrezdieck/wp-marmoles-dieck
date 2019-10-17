<!--file use to open single post -->

<?php
get_header();

//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main">
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-4 text-left">
			<h2>Arenizca</h2>
		</div>
		</div>
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-4" style="padding:0">
					<div class="polaroid ">
						<div class="img-mat-large" style="background: url('Galeria 1.png');background-size: cover;"></div>
						<!--img src="Galeria 1.png" alt=""-->
					</div>
				</div>
				<div class="col-sm-4">
				<p>
				lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text
				</p>
				</div>
			<div class="col-sm-2"></div>
		</div>
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-6 mini-thumb-mat1">
							<div class="polaroid mini-thumb-mat1">
								<div class="mini-thumb-mat1"	 style="background: url('Galeria 1.png');background-size: cover;"></div>
								<!--img src="Galeria 1.png" alt=""-->
							</div>
						</div>
						<div class="col-sm-6">
							<h3 class="align-left">Arenizca</h3>
							<p class="align-left">
							lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of text lots of t
							</p>
							<button class="btn-enviar">Descargar textura</button>
						</div>
					</div>
				</div>
				<div class="col-sm-4"></div>
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
