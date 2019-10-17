<!--file use to open single post -->
<?php

// Template Name:Home


get_header();

//Working with the posts. or the single home page if static pageis selected under settings
?>
<div id="main">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <?php
      if(have_posts()){
        //Working with the posts. or the single home page if static pageis selected under settings
        while(have_posts()) {// runs through all the posts
          the_post(); //ges info about next posts ready
          //We exit an enter php to combin use of php with html
          ?>
          <!-- <h2> <?php the_title(); ?></h2> -->
          <?php the_content(); ?>
          <?php
        }
      }
      ?>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row space"></div>

  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h2 class="align-left">Materiales</h2>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row space"></div>
  <div class="row space"></div>
  <div class="row">
    <div class="col-sm-2"></div>
    <!--AREA DE MATERIALES-->
    <?php
    $materiales=new WP_Query(array(
      'posts_per_page'=> -1,
      'post_type'=>'Materiales',
      'order_by'=>'title',
      'order'=>'ASC',
    ));
    $count=1;
    if($materiales->have_posts()){
      while($materiales->have_posts()){
        $materiales->the_post();?>

        <div class="col-sm-2">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url() ?>" class="mat-home-img polaroid">
            <p class="p-materiales"><?php echo get_the_title(); ?></p>
          </a>
        </div>
        <?php
        if($count%4 ==0 ){
          $count=0;
          echo '<div class="col-sm-2"></div>';
          echo '</div>';
          echo '<div class="row space"></div>';
          echo '<div class="row">';
          echo '<div class="col-sm-2"></div>';
        }
        $count=$count+1;
      }
    }
    wp_reset_postdata();
    ?>
  </div>

  <!--AREA DE Servicios-->
  <div class="row space"></div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h2 class="align-left">Servicios</h2>
      <div class="row space"></div>
      <div class="row space"></div>
      <div class="row">
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
              <div class="col-sm-3">
                <div class="row  ">
                  <div class="col-sm-12 th-red"><div style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);"><?php echo get_the_title();?></div></div>
                </div>
                <div class="row  ">
                  <div class="col-sm-12 td-grey" ><?php echo wp_trim_words(get_the_content(),8);?></div>
                </div>
                <div class="row  ">
                  <div class="col-sm-12 td-grey"><a href="<?php echo site_url('/servicios');?>"><p class="p-red">Leer mas</p></a></div>
                </div>
              </div>
              <?php
            }else {
              ?>
              <div class="col-sm-3">
                <div class="row  ">
                  <div class="col-sm-12 th-grey"><div style="position: relative;float: left;top: 50%;left: 50%;transform: translate(-50%, -50%);"><?php echo get_the_title();?></div></div>
                </div>
                <div class="row  ">
                  <div class="col-sm-12 td-grey" ><?php echo wp_trim_words(get_the_content(),8);?></div>
                </div>
                <div class="row  ">
                  <div class="col-sm-12 td-grey"><a href="<?php echo site_url('/servicios');?>"><p class="p-red">Leer mas</p></a></div>
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
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row space"></div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h3 class="align-left">Conctactanos</h3>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
      <p class="align-left" style="font-size: 1.3vw;">Estamos a tu servicion para responder cualquier pregunta que tengas sobre nuestros materials, la instalacion y distribucion de nuestros productos o sus applicaciones</p>
    </div>
    <div class="col-sm-4">
      <?php
    // define variables and set to empty values
    $frm_nameErr = $emailErr = $messageErr = "";
    $frm_name = $email = $message = "";

    // phpinfo();
    //echo function_exists( 'mail' );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      }

    if (empty($_POST["frm_name"])) {
      $frm_nameErr = "frm_name is required";
    } else {
      $frm_name = test_input($_POST["frm_name"]);
      // check if frm_name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$frm_name)) {
        $frm_nameErr = "Only letters and white space allowed";
      }
    }



    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

      if (empty($_POST["message"])) {
      $message = "";
    } else {
      $message = test_input($_POST["message"]);
    }



    $formcontent="From: $frm_name \n Message: $message";
    //$email = $_POST['email'];
    //$message = $_POST['message'];
    $recipient = "info@dieck.com";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    echo "<h3>Tu correo ha sido enviado.. Gracias!</h3>";
    }
    ?>

      <form method="POST" action="<?php the_permalink(); ?>" class="foot_form">
        <div class="form-group">
          <label for="name" class="">Nombre</label>
          <input type="text" class="form-control" name="frm_name">
        </div>
        <div class="form-group">
          <label for="email">Correo</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="telephone">Telefono</label>
          <input type="text" class="form-control" name="telephone">
        </div>
        <div class="form-group">
          <label for="message">Mensaje</label>
          <textarea class="form-control" name="message" rows="5" cols="30"></textarea>
        </div>
      <div class="row space"></div>
      <div class="row">
        <div class="col-sm-6">
          <?php
          if (get_field('captcha_key',12) != "") {
            ?> <div class="g-recaptcha" data-sitekey="<?php echo get_field('captcha_key',12) ?>"></div> <?php
          } ?>
        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn-enviar">Enviar</button>
        </div>
      </div>
      </form>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row space"></div>
</div>

<!-- Google captcha script-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php if (get_field('captcha_key',12) != "") { ?>
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
<?php }
get_footer();
?>
